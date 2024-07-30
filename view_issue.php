<?php 

  require 'dbcon.php';
?>

<?php 
  include('header.php');
?>
<?php include "navbar.php"; ?> 
 <section style="background-color: #eee; height: 700px;">
    <div class="container ">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Просмотр задачи
                            <a href="all_issues.php" class="btn btn-danger float-end">В главное меню</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    
                        <?php 
                            if (isset($_GET['id'])){
                                #echo $student_id = $_GET['id'];
                                $issue_id = mysqli_real_escape_string($con, $_GET['id']);
                                $query = "SELECT * FROM issues WHERE id='$issue_id' ";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0){
                                    $issue = mysqli_fetch_array($query_run);
                                    #print_r($student);
                                    ?>



                                    
                                        <input type="hidden" name="issue_id" value="<?= $issue['id'];?>">

                                        <div class="mb-3">
                                            <label class="popup" onclick="myFunction('myPopup1')">Название
                                                <i class="fa fa-question-circle-o " aria-hidden="true">
                                                    <span class="popuptext" id="myPopup1">Название задачи</span>
                                                </i>
                                            </label>
                                            <p class="form-control">
                                               <?= $issue['name']?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="popup" onclick="myFunction('myPopup2')">Имя проекта
                                                <i class="fa fa-question-circle-o" aria-hidden="true">
                                                    <span class="popuptext" id="myPopup2">Название проекта</span>
                                                </i>
                                            </label>
                                            <p class="form-control">
                                                <?= $issue['project_name']?>
                                            </p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="popup" onclick="myFunction('myPopup3')">Автор
                                                <i class="fa fa-question-circle-o" aria-hidden="true">
                                                    <span class="popuptext" id="myPopup3">Автор задачи</span>
                                                </i>                                 
                                            </label>
                                            <p class="form-control">
                                              <?php
                                                $author = $issue['author'];
                                                $query = "SELECT * FROM users WHERE `unique_id` = '$author'";
                                                $query_run = mysqli_query($con, $query);

                                                if (mysqli_num_rows($query_run) > 0){
                                                  foreach ($query_run as $user){ 

                                                    echo $user['fname'].'  '.$user['lname']; ?>
                                             
                                                      
                                            </p>
                                            <?php
                                                }}
                                            ?>

                                        <div class="mb-3">
                                            <label class="popup" onclick="myFunction('myPopup9')">Тип
                                                <i class="fa fa-question-circle-o" aria-hidden="true">
                                                    <span class="popuptext" id="myPopup9">Тип созданной задачи</span>
                                                </i>                                 
                                            </label>
                                            <p class="form-control">
                                                <?= $issue['type']?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                             <label class="popup" onclick="myFunction('myPopup4')">Статус
                                                <i class="fa fa-question-circle-o" aria-hidden="true">
                                                    <span class="popuptext" id="myPopup4">Процесс выполнения задачи</span>
                                                </i>
                                            </label>
                                            <p class="form-control">
                                                <?= $issue['status']?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="popup" onclick="myFunction('myPopup6')">Кому
                                                        <i class="fa fa-question-circle-o" aria-hidden="true">
                                                            <span class="popuptext" id="myPopup6">Кому данная задача адресована</span>
                                                        </i>
                                                    </label>
                                            <p class="form-control">

                                            <?php
                                                $reciev = $issue['reciever'];
                                                $query = "SELECT * FROM users WHERE `unique_id` = '$reciev'";
                                                $query_run = mysqli_query($con, $query);

                                                if (mysqli_num_rows($query_run) > 0){
                                                  foreach ($query_run as $user){ 

                                                    echo $user['fname'].'  '.$user['lname']; ?>
                                             
                                                      
                                            </p>
                                            <?php
                                                }}
                                            ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="popup" onclick="myFunction('myPopup11')">Описание
                                                        <i class="fa fa-question-circle-o" aria-hidden="true">
                                                            <span class="popuptext" id="myPopup11">Описание задачи</span>
                                                        </i>
                                                    </label>
                                            <p class="form-control">
                                                <?= $issue['description']?>
                                            </p>
                                        </div>

                                 
                                           <?php
                                } else {
                                    echo "<h4>Такой задачи не существвует</h4>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
  include('footer.php');
?>
