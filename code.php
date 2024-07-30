<?php
session_start();
require 'dbcon.php'; 

if (isset($_POST['delete_issue'])){
	$issue_id = mysqli_real_escape_string($con, $_POST['delete_issue']);
	$query = "DELETE FROM `issues` WHERE `issues`.`id` = '$id'";
	$query_run = mysqli_query($con, $query);

	if ($query_run){
		$_SESSION['message'] = "Задача удалена";
        header("Location: all_issues.php");
        exit(0);
	} else {
		$_SESSION['message'] = "Не удалось удалить задачу";
        header("Location: all_issues.php");
        exit(0);
	}
}


if (isset($_POST['update_issue'])){

	$issue_id = mysqli_real_escape_string($con, $_POST['issue_id']);

	$name = mysqli_real_escape_string($con, $_POST['name']);
    $project_name = mysqli_real_escape_string($con, $_POST['project_name']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $reciever = mysqli_real_escape_string($con, $_POST['reciever']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    $query = "UPDATE `issues` SET `name` = '$name', `project_name` = '$project_name', `type` = '$type', `reciever` = '$reciever',`status` = '$status', `description` = '$description' WHERE `issues`.`id` = '$issue_id'";
    echo $reciever;
    $query_run = mysqli_query($con, $query);

    if ($query_run){
        $_SESSION['message'] = "Задача успешно обновлена";
        header("Location: all_issues.php");
        exit(0);
    } else {
    	echo mysqli_error();
        $_SESSION['message'] = "Задача не обновлена ";
        header("Location: all_issues.php");
        exit(0);
    }
}
	
if(isset($_POST['save_issue']))
{

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $project_name = mysqli_real_escape_string($con, $_POST['project_name']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $reciever = mysqli_real_escape_string($con, $_POST['reciever']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    $author = $_SESSION['user']['unique_id'];
    $query = "INSERT INTO `issues` ( `author`, `name`, `project_name`, `type`,`reciever`, `status`, `description`) VALUES ('$author','$name', '$project_name', '$type', '$reciever', '$status', '$description')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Задача создана";
        header("Location: all_issues.php");
        exit(0);

    }
    else
    {
        echo("Error description: " . mysqli_error($con));
        $_SESSION['message'] = "Не удалось создать задачу";
        header("Location create_issue.php");
        exit(0);
    }
}

 ?>