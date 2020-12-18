<?php 
	session_start();
	$connect = mysqli_connect("127.0.0.1","root","","demoproject"); 
	$zapros_vstavit = "INSERT INTO applic (students_id,univ_id) VALUES('{$_SESSION['student_id']}','{$_POST["univ"]}')";
	$zapros_new = mysqli_query($connect,$zapros_vstavit);
	header("Location: accountStudent.php")
?>
