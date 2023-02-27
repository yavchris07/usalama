<?php
function new_admin(){
  require './db.php';
  if(isset($_POST['nom']) AND isset($_POST['email']) AND isset($_POST['password'])){
    var_dump($_POST);
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$img= $_FILES['img']['name'];

    if(!empty($nom) AND !empty($email) AND !empty($password)){
      //AND !empty($img_control
      //$target = "../../images/".basename($_FILES['img']['name']);

      $res = $db->exec("INSERT into user (nom,email,passwords) values ('".$nom."','".$email."','".$password."')");
      if($res){
        echo "<div class='form-group'>
        <div class='col-sm-10 col-sm-offset-2'>
          <?php echo Suppression reussie; ?>    
        </div>
      </div>";
        header('location: ../ajoute_admin.php');
        // if(move_uploaded_file($_FILES['img']['tmp_name'],$target)){
        //   echo "Image enregistrez avec Raha sana";
        //   header('location: ../ajoute_tunique.php');
        //   exit();
        // }
        // else{
        //   echo "Erreur de placement de l'image dans le fichier";
        // }
      }
      else{ echo 'Erreur à l\'insertion d\'admin';}
    }
    else{ echo 'Vous devez remplir tous les champs !';}
  }
  else{
    echo "Erreur les variales n'existent pas !";
  }
}

function delete_admin(){
  require './db.php';
  if(isset($_GET['delete'])){
    $id = ($_GET['delete']);
    //var_dump($id);
    if (is_numeric($id)) {
      //require './admin/cores/db.php';
      $query = $db->query("DELETE FROM user WHERE id='".$id."'");
      //$val= $query->exec();
      if($query){
        header('location: ../ajoute_admin.php');
        exit(); 
      }else{
        echo "Erreur due à la suppression !";
      }
    }
  }
}

if(isset($_POST['ajout'])){
    new_admin();
}
if(isset($_GET['delete'])){
  delete_admin();
}