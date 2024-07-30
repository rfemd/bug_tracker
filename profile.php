<?php
	session_start();

	if (!isset($_SESSION['user'])){
		header('Location: /');
	}
?>


<?php 
  require 'dbcon.php';
?>

<?php 
  include('header.php');
?>

 <?php include "navbar.php"; ?>

<!-- Grid row -->


 <section style="background-color: #eee; ">

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">

          	<h5 class="my-3">
            <img src="images/<?= $_SESSION['user']['new_img_name'] ?>" alt="avatar"
              class="rounded-circle img-fluid text-center mr-l" style="width: 150px;"> </h5>
               <p class="text-muted mb-4">Здесь содержится информация о доступных Вам задачах</p>
            <!--<img src="images/1682201916img2.jpg" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;"> 
            <h5 class="my-3"><?= $_SESSION['user']['fname'] ?> <?= $_SESSION['user']['lname'] ?></h5> -->
            <!--<p class="text-muted mb-1">Full Stack Developer</p>
            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div> -->
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <!--
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><?= $_SESSION['user']['email'] ?></p>
              </li>
              
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">@mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Полное имя</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION['user']['fname'] ?> <?= $_SESSION['user']['lname'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION['user']['email'] ?></p>
              </div>
            </div>
            <hr>
            <!--
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(097) 234-5678</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(098) 765-4321</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
              </div>
            </div>
          </div> -->
        </div>
        <div class="row ">
          <div class="col-md-11">
            <div class="card mb-4 mb-md-0">
              <div class="card-body ">
                <p class="mb-4"><span class="text-primary font-italic me-1">Мои задачи</span> 
                </p>
                <div class="container ">
                  <div class="my-9 ">
                    <?php
                        $author = $_SESSION['user']['unique_id'];
                        $query = "SELECT * FROM issues WHERE `author` = '$author' or `reciever` = '$author'";
                        $query_run = mysqli_query($con, $query);

                       if (mysqli_num_rows($query_run) > 0){
                          foreach ($query_run as $issue){
                            
                          ?>


                          <div class="flex gap-3 shadow p-3 mb-5 bg-white rounded"> <span class="cursor-pointer h-16 w-16 bg-[#ccc] flex justify-center items-center object-cover overflow-hidden rounded-lg">
                            <?php 
                              $issie_author = $issue['author'];
                              $query2 = "SELECT * FROM users WHERE `unique_id` = '$issie_author'"; 
                              $query2_run = mysqli_query($con, $query2);

                              if (mysqli_num_rows($query2_run ) > 0){
                                foreach ($query2_run  as $user2){
                                  $user_email = $user2['email'];
                                  $user_pic = $user2['img'];
                                  $user_flname = $user2['fname'] . ' ' . $user2['lname'] ;
                                         }
                            }
                              $issie_reciever = $issue['reciever'];
                              $query3 = "SELECT * FROM users WHERE `unique_id` = '$issie_reciever'"; 
                              $query3_run = mysqli_query($con, $query3);

                              if (mysqli_num_rows($query3_run ) > 0){
                                foreach ($query3_run  as $user3){
                                  $reciever_email = $user3['email'];
                                  $reciever_flname = $user3['fname'] . ' ' . $user3['lname'] ;
                                         }
                            }
                                   ?>


                            <img src="images/<?= $user_pic ?>" height=100% width=100% > 
         

                          </span>
              

                              <div class="flex flex-col gap-0">
                                  <a href="view_issue.php?id=<?= $issue['id']; ?>" class="text-md cursor-pointer space-y-3 flex flex-col transition-all hover:text-blue-400 flex max-w-[230px] overflow-hidden truncate text-ellipsis" style="width:600px">
                                
                                    <?php
                                            if (strlen($issue['name'])>50){
                                              echo substr($issue['name'],0,50).'...'; 
                                              
                                            } else{
                                              echo $issue['name'];
                                              
                                            } ?></a> <label class="popup" onclick="myFunction('myPopup13')">
                                                        <i class="fa fa-exclamation-circle" aria-hidden="true">
                                                            <span class="popuptext" id="myPopup13">При нажатии на имя задачи появится подробная информация</span>
                                                        </i>
                                                    </label>
                                            <p class="card-text"><strong>от: </strong><?= $user_flname ?>. Email <?= $user_email?></p>
                                            <p class="card-text"><strong>кому: </strong><?= $reciever_flname ?>. Email <?= $reciever_email ?></p>

                                             <p class="card-text "><?php
                                            if (strlen($issue['description'])>100){
                                              echo substr($issue['description'],0,100).'...'; 
                                              
                                            } else{
                                              echo $issue['description'];
                                              
                                            } ?></p>

                                            
                                  <div class="flex justify-between items-center">
                                      <p class="text-sm text-muted mb-4">
                                        <?= $issue['status']; ?>

                                    </p> <span class="h-8 w-12 cursor-pointer rounded-lg text-blue-900 text-sm mt-[1px] flex justify-center items-center">
                                        <a href="edit_issue.php?id=<?= $issue['id']; ?>" class="btn btn-outline-success btn-floating mr-1">
                                          <i class="fas fa-marker"></i>
                                        </a>
                                          <a href="delete_issue.php?id=<?= $issue['id']; ?>" class="btn btn-danger btn-floating">
                                          <i class="fas fa-trash"></i>
                                        </a></span>
                                  </div>
                              </div>
                          </div>
                          <div class="flex justify-end">
                              <hr class="mt-2 w-[320px] border-0 border-t border-pink-300">
                          </div>
                       <?php
                          }
                       } else {
                          echo "<h5> Тут ничего нет </h5>";
                       }
                    ?>

        </div>
</div>

</section>




<?php 
  include('footer.php');
?>

