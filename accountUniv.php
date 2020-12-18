<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Профиль поступающего</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<?php 
		$con = mysqli_connect('127.0.0.1', 'root', '', 'demoproject');
		$query = mysqli_query($con,"SELECT * FROM universities INNER JOIN univAccount ON universities.id=univAccount.univer_id")
	 ?>
	<?php 
		if ($_SESSION['name']==null) {
			# code...
		
	 ?>
	<!--если студент НЕ авторизовался, то показывается эта часть, в том числе ссылка на страницу  логина-->
	<div class="col-10 mx-auto">
		<h3>Войдите как админ</h3>
		<p>Вы не авторизованы</p>
		<a href="loginStudent.php">Авторизация админа</a>
	</div>
	<?php } else {?>
	<!--если студент авторизовался, то показываются nav (меню) и контент всего сайта-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Привет,<?php echo $_SESSION['name']; ?> </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a href="signOutStudent.php" class="nav-link text-danger">Выйти</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="index.php">Главная</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav>
	<div class="col-10 mx-auto mt-5">
	
		<div class=" mt-5">
			<h3>Заявки в ваш университет</h3>
			<?php 
	 			//цикл начинается
		 		for($a=0;$a<$query->num_rows;$a++){
		 			$stroka = $query->fetch_assoc();
			?>		
			<h5><?php echo $stroka["name"]; ?></h5>
			<?php }; ?>
		</div>
	</div>

<?php } ?>
</body>
</html>
