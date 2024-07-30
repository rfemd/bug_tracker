<?php 
	session_start();
	include_once "dbcon.php";
	$fname = mysqli_real_escape_string($con, $_POST['fname']);
	$lname = mysqli_real_escape_string($con, $_POST['lname']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$password = password_hash($password, PASSWORD_DEFAULT);
	if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
		//проеврка на валидность введенныйх данных
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){//email валидный
			
			$sql = mysqli_query($con, "SELECT email FROM users where email = '{$email}'");
			if (mysqli_num_rows($sql) > 0){ // email уже есть в бд
				echo "$email - Уже занят!";
			} else {
				// пользователь загрузил файл
				if (isset($_FILES['image'])){ 
					$img_name = $_FILES['image']['name']; 
					$img_type = $_FILES['image']['type'];
					$tmp_name = $_FILES['image']['tmp_name'];

					$img_explode = explode('.', $img_name);
					$img_ext = end($img_explode); 
					$extentions = ['png', 'jpeg', 'jpg']; // возможный типы изображений
					if (in_array($img_ext,$extentions) === true){ // if matched
						$time = time(); 

						// уникальное имя для изображения
						$new_img_name = $time.$img_name;
						
						if (move_uploaded_file($tmp_name, "images/".$new_img_name)){
							$status = "Active now";//пользователь в системе
							$random_id = rand(time(), 10000000);

							//загрузить в бд все данные о пользователе
							$sql2 = mysqli_query($con, "insert into users (unique_id, fname, lname, email, password, img, status) values({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");

							if ($sql2){//вход в систему, если регитрация прошла успешно
								$sql3 = mysqli_query($con, "select * from users where email = '{$email}'");
								if (mysqli_num_rows($sql3) > 0){
									$row = mysqli_fetch_assoc($sql3);
									
			//запомним в сессии инфрмацию о пользователе
			if ($row['email'] === 'admin@admin.com') {
			$_SESSION['user'] = [
				"unique_id" => $row['unique_id'],
				"fname" => $row['fname'],
				"lname" => $row['lname'],
				"email" => $row['email'],
				"new_img_name" => $row['img'],
				"admin" => True

			];} else{
				$_SESSION['user'] = [
				"unique_id" => $row['unique_id'],
				"fname" => $row['fname'],
				"lname" => $row['lname'],
				"email" => $row['email'],
				"new_img_name" => $row['img'],
				"admin" => False];
			}
									echo "Авторизация прошла успешно";
									header("location: profile.php");//перенапрявляем пользовател в его профиль
								}

							} else {
								echo "Что-то ошло не так!";
							}
						}
						
					} else {
						echo "Нужно выбрать изображение формата  jpeg, jpg, png!";
					}
				} else {
					echo "Нужно прикрепить изоражение";
				}
			}
		} else {
			echo "$email - Некорректный адрес почты";
		}

	} else {
		echo "Нужно заполнить все поля";
	}
?>