<!DOCTYPE html>
<html lang="en">

<?php require "./includes/head.php" ?>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
   <?php require "./includes/sidebar.php" ?>

    <!-- fin nav bar partial -->

   <?php require "./includes/header.php" ?>

   <?php
   require './cores/db.php';
   //Total d'articles
   $total_blogs = $db->query("select count(*) from blogs")->fetchColumn(); 
   echo $total_blogs;
   //Total user
   $user = $db->query("select count(*) from user")->fetchColumn(); 
   echo $user;

   ?>

   <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Usalama</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page"><a href="#">Tableau de bord</a></li>
                  <li class="breadcrumb-item"><a href="./ajoute_admin.php">User</a></li>
                  <li class="breadcrumb-item"><a href="./ajoute_blog.php">Blog</a></li>
                </ol>
              </nav>
            </div>
    
              <div class="row">

                <div class="col-sm-4 stretch-card grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="card-title"> Total utilisateurs(admin) <small class="d-block text-muted">Chez usalama </small>
                        </div>
                        <div class="d-flex text-muted font-20">
                          <i class="mdi mdi-printer mouse-pointer"></i>
                          <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
                        </div>
                      </div>
                      <h3 class="font-weight-bold mb-0">
                        <span class="text-success h5">=></span>
                        <?php echo $user ?>
                        <i class="mdi mdi-arrow-up"></i>
                      </h3>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4 stretch-card grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="card-title"> Total Article Usalama <small class="d-block text-muted"> chez usalama</small>
                        </div>
                        <div class="d-flex text-muted font-20">
                          <i class="mdi mdi-printer mouse-pointer"></i>
                          <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
                        </div>
                      </div>
                        <h3 class="font-weight-bold mb-0">
                          <span class="text-success h5">=></span>
                          <?php echo $total_blogs ?>
                          <i class="mdi mdi-arrow-up"></i>
                      </h3>
                    </div>
                  </div>
                </div>

               
              </div>

            </div>
  
 <?php //require "./includes/js.php" ?> 
</body>
</html>