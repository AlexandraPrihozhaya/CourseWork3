<?php
	include_once 'C:/OSPanel/domains/19.loc/page3/api/dbConfig.php';

	if (isset($_POST['id'])) {
		$id = $_POST['id'];  

		$query="DELETE FROM teachers WHERE IDTeacher=$id";
		$result=$con->query($query);

		if($result){
			$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'index5.php';
		    header("Location: $redirect");
		    exit();
		}
	}
?>

