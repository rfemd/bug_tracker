<?php 

  echo '
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Bug Tracker</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="profile.php">Мой профиль</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="create_issue.php">Создать задачу</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="all_issues.php">Просмотр задач</a>
      </li>



    </ul>
    <form class="form-inline my-2 my-lg-0" id="navbarSupportedContent">
  
        <a class="nav-link" href="logout.php">Выйти</a>
     
    </form>
  </div>
</nav>';

?>