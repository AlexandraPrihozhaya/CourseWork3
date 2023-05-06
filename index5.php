<?php
	include_once 'C:/OSPanel/domains/19.loc/page3/api/dbConfig.php';

	$login = $_GET['get'];

	$query="SELECT * FROM users WHERE Login = '$login'";
    $officer=$con->query($query);

    $query1="SELECT * FROM subjects";
    $subject=$con->query($query1);
    $subject1=$con->query($query1);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>step to success</title>
	<link rel="shortcut icon" href="page1/resources/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="page6/css/main.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
					<?php while ($row=$officer->fetch_array(MYSQLI_ASSOC)) { ?>
					<p id="fio" class="fio">Директор <?php echo $row['FirstName']?> <?php echo $row['LastName']?></p>
					<p class="mail">Электронная почта: <?php echo $row['Email']?></p>
					<?php } ?>
				</div>
			</div>
			<div>
				<button class="btn2" onclick="addSubject()">Добавить предмет</button>
				<button class="btn2" onclick="showTable1()">Показать все предметы</button>
			</div>
			<div id="subjectsdiv">
			<?php
				include_once 'C:/OSPanel/domains/19.loc/page3/api/dbConfig.php';

				$query="SELECT * FROM subjects";
				$result=$con->query($query);
				?>

				<?php $number=1; ?>

				<table id="table1" class="table">
					<thead>
						<tr>
					   		<th class="th">Номер</th>
					   	    <th class="th">Название</th>
					   	    <th class="th actions">Действия</th>
					   	</tr>
				  	</thead>
				  	<?php while ($row=$result->fetch_array(MYSQLI_ASSOC)) { ?>
				  	<tbody>
					  	<tr>
					   		<td><?php echo $number?></td>
					   		<td class="td__name"><?php echo $row['Name']?></td>
					   		<td class="actions">
						   		<input type='hidden' name='id2' value='<?php echo $row["IDSubject"]?>' />
								<img class="icons ic" onclick="openChange2()" src="page6/resources/edit.png" width="16px">			  
						 		<img class="icons" onclick="openDelete2()" src="page6/resources/delete.png" width="16px">
						   		<?php $id2 = $row["IDSubject"]?>
					 		</td>
					  	</tr>
				    </tbody>
				  <?php 
					$number++;} ?>
				</table>
				<button class="btn2" onclick="hiddenTable1()">Скрыть таблицу</button>
			</div>
			<div>
				<button class="btn3" onclick="addTeacher()">Добавить учителя</button>
				<button class="btn3" onclick="showTable2()">Показать всех учителей</button>
			</div>
			<div id="teachersdiv">
			<?php
				include_once 'C:/OSPanel/domains/19.loc/page3/api/dbConfig.php';

				$query="SELECT *, subjects.Name FROM teachers JOIN subjects WHERE teachers.IDSubject = subjects.IDSubject";
				$result=$con->query($query);
				?>

				<?php $number=1; ?>

				<table id="table2" class="table">
					<thead>
						<tr>
					   		<th class="th">Номер</th>
					   	    <th class="th">ФИО</th>
					   	    <th class="th">Логин</th>
					   	    <th class="th">Предмет</th>
					   	    <th class="th actions">Действия</th>
					   	</tr>
				  	</thead>
				  	<tbody>
				  		<?php while ($row=$result->fetch_array(MYSQLI_ASSOC)) { ?>
					  	<tr id='<?php echo $row["IDTeacher"]?>'>
						   	<td><?php echo $number?></td>
						  	<td class="td__name"><?php echo $row['LastName']?> <?php echo $row['FirstName']?> <?php echo $row['Patronymic']?></td>
						   	<td><?php echo $row['Login']?></td>
						  	<td><?php echo $row['Name']?></td>
						   	<td class="actions">
							   	<input type='hidden' name='id' value='<?php echo $row["IDTeacher"]?>' />
								<img class="icons ic" onclick="openChange()" src="page6/resources/edit.png" width="16px">
						   		<img class="icons" onclick="openDelete()" src="page6/resources/delete.png" width="16px">
						   		<script>
									document.getElementById("<?php echo $row["IDTeacher"]?>").onclick = function () {
										
										let id = document.getElementById("<?php echo $row["IDTeacher"]?>").id;
										$.ajax({
											url: '',     
										    type: 'POST',
										    data: id,
										    success: function(data){
										     alert(data);
										   },
										   error: function() {
										   	alert("error");
										   }
										});
									}
								</script>

					   		</td>
					  	</tr>
					  	<?php 
					$number++;} ?>
				    </tbody>
					
				</table>
				<button class="btn3" onclick="hiddenTable2()">Скрыть таблицу</button>
			</div>
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

	<div class="popup2">
    <div class="popup__container2">
      <div class="popup__wrapper">
        <div id="pp2">
          <form role="form" action="page6/api/sel.php" autocomplete="on" method="post">
          	<div class="text">
              Добавление предмета
            </div>
            <label for="name">Название</label>
            <input class="input" type="text" name="name" required>
            <button type="submit" class="btn1 addbtn">Добавить</button>
          </form>
        </div>
      </div>
    </div>
  </div>

	<div class="popup">
    <div class="popup__container">
      <div class="popup__wrapper">
        <div id="pp">
          <form role="form" action="page6/api/add.php" autocomplete="on" method="post">
          	<div class="text2">
              Добавление учителя
            </div>
            <label for="lastName">Фамилия</label>
            <input class="input" type="text" name="lastname" required>
            <label for="firstName">Имя</label>
            <input class="input" type="text" name="firstname" required>
            <label for="patronymic">Отчество</label>
            <input class="input" type="text" name="patronymic" required>
            <label for="login">Логин</label>
            <input class="input" type="text" name="login" required>
            <select id="select" name="subject" class="select__subjects">
			<option value="all">Выберите предмет</option>
			<?php while ($row=$subject->fetch_array(MYSQLI_ASSOC)) { ?>
			<option value=<?php echo $row['IDSubject']?>><?php echo $row['Name']?></option>
			<?php } ?>
			</select>
            <button type="submit" class="btn4">Добавить</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="popup3">
    <div class="popup__container3">
      <div class="popup__wrapper">
        <div id="pp3">
          <form role="form" action="page6/api/delete.php" autocomplete="on" method="post">
          	<div class="confirm">
              Подтвердите действие
            </div>
            <div class="sure">
              Вы уверены, что хотите удалить учителя?
            </div>
            <div class="btns">
            	<input type="hidden" name='id' value='<?php echo $id?>' />
	            <button class="btn__delete">Удалить</button>
	            <button class="btn__exit" onclick="exit()">Отмена</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="popup4">
    <div class="popup__container4">
      <div class="popup__wrapper">
        <div id="pp4">
          <form role="form" action="page6/api/delete2.php" autocomplete="on" method="post">
          	<div class="confirm">
              Подтвердите действие
            </div>
            <div class="sure">
              Вы уверены, что хотите удалить предмет?
            </div>
            <div class="btns">
            	<input type="hidden" name='id2' value='<?php echo $id2?>' />
	            <button class="btn__delete">Удалить</button>
	            <button class="btn__exit" onclick="exit2()">Отмена</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

 	<div class="popup5">
    <div class="popup__container5">
      <div class="popup__wrapper">
        <div id="pp5">
          <form role="form" action="page6/api/add.php" autocomplete="on" method="post">
          	<div class="text2">
              Изменение данных об учителе
            </div>
            <?php
            $id = $_POST['id'];
			$query2="SELECT * FROM teachers WHERE IDTeacher = '$id'";
	    	$teacher=$con->query($query2);
            $row1=$teacher->fetch_array(MYSQLI_ASSOC);?>
            <label for="lastName">Фамилия</label>
            <input class="input" type="text" name="lastname" value="<?php echo $row1['LastName']?>" required>
            <label for="firstName">Имя</label>
            <input class="input" type="text" name="firstname" value="<?php echo $row1['FirstName']?>" required>
            <label for="patronymic">Отчество</label>
            <input class="input" type="text" name="patronymic" value="<?php echo $row1['Patronymic']?>" required>
            <label for="login">Логин</label>
            <input class="input" type="text" name="login" value="<?php echo $row1['Login']?>" required>
            <select id="select" name="subject" class="select__subjects sel5">
			<option value="all">Выберите предмет</option>
			<?php while ($row=$subject1->fetch_array(MYSQLI_ASSOC)) { ?>
			<option value=<?php echo $row['IDSubject']?>><?php echo $row['Name']?></option>
			<?php } ?>
			</select>
			<div class="btns btns5">
				<input type="hidden" name='id' value='<?php echo $id?>' />
	            <button type="submit" class="btn__change">Изменить</button>
	            <button class="btn__exit" onclick="exit3()">Отмена</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> 

  <div class="popup6">
    <div class="popup__container6">
      <div class="popup__wrapper">
        <div id="pp6">
          <form role="form" action="page6/api/add.php" autocomplete="on" method="post">
          	<div class="text">
              Изменение предмета
            </div>
            <?php 
			$query3="SELECT * FROM subjects WHERE IDSubject = '$id2'";
    		$subject2=$con->query($query3);
            $row2=$subject2->fetch_array(MYSQLI_ASSOC);?>
            <label for="name">Название</label>
            <input class="input" type="text" name="name" value="<?php echo $row2['Name']?>" required>
			<div class="btns btns6">
				<input type="hidden" name='id' value='<?php echo $id?>' />
	            <button type="submit" class="btn__change">Изменить</button>
	            <button class="btn__exit" onclick="exit4()">Отмена</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> 


  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
	<script src="page6/js/main.js"></script>
</body>
</html>