<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>step to success</title>
	<link rel="shortcut icon" href="page1/resources/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="page4/css/main.css">
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
			<a class="link" href="index.php">Главная</a> -> Учителям -> Выставить оценки
		</div>
		<div>
			<select id="class" name="class" class="select__classes" onChange="getStudent(this.value)">
			<option value="all">Доступные классы</option>
			
			</select>
		</div>	
		<div id="studentdiv" class="studentdiv">
			<img class="no__res" src="page3/resources/free-icon-sad-face-4989865.png" width="90px">
			<p class="no__res__text">Ничего не найдено(</p>
		</div>
	</section>
	<footer>
		<a class="logo2" href="#"><img class="picture__logo" src="page3/resources/logo.png" width="80px"></a>
	 	<ul class="navbar2">
	        <li class="menu__link2"><a href="index.php">Главная</a></li>
	        <li class="menu__link2"><a href="index2.php">Рейтинг</a></li>
		    <li class="menu__link2"><a href="#">Учащимся</a></li>
		    <li class="menu__link2"><a href="#">Учителям</a></li>
	        <li class="menu__link2"><a href="#">О нас</a></li>
	    </ul>
	</footer>
	<a href="#"><img class="block" src="page3/resources/go.png" width="50px"></a>
	<script src="page4/js/main.js"></script>
</body>
</html>