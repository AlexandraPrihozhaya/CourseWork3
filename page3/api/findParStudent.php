<?php
include_once 'C:/OSPanel/domains/19.loc/page3/api/dbConfig.php';

$classId=$_GET['class__par'];


$query="SELECT students.IDStudent, students.LastName, students.FirstName, students.Patronymic, 
classes.Class, classes.ClassLetter  FROM students JOIN classes ON students.IDClass = classes.IDClass
WHERE classes.Class='$classId'";
$result=$con->query($query);
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
	   		<td><?php echo $row['Class']?> <?php echo $row['ClassLetter']?></td>
	   		<td>9,9</td>
	  	</tr>
  	</tbody>
  <?php 
	$number++;} ?>
</table>