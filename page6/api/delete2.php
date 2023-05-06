<?php
	include_once 'C:/OSPanel/domains/19.loc/page3/api/dbConfig.php';

	if (isset($_POST['id2'])) {
		$id2 = $_POST['id2'];  

		$query="DELETE FROM subjects WHERE IDSubject=$id2";
		$result=$con->query($query);

		if($result){
			$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'index5.php';
		    header("Location: $redirect");
		    exit();
		}
	}
?>

