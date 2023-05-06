<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>step to success</title>
	<link rel="shortcut icon" href="page1/resources/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="page1/css/main.css">
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
		    <a class="acc" id="acc" href="#"><img src="page1/resources/user.png" width="40px"></a>
	    </nav>
	</header>
	<section class="sect">
		<div class="info">
	 		<div class="back__info">
	 			<div class="text__info">
	 				Мониторинг и анализ результатов учебной деятельности учащихся
	 			</div>
	 	 	</div>
		</div>
	</section>
	<section class="for__teachers">
		<img class="dev" src="page1/resources/23.png" width="300px">
	 	<p class="title">Учителям</p>
	 	<div class="info1">
	 		<img class="icon" src="page1/resources/book.png" width="70px">
	 		<p class="text">регулярное отслеживание качества усвоения знаний учащимися</p>
	 	</div>
	 	<div class="info2">
	 		<img class="icon" src="page1/resources/analytics.png" width="70px">
	 		<p class="text">анализ результатов учебной деятельности учащихся</p>
	 	</div>
	 	<div class="info3">
	 		<img class="icon" src="page1/resources/back-in-time.png" width="70px">
	 		<p class="text">меньше времени на проверку знаний учащихся</p>
	 	</div>
	</section>
	<section class="for__students">
	 	<p class="title">Учащимся</p>
	 	<div class="info4">
	 		<img class="icon" src="page1/resources/online-learning.png" width="70px">
	 		<p class="text">прохождение тестов онлайн</p>
	 	</div>
	 	<div class="info5">
	 		<img class="icon" src="page1/resources/file.png" width="70px">
	 		<p class="text">просмотр своих результатов</p>
	 	</div>
	 	<div class="info6">
	 		<img class="icon" src="page1/resources/back-in-time.png" width="70px">
	 		<p class="text">меньше времени на выполнение заданий</p>
	 	</div>
	</section>
	<section class="about__us">
		<p class="title">О нас</p>
		<div class=info__about__us>
			<p class="text__about__us"><span class="text__login2">Step to success</span> позволит улучшить результаты учебной деятельности учащихся, а также  повысить эффективность деятельности преподавателей, что является залогом успешности любого учреждения образования.
			</p>
			<img src="page1/resources/teacher.jpg" height="340px">
		</div>
	</section>
	<footer>
		<a class="logo2" href="#"><img class="picture__logo" src="page1/resources/logo.png" width="80px"></a>
	 	<ul class="navbar2">
	        <li class="menu__link2"><a href="index.php">Главная</a></li>
	        <li class="menu__link2"><a href="index2.php">Рейтинг</a></li>
		    <li class="menu__link2"><a href="#">Учащимся</a></li>
		    <li class="menu__link2"><a href="#">Учителям</a></li>
	        <li class="menu__link2 a__u"><a href="#">О нас</a></li>
	    </ul>
	</footer>
	<a href="#"><img class="block" src="page1/resources/go.png" width="50px"></a>

	<div class="popup-bg"> 
		<div class="popup">
			<form action="page1/api/auth.php" method="post" class="form">
				<img class="close-popup" src="page1/resources/close.png" width="20px" alt="">
		 		<div class="text__login">
		 			<span class="text__login1">Войти в систему</span> <span class="text__login2">step to success</span>
		 		</div> 
		 		<fieldset class="fieldset1">
			 		<div class="log">
			 			<label for="login">ЛОГИН</label>
			 			<input id="login" type="text" name="login" required autocomplete="on">
					</div>
		 			<div class="pass">
						<label for="password">ПАРОЛЬ</label>
						<input id="password" type="password" name="password" required autocomplete="on">
			 		</div>
		 		</fieldset>
		 		<fieldset class="buttons">
		 			<button type="submit" class="button__login" onChange="getTeacher(this.value)">ВОЙТИ</button>
		 			<button class="button__checkin">РЕГИСТРАЦИЯ</button>
		 		</fieldset>
		 	 </form>
		</div>
	</div>

	<div class="popup-bg2"> 
		<div class="popup2">
			<form action="page1/api/api.php" method="post" class="form2">
				<img class="close-popup" src="page1/resources/close.png" width="20px" alt="">
		 		<div class="text__checkin">
		 			<span class="text__login1">Регистрация в системе</span> <span class="text__login2">step to success</span>
		 		</div> 
		 		<fieldset class="fieldset1">
		 			<div class="form_radio_group">
						<div class="form_radio_group-item">
							<input id="radio-1" type="radio" name="radio" value="Преподаватель" checked>
							<label for="radio-1">учитель</label>
						</div>
						<div class="form_radio_group-item">
							<input id="radio-2" type="radio" name="radio" value="Учащийся">
							<label for="radio-2">учащийся</label>
						</div>
					</div>
					<div class="first__name">
			 			<label for="first__name">ИМЯ</label>
			 			<input id="first__name" type="text" name="first__name" placeholder="Иван" required autocomplete="on">
					</div>
					<div class="second__name">
			 			<label for="second__name">ФАМИЛИЯ</label>
			 			<input id="second__name" type="text" name="second__name" placeholder="Иванов" required autocomplete="on">
					</div>
					<div class="email">
			 			<label for="email">ПОЧТА</label>
			 			<input id="email" type="email" name="email" placeholder="email@mail.ru" required autocomplete="on">
					</div>
			 		<div class="log">
			 			<label for="login">ЛОГИН</label>
			 			<input id="login" type="text" name="login" required autocomplete="on">
					</div>
		 			<div class="pass">
						<label for="password">ПАРОЛЬ</label>
						<input id="password" type="password" name="password" required autocomplete="on">
			 		</div>
		 		</fieldset>
		 		<fieldset class="buttons">
		 			<button type="submit" id="reg" class="button__checkin">ЗАРЕГИСТРИРОВАТЬСЯ</button>
		 		</fieldset>
		 	 </form>
		</div>
	</div>
	<script src="page1/js/main.js"></script>
	<script src="https://www.gstatic.com/firebasejs/9.18.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/9.18.0/firebase-database.js"></script>
</body>
</html>