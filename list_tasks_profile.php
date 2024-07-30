
  <div class="card-body d-flex justify-content-between" style="overflow-x: auto; ">
   
                    <?php
                    	$author = $_SESSION['user']['unique_id'];
                        $query = "SELECT * FROM issues WHERE `author` = '$author'";
                        $query_run = mysqli_query($con, $query);

                       if (mysqli_num_rows($query_run) > 0){
                          foreach ($query_run as $issue){
                            
                          ?>

                          <div class="col-lg-4 mb-2">
                          

                          <div class="card shadow-lg p-3 mb-5 bg-white rounded  ml-3 mr-3" style="width: 18rem; ">
                            <div class="card-body">
                              <p class="card-title text-end lh-1 text-danger"><?= $issue['status']; ?></p>
                              <p class="card-title border-bottom fs-4">

                              <?php
                              if (strlen($issue['name'])>1){
                                echo substr($issue['name'],0,20).'...'; 
                                
                              } else{
                                echo $issue['name'];
                                
                              } ?> </p>
                              
                          



                              <p class="card-text"><?php
                              if (strlen($issue['description'])>1){
                                echo substr($issue['description'],0,20).'...'; 
                                
                              } else{
                                echo $issue['description'];
                                
                              } ?></p>
                              
                   
                              <a href="view_issue.php?id=<?= $issue['id']; ?>" class="btn btn-outline-info mt-1">Подробнее</a>

                              <a href="edit_issue.php?id=<?= $issue['id']; ?>" class="btn btn-outline-success mt-1">Редактировать</a>

                               <a href="delete_issue.php?id=<?= $issue['id']; ?>"class="btn btn-danger mt-1">Удалить</a>


                            </div>
                          </div>

                        </div>
                          
                          <?php
                          }
                       } else {
                          echo "<h5> Тут ничего нет </h5>";
                       }
                    ?>
   
            </div>

			

                <!--
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            -->
              </div>
            </div>
          </div>
          <!--
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>