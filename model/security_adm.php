<?php

	session_start();

	if(!isset($_SESSION['profile']['admin'])){

		header('location:../index.php');

    }elseif ($_SESSION['profile']['admin']['type'] !== 'admin') {

     	header('location:../index.php');

    }else{

    	$id= $_SESSION['profile']['admin']['id'];
		$username= $_SESSION['profile']['admin']['login'];
		$type = $_SESSION['profile']['admin']['type'];

    }

    

?>