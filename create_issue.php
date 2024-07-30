<?php 
  session_start();
?>

<?php 
  include('dbcon.php');
?>

<?php 
  include('header.php');
?>

 <?php include "navbar.php"; ?> 

  <section style="background-color: #eee; height: 800px;">
    <div class="container">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Создание новой задачи</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label class="popup" onclick="myFunction('myPopup1')">Название
                                    <i class="fa fa-question-circle-o " aria-hidden="true">
                                        <span class="popuptext" id="myPopup1">Введите название задачи</span>
                                    </i>
                                </label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="mb-3">
                                 <label class="popup" onclick="myFunction('myPopup2')">Имя проекта
                                    <i class="fa fa-question-circle-o" aria-hidden="true">
                                        <span class="popuptext" id="myPopup2">Введите название проекта</span>
                                    </i>
                                </label>
                                <input type="text" name="project_name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="popup" onclick="myFunction('myPopup3')">Тип
                                    <i class="fa fa-question-circle-o" aria-hidden="true">
                                        <span class="popuptext" id="myPopup3">Введите тип задачи</span>
                                    </i>                                 
                                </label>
                             
                                <br>
                                <select name="type" class="form-select" >
                                        <option value="Фича">Фича</option>
                                        <option value="Баг">Баг</option>
                                        <option value="Заметка">Заметка</option>
                                </select>
                            </div>
                            
                            <?php echo mysqli_error($con);?>
                            <div class="mb-3">
                                <label class="popup" onclick="myFunction('myPopup4')">Статус
                                    <i class="fa fa-question-circle-o" aria-hidden="true">
                                        <span class="popuptext" id="myPopup4">Укажите статус выполнения задачи</span>
                                    </i>
                                </label>
                                
                                <br>
                                <select name="status" class="form-select">
                                        <option value="Создано">Создано</option>
                                        <option value="В процессе">В процессе</option>
                                        <option value="Выполнено">Выполнено</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="popup" onclick="myFunction('myPopup5')">Кому
                                    <i class="fa fa-question-circle-o" aria-hidden="true">
                                        <span class="popuptext" id="myPopup5">Выберете, кому адресована задачу</span>
                                    </i> 
                                </label>
                             
                               
                                <br>
                                <select name="reciever" class="form-select">
                                     <?php
                                        $query = "SELECT * FROM users";
                                        $query_run = mysqli_query($con, $query);

                                        if (mysqli_num_rows($query_run) > 0){
                                          foreach ($query_run as $user){ ?>
                                                <option value="<?php echo $user['unique_id']; ?>"><?php echo $user['fname'].'  '.$user['lname']; ?></option>
                                        <?php
                                            }
                                          }else {

                                             ?>
                                             <option value="Никто">Нет доступных пользователей</option>
                                             <?php
                                          }?>
                                        
                                </select>
                            </div>
                        
                            <div class="mb-3 md-form mb-4">
                                 <label class="popup" onclick="myFunction('myPopup6')">Описание
                                    <i class="fa fa-question-circle-o" aria-hidden="true">
                                        <span class="popuptext" id="myPopup6">Введите описание задачи</span>
                                    </i>
                                </label>
                             
                                
                                <br>
                                <textarea id="form18" class="md-textarea form-control" rows="3" name="description" cols="100"></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="save_issue" class="btn btn-primary">Сохранить</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?php 
  include('footer.php');
?>





