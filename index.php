
<?php 
  include('header.php');
?>


<div class="container d-flex align-items-center justify-content-center mt-5">

	<form action="signup_func.php"  method="POST" enctype="multipart/form-data">
		<div class="form-outline mt-1">
			<div class="error-txt"></div>
		</div>

	  	<div  class="form-outline mt-1">
	      <h4>Регистрация</h4>
	    </div>


	    <div class="form-outline mt-1">
		    
			<input class="form-control" type="text" id="typeText" name="fname" placeholder="Укажите имя" required>
			<label class="form-label" for="typeText">Имя</label>
	  </div>

	  <div class="form-outline mt-1">
		    
			<input class="form-control" type="text" id="typeText" name="lname" placeholder="Укажите фамилию" required>
			<label class="form-label" for="typeText">Фамилия</label>
	  </div>

    <div  class="form-outline mt-1">
  		<input class="form-control" type="email" id="typeText" name="email" placeholder="Укажите email" >
      <label class="form-label" for="typeText">Email </label>
    </div>

	  <div class="form-outline mt-1">
	   	<div class="field input">
			
			<input class="form-control" type="password" id="typeText" name="password" placeholder="Придумайте пароль">
			<label class="form-label"  for="typeText">Пароль</label>
		
		</div>
	  </div>


	  <div class="form-outline mt-1">
	  			
		    <label  class="form-label" for="customFile">Фото</label>
			<input type="file" class="form-control" id="customFile" name="image" required>

	  </div>


	<button type="submit" class="btn btn-primary mt-2">Зарегистироваться</button>

 	<div class="form-outline mt-1">Уже зарегистированы? <a href="login.php" class="link-primary text-decoration-none">Вход в систему</a></div>

	</form>



</div>



<?php 
  include('footer.php');
?>




