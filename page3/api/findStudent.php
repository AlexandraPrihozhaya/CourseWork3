<?php
include_once 'C:/OSPanel/domains/19.loc/page3/api/dbConfig.php';

$classId=intval($_GET['class']);

$query="SELECT IDStudent, LastName, FirstName, Patronymic FROM students WHERE IDClass='$classId'";
$query1="SELECT Class, ClassLetter FROM classes WHERE IDClass='$classId'";
$result=$con->query($query);
$result1=$con->query($query1);
$row1=$result1->fetch_array(MYSQLI_ASSOC);
?>

<?php $number=1; ?>

<table class="table">
	<caption>
		Рейтинг учащихся
	</caption>
	<thead>
		<tr>
	   		<th class="th">Номер</th>
	   	    <th class="th">ФИО</th>
	   	    <th class="th">Класс</th>
	   		<th class="th">Средняя оценка</th>
	  	</tr>
  	</thead>
  	<?php while ($row=$result->fetch_array(MYSQLI_ASSOC)) { ?>
  	<tbody>
	  	<tr>
	   		<td><?php echo $number?></td>
	   		<td class="td__fio"><?php echo $row['LastName']?> <?php echo $row['FirstName']?> <?php echo $row['Patronymic']?></td>
	   		<td><?php echo $row1['Class']?> <?php echo $row1['ClassLetter']?></td>
	   		<td>9,9</td>
	  	</tr>
    </tbody>
  <?php 
	$number++;} ?>
</table>