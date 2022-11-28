<?php

	session_start();

	if(!isset($_SESSION['profile']['ben'])){

		header('location:../');

    }else{

     	$id= $_SESSION['profile']['ben']['id'];
		$username= $_SESSION['profile']['ben']['login'];

    } 

?>