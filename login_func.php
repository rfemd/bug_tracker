<?php 
	session_start();
	include_once "dbcon.php";
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	//$password = password_hash($password, PASSWORD_DEFAULT);
	#echo "Hello from login.php file";

	if (!empty($email) && !empty($password)){
		
		//$sql = mysqli_query($con, "select * from users where email = '{$email}' and password = '{$password}'");
		$sql = mysqli_query($con, "select * from users where email = '{$email}'");
		if (mysqli_num_rows($sql) > 0){
			$row = mysqli_fetch_assoc($sql);	
			$hashed_password = $row['password'];
			echo $hashed_password;
		if (password_verify($password, $hashed_password)) {

			$_SESSION['unique_id'] = $row['unique_id'];



			//запомним в сессии инфрмацию о пользователе
			if ($row['email'] === 'admin@admin.com') {
			$_SESSION['user'] = [
				"unique_id" => $row['unique_id'],
				"fname" => $row['fname'],
				"lname" => $row['lname'],
				"email" => $row['email'],
				"new_img_name" => $row['img'],
				"admin" => True

			];} else{$_SESSION['user'] = [
				"unique_id" => $row['unique_id'],
				"fname" => $row['fname'],
				"lname" => $row['lname'],
				"email" => $row['email'],
				"new_img_name" => $row['img'],
				"admin" => False];
			}



			echo "Авторизация прошла успешно";
			header("location: profile.php");


		

		} else {
			echo "Неверный пароль ";
			
		} 
	}else{
		echo "Неверный email ";
	}
	} else {
		echo "Необходимо заполнить все поля";
	}
?>