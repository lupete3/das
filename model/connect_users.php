<?php 

include ('connex.php');
session_start();

if(isset($_POST['log_in'])){
	$user = $_POST['login'];
	$pwd = $_POST['password'];

	$query1 = $bd->prepare("SELECT * FROM users WHERE login = ? AND password = ? ");
	$query1->execute(array($user, $pwd ));

	$query2 = $bd->prepare("SELECT * FROM beneficiaire WHERE login = ? AND password = ? ");
	$query2->execute(array($user, $pwd ));


	if ($done=$query1->fetch(PDO::FETCH_ASSOC)) {

		$_SESSION['profile']['admin']=$done;

		if ($_SESSION['profile']['admin']['type'] === 'admin') {
			
			header('location:../pages/admin');

		}else{

			header('location:../pages/secretaire');

		}
								
	}elseif ($done1=$query2->fetch(PDO::FETCH_ASSOC)) {

		$_SESSION['profile']['ben']=$done1;

		header('location:../pages/benef');
								
	}else {

		header('location:../index?err=Login ou mot de pass incorrect');
				  	
	}

}

 ?>