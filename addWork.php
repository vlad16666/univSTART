<?php 
	session_start();
	$img_direct = "img/";//папку куда их загружать
	$img_name = $img_direct . basename($_FILES["file"]["name"]);//путь куда сохранится файл сполным назваием
	$upload = move_uploaded_file($_FILES["file"]["tmp_name"], $img_name);
	$con = mysqli_connect('127.0.0.1', 'root', '', 'demoproject');
	if ($upload==true) {
		$query = mysqli_query($con,"INSERT INTO works (student_id,descrip,img) VALUES ('{$_SESSION['student_id']}','{$_POST['desc']}','{$img_name}') ");
		header("Location: accountStudent.php");
	}
 ?>