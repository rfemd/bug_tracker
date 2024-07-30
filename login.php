
<?php 
  include('header.php');
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"/>


<div class="container d-flex align-items-center justify-content-center mt-5">

  <form action="login_func.php" method="POST">
    <div  class="form-outline mt-1">
      <h4>Авторизация</h4>
    </div>

    <div  class="form-outline mt-1">
  		<input type="email" id="typeText" name="email" placeholder="Укажите email"  class="form-control">
      <label class="form-label" for="typeText">Email </label>
    </div>


    <div class="form-outline mt-1">
  		<input type="password"  id="typeText" class="form-control" name="password" placeholder="Введите пароль">
  	  <label class="form-label" for="typeText">Пароль</label>

  	</div>
    

    <button type="submit" class="btn btn-primary mt-1">Войти</button>


 <div class="form-outline mt-1">Нет аккаунта? <a href="index.php" class="link-primary text-decoration-none">Регистрация</a></div>

  </form>

 

</div>

<?php 
  include('footer.php');
?>
