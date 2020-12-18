<?php 
session_start();
$con = mysqli_connect('127.0.0.1', 'root', '', 'demoproject');
$query = mysqli_query($con, "SELECT * FROM univAccount WHERE login='{$_POST['login']}' AND password='{$_POST['password']}'");
for($i=0;$i<$query->num_rows;$i++){
	$stroka = $query->fetch_assoc();
};
$num = mysqli_num_rows($query);
if($num>0){
	header("Location: accountUniv.php");
	$_SESSION['univ_id'] = $stroka["id"];
	$_SESSION['name'] = $stroka["login"];
} else{
	header("Location: loginAdmUniv.php");;
}
?>