<!DOCTYPE html>
<html lang="en">

<?php require "./includes/head.php" ?>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
  <?php
 require "./includes/sidebar.php" ?>

    <!-- fin nav bar partial -->

   <?php require "./includes/header.php" ;?>

<div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Usalama</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./dashboard.php">Admin</a></li>
                  <li class="breadcrumb-item"><a href="./ajoute_admin.php">Vers User</a></li>
                </ol>
              </nav>
            </div>
         
 
     
  <div class="col-8 grid-margin stretch-card">
              
    <div class="card">
      <div class="card-body">
        <h3 class="">Ajout blog ou article</h3>
          <p class="card-description">Informez pour sauver des vies</p>
            <form 
              class="forms-sample"  
              method="post" 
              enctype="multipart/form-data" 
              action="./cores/new_register.php"
              >
              <div class="form-group">
                <label for="title">Titre</label>
                <input 
                  name="titre" 
                  <?php if(isset($_POST['titre'])){ $titre=$_POST['titre'];?>
                  value="<?php echo $titre ;} ?>" 
                  type="text"  
                  class="form-control" 
                  id="titre" 
                  placeholder="Titre de l'article">
              </div>
              <div class="form-group">
                <label for="">Date</label>
                <input 
                  name="dates" 
                  <?php if(isset($_POST['dates'])){ $dates=$_POST['dates'];?>
                  value="<?php echo $dates;} ?>" 
                  type="date"  
                  class="form-control" 
                  id="date" 
                  placeholder="La date">
              </div>
              <div class="form-group">
                <label for="heure">Heure</label>
                <input 
                  name="heure" 
                  <?php if(isset($_POST['heure'])){ $heure=$_POST[' heure'];?>
                  value="<?php echo $heure;} ?>" 
                  type="time"
                  class="form-control" 
                  id="heure" 
                  placeholder="Inserrez l'heure">
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Resume1</label>
                <textarea 
                  class="form-control" 
                  id="exampleTextarea1" 
                  rows="4"
                  name="resumes"
                  <?php if(isset($_POST['resumes'])){ $resumes=$_POST['resumes'];?>
                  value="<?php echo $resumes;} ?>" 
                  >
                </textarea>
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Resume2</label>
                <textarea 
                  class="form-control" 
                  id="exampleTextarea1" 
                  rows="4"
                  name="resumes2"
                  <?php if(isset($_POST['resumes2'])){ $resumes2=$_POST['resumes2'];?>
                  value="<?php echo $resumes2;} ?>" 
                  >
                </textarea>
              </div>
              <div class="form-group">
                <label for="images_title">Image de couverture</label>
                <input 
                  name="photo_cover" 
                  <?php if(isset($_FILES['photo_cover'])){ $photo_cover=$_FILES['photo_cover'];?>
                  value="<?php echo $photo_cover;} ?>" 
                  type="file"  
                  class="form-control" 
                  id="photo-cover" 
                  placeholder="Photo de couverture ">
              </div>
              <div class="form-group">
                <label for="images_title">Image 1</label>
                <input 
                  name="photo1" 
                  <?php if(isset($_FILES['photo1'])){ $photo1=$_FILES['photo1'];?>
                  value="<?php echo $photo1;} ?>" 
                  type="file"  
                  class="form-control" 
                  id="photo1" 
                  placeholder="Photo 1 ">
              </div>
              <div class="form-group">
                <label for="images_title">Image 2</label>
                <input 
                  name="photo2" 
                  <?php if(isset($_FILES['photo2'])){ $photo2=$_FILES['photo2'];?>
                  value="<?php echo $photo2;} ?>" 
                  type="file"  
                  class="form-control" 
                  id="photo2" 
                  placeholder="photo 3">
              </div>
              <div class="form-group">
                <label for="images_title">Image 3</label>
                <input 
                  name="photo3" 
                  <?php if(isset($_FILES['photo3'])){ $photo3=$_FILES['photo3'];?>
                  value="<?php echo $photo3;} ?>" 
                  type="file"  
                  class="form-control" 
                  id="photo3" 
                  placeholder="photo 3">
              </div>
              <button 
                type="submit" 
                name="save"
                class="btn btn-primary mr-2"
              > 
              Enregistrer 
              </button>
                      
            </form>
          </div>
      </div>
    </div>   

   
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Les article de Usalama</h4>
                    <p class="card-description"> Informez pour sauver des<code>vies</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                          <th>ID</th>
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>couverture</th>
                            <th>Operations</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php require './cores/db.php';

                        $response = $db->query("SELECT * from blogs");
                        while($all_blog = $response->fetch()){                       
                          echo "<tr> 
                                  <td>".$all_blog['id']."</td>
                                  <td>".$all_blog['titre']."</td>
                                  <td>".$all_blog['dates']."</td>
                                  <td>".$all_blog['heure']."</td>
                                  <td>
                                    <img
                                    style='height:40px; width:40px;border:1px solid #1e377c'
                                    src='./cores/images/".$all_blog['photo_cover']."' 
                                    />
                                  </td>
                                  <td>
                                  <a 
                                    style=color:red; 
                                    font-size:20px
                                    href='./cores/new_register.php?delete=".$all_blog['id']."'
                                  >
                                    <i class='fa fa-trash-o fa-lg'></i>
                                    Supp.
                                  </a>
                                </td>
                                </tr>";
                        }        
                        ?>                         
              </tbody>
            <?php $response->closeCursor();?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

  <!-- container-scroller -->
  <!-- plugins:js -->
<?php //require "./includes/js.php" ?>
</body>

</html>