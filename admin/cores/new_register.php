     <?php
    //  require './db.php';
    //  require './upload_file.php'
     ini_set('display_errors','1');
     error_reporting(E_ALL);
 
  function new_blog(){
  require './db.php';

  if(isset($_POST['titre'])
    AND isset($_POST['resumes']) 
    AND isset($_POST['dates']) 
    AND isset($_POST['heure'])
    AND isset($_FILES['photo_cover']) 
    AND isset($_POST['resumes2'])
    AND isset($_FILES['photo1']) 
    AND isset($_FILES['photo2']) 
    AND isset($_FILES['photo3'])
  ){
    //var_dump($_POST);
    //var_dump($_FILES);
     
   

    $titre = $_POST['titre'];
    $resumes = $_POST['resumes'];
    $dates = $_POST['dates'];
    $heure = $_POST['heure'];
    $photo_cover= $_FILES['photo_cover']['name'];
    $resumes2 = $_POST['resumes2'];
    $photo1= $_FILES['photo1']['name'];
    $photo2= $_FILES['photo2']['name'];
    $photo3= $_FILES['photo3']['name'];
    
    // $img_name= $_FILES['img']['name'];
    // $img_control= $_FILES['img']['tmp_name'];

    if(!empty($titre) 
      AND !empty($resumes) 
      AND !empty($dates) 
      AND !empty($heure) 
      AND !empty($photo_cover) 
      AND !empty($resumes2) 
      AND !empty($photo1) 
      AND !empty($photo2)
      AND !empty($photo3)
      ){
      $target = "./images/".basename($_FILES['photo_cover']['name']);
      $target1 = "./images/".basename($_FILES['photo1']['name']);
      $target2 = "./images/".basename($_FILES['photo2']['name']);
      $target3 = "./images/".basename($_FILES['photo3']['name']);

      //(titre,resumes,dates,heure,photo_cover,resumes2,photos1,photo2,photo3)
      $res = $db->exec("INSERT into blogs (titre,resumes,dates,heure,photo_cover,resumes2,photos1,photo2,photo3) values ('".$titre."','".$resumes."','".$dates."','".$heure."','".$photo_cover."','".$resumes2."','".$photo1."','".$photo2."','".$photo3."')");
      if($res){
        echo 'Reussi ajout avec succes!';
        if(move_uploaded_file($_FILES['photo_cover']['tmp_name'],$target) 
          AND move_uploaded_file($_FILES['photo1']['tmp_name'],$target1) 
          AND move_uploaded_file($_FILES['photo2']['tmp_name'],$target2) 
          AND move_uploaded_file($_FILES['photo3']['tmp_name'],$target3)
        ){
          echo "Images enregistrez avec Raha sana";
          header('location: ../ajoute_blog.php');
          exit();
        }
        else{
          echo "Erreur de placement de l'image dans le fichier";
        }
      }
      else{ echo 'Erreur due à l\'enregistrement ';}
    }
    else{ echo 'Vous devez remplir tous les champs !';
    }

  }
  else{
    echo "Erreur les variables ne sont pas recup !";
  }

}

//delete
function delete_blog(){
  require './db.php';
  if(isset($_GET['delete'])){
    $id = ($_GET['delete']);
    //var_dump($id);
    if (is_numeric($id)) {
      //require './admin/cores/db.php';
      $query = $db->query("DELETE FROM blogs WHERE id='".$id."'");
      //$val= $query->exec();
      if($query){
        echo "<div class='form-group'>
                <div class='col-sm-10 col-sm-offset-2'>
                  <?php echo Suppression reussie; ?>    
                </div>
              </div>";
        header('location: ../ajoute_blog.php');
        exit(); 
      }else{
        echo "Erreur due à la suppression !";
      }
    }
  }
}

//update blog


//lauch
if(isset($_POST['save'])){
  new_blog();
}
if(isset($_GET['delete'])){
  delete_blog();
}
// echo "hello ";
