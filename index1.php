<?php
	include_once 'C:/OSPanel/domains/19.loc/page3/api/dbConfig.php';

	$login = $_GET['get'];

	$query="SELECT teachers.*, subjects.Name, users.Email FROM teachers JOIN subjects ON teachers.IDSubject = subjects.IDSubject 
    JOIN users ON teachers.Login = users.Login WHERE teachers.Login = '$login'";
    $teacher=$con->query($query);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>step to success</title>
	<link rel="shortcut icon" href="page1/resources/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="page2/css/main.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<nav class="menu">
			<a class="logo" href="index.php"><img src="page1/resources/logo.png" width="80px"></a>
			<div class="mn">
			    <ul class="navbar">
			        <li class="menu__link"><a href="index.php">Главная</a></li>
			        <li class="menu__link"><a href="index2.php">Рейтинг</a></li>
			        <li class="menu__link"><a href="#">Учащимся</a>
			        	<ul class="more">
				            <li><a href="#">Личные результаты</a></li>
				       	</ul>
			        </li>
			        <li class="menu__link" id="for__teachers4"><a href="#">Учителям</a>
			        	<ul class="more">
				            <li><a href="#">Анализ результатов</a></li>
				            <li><a href="index3.php">Выставить оценки</a></li>
				       	</ul>
				    </li>
			        <li class="menu__link"><a href="teachers.php">О нас</a></li>
			    </ul>
		    </div>
		    <a class="acc" href="#"><img src="page1/resources/user.png" width="40px"></a>
	    </nav>
	</header>
	<section class="main__part">
		<div class="navigation">
			<a class="link" href="index.php">Главная</a> -> Личный кабинет
		</div>
		<div class="personal__info">
			<div class="photo__text">
				<div class="photo">	
				</div>
				<div class="data">
					<?php while ($row=$teacher->fetch_array(MYSQLI_ASSOC)) { ?>
					<p id="fio" class="fio"><?php echo $row['LastName']?> <?php echo $row['FirstName']?> <?php echo $row['Patronymic']?></p>
					<p class="subject">Преподаваемый предмет: <?php echo $row['Name']?></p>
					<p class="mail">Электронная почта: <?php echo $row['Email']?></p>
					<?php } ?>
				</div>
			</div>
			<ul class="list">
	      		<li class="acc__classes">Доступные классы
	      			<ul class="classes">
				        <li>6 А</li>
				        <li>8 Б</li>
					    <li>11 В</li>
	    			</ul>
	      		</li>
	   		</ul>
		</div>
	</section>
	<footer>
		<a class="logo2" href="#"><img class="picture__logo" src="page2/resources/logo.png" width="80px"></a>
	 	<ul class="navbar2">
	        <li class="menu__link2"><a href="index.php">Главная</a></li>
	        <li class="menu__link2"><a href="index2.php">Рейтинг</a></li>
		    <li class="menu__link2"><a href="#">Учащимся</a></li>
		    <li class="menu__link2"><a href="#">Учителям</a></li>
	        <li class="menu__link2"><a href="#">О нас</a></li>
	    </ul>
	</footer>
	<a href="#"><img class="block" src="page2/resources/go.png" width="50px"></a>

	<script src="page2/js/main.js"></script>
</body>
</html>