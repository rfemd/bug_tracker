<?php 
session_start();
	include 'dbcon.php';

	$id = $_GET['id'];
	echo $id;

	#"DELETE FROM `issues` WHERE `issues`.`id` = 1"
	#$deleteQuery = "DELETE FROM `issues` WHERE `issues`.`id` = '$id'";
	$deleteQuery = "DELETE FROM `issues` WHERE `issues`.`id` = '$id'";
	$res = mysqli_query($con, $deleteQuery);
	if ($res){
		$_SESSION['message'] = "Задача удалена";
        header("Location: all_issues.php");
        exit(0);
	} else {
		$_SESSION['message'] = "Не удалось удалить задачу";
        header("Location: all_issues.php");
        exit(0);
	}

?>