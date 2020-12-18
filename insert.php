<?php 
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', 'vka');
	$query = mysqli_query($con, "SELECT * FROM users WHERE id = {$_SESSION["id"]}");
	$stroka = $query->fetch_assoc();
 ?>s