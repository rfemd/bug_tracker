<?php 

  session_start();
  require 'dbcon.php';
?>

<?php 
  include('header.php');
?>



 <?php include "navbar.php"; ?> 

<section style="background-color: #eee;">

   <?php include('message.php'); ?>
  <div class="text-center container py-5">


    <h4 class="mt-4 mb-5"><strong>Доступные задачи</strong></h4>

    <div class="row">
    
     <?php
        $query = "SELECT * FROM issues";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0){
          foreach ($query_run as $issue){ ?>
          <div class="col-lg-4 col-md-12 mb-4 ">
            <div class="card shadow p-3 mb-5 bg-white rounded" style="height: 300px;">
              <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                data-mdb-ripple-color="light">
                <?php if ($issue['status'] === 'Создано') {
                  echo '<img src="red.jpg" class="w-100"  style="width: 100px; height: 100px;">'; 
                } elseif ($issue['status'] === 'Выполнено') {
                   echo '<img src="green.jpg" class="w-100"  style="width: 100px; height: 100px;" >'; 
                } elseif ($issue['status'] === 'В процессе') {
                  echo '<img src="blue.jpg" class="w-100"  style="width: 100px; height: 100px;">'; 
                }



                ?>
                <!--<img src="red.jpg" class="w-100" >-->
                
                  <div class="mask">
                    <div class="d-flex justify-content-start align-items-end h-100">
                      <h5><span class="badge bg-primary ms-2"><?= $issue['status']; ?></span></h5>
                    </div>
                  </div>
                  <!--<div class="hover-overlay">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </div>-->
                
              </div>
              <div class="card-body">
                <a href="" class="text-reset">
                  <h5 class="card-title mb-3"> 
                    <?php
                      if (strlen($issue['name'])>20){
                        echo substr($issue['name'],0,20).'...';   
                      } else{
                        echo $issue['name'];  
                      } ?></h5>
                </a>
                <a href="" class="text-reset opacity-75">
                  <p>
                    <?php
                      if (strlen($issue['description'])>50){

                        echo substr($issue['description'],0,50).'...';   
                      } else{
                        echo $issue['description'];
                      } ?></p>
                </a>
                <h6 class="mb-3">
                <a href="view_issue.php?id=<?= $issue['id']; ?>" class="btn btn-outline-info btn-floating">
                    <i class="fas fa-info"></i>
                </a>
                
                <?php
                  $author = $_SESSION['user']['unique_id'];
                  if (($issue['author'] === $author ) or ($issue['reciever'] === $author ) or ( $_SESSION['user']['admin'])){
                ?>
                

                  <a href="edit_issue.php?id=<?= $issue['id']; ?>" class="btn btn-outline-success btn-floating">
                    <i class="fas fa-marker"></i>
                  </a>
                  <a href="delete_issue.php?id=<?= $issue['id']; ?>" class="btn btn-danger btn-floating">
                    <i class="fas fa-trash"></i>
                  </a>
                <?php } else { ?>
                  <p class="opacity-50">Вы не можете обновить или удалить эту запись.</p>
                <?php  } ?>
                </h6>
              </div>
            </div>
          </div>

      <?php
            }
          }else {
              echo "<h5> Тут ничего нет </h5>";
          }?>
    </div>
<!--
    <div class="row">
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(23).webp"
              class="w-100" />
            <a href="#!">
              <div class="mask">
                <div class="d-flex justify-content-start align-items-end h-100">
                  <h5>
                    <span class="badge bg-success ms-2">Eco</span><span
                      class="badge bg-danger ms-2">-10%</span>
                  </h5>
                </div>
              </div>
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
            </a>
          </div>
          <div class="card-body">
            <a href="" class="text-reset">
              <h5 class="card-title mb-3">Product name</h5>
            </a>
            <a href="" class="text-reset">
              <p>Category</p>
            </a>
            <h6 class="mb-3">
              <s>$61.99</s><strong class="ms-2 text-danger">$50.99</strong>
            </h6>
          </div>
        </div>
      </div>


      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(17).webp"
              class="w-100" />
            <a href="#!">
              <div class="mask">
                <div class="d-flex justify-content-start align-items-end h-100"></div>
              </div>
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
            </a>
          </div>
          <div class="card-body">
            <a href="" class="text-reset">
              <h5 class="card-title mb-3">Product name</h5>
            </a>
            <a href="" class="text-reset">
              <p>Category</p>
            </a>
            <h6 class="mb-3">$61.99</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(30).webp"
              class="w-100" />
            <a href="#!">
              <div class="mask">
                <div class="d-flex justify-content-start align-items-end h-100">
                  <h5>
                    <span class="badge bg-primary ms-2">New</span><span
                      class="badge bg-success ms-2">Eco</span><span class="badge bg-danger ms-2">-10%</span>
                  </h5>
                </div>
              </div>
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
            </a>
          </div>
          <div class="card-body">
            <a href="" class="text-reset">
              <h5 class="card-title mb-3">Product name</h5>
            </a>
            <a href="" class="text-reset">
              <p>Category</p>
            </a>
            <h6 class="mb-3">
              <s>$61.99</s><strong class="ms-2 text-danger">$50.99</strong>
            </h6>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</section> 




<?php 
  include('footer.php');
?>
