<!DOCTYPE html>
<html lang="en">
<?php require './header.php'?>

<section class='direction'>
    <div class='child'>
        <div class='chemin'>
            <h4>Usalama </h4>
            <p>Informez pour sauver des vies</p>
        </div>
        <p> Accueil /  article </p>
    </div>
</section>

<!-- all in the boucle -->
<?php
  require './admin/cores/db.php';
    
    if(isset($_GET['article'])){
      $id = ($_GET['article']);
      //var_dump($id);
      if (is_numeric($id)) {
        //require './admin/cores/db.php';
        $query = $db->query("SELECT * FROM blogs WHERE id='".$id."'");
        $choose= $query->fetch();
        //var_dump($choisi);
        //echo $choisi;
        if ($choose) { 
        //var_dump($choisi);
        $titre=$choose['titre'];
        $resumes = $choose['resumes'];
        $dates = $choose['dates'];
        $heure = $choose['heure'];
        $photo_cover= $choose['photo_cover'];
        $resumes2 = $choose['resumes2'];
        $photo1= $choose['photos1'];
        $photo2= $choose['photo2'];
        $photo3= $choose['photo3']; 
?>
<div class="all-title">
    <h2>Titre : <?php echo $titre;?></h2>
</div>

<div class="single-card-container">
    <hr  class="hr">
        <div class="share">
            <div class="part-one">
                <p>Le <?php echo $dates;?></p>
                <p> A <?php echo $heure;?></p>
            </div>
            <div class="part-three">
                <a href="">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="">
                    <i class="fa-brands fa-linkedin"></i>
                </a>   
            </div>
        </div>
    <hr class="hr">

    <div class='start'>
        <img
            src="./admin/cores/images/<?php echo $photo_cover; ?>" 
            alt="" 
            class='start-picture'
        >
    </div>
    <div>
        <?php echo $resumes; ?>
    </div>
        
    <div class='partie-deux'>
        <img 
            src="./admin/cores/images/<?php echo $photo1; ?>" 
            alt=""
            class='image2'
        >
        <div class='image3'>
            <img 
                class='sous-un'
                src="./admin/cores/images/<?php echo $photo2; ?>" 
                alt="" srcset=""
            >
            <img 
                src="./admin/cores/images/<?php echo $photo3; ?>" 
                alt=""
                class='sous-deux'
            >
        </div>
    </div>
        
    <div>
        <?php echo $resumes2; ?>
        <hr>
    </div>
    <h3 class='read-more'>Lire aussi</h3>
    <div class='more-article'>
        <?php
            require './admin/cores/db.php';
            $more = $db->query("SELECT * FROM blogs ORDER BY id DESC limit 5");
            while($all = $more->fetch()){
                echo"
                    <div class='more-card'>
                        <img 
                            src='./admin/cores/images/".$all['photo_cover']."'
                            class=pic
                        >
                        <h4>".$all['titre']."</h4>
                        <a href='./article.php?article=".$all['id']."''>
                            Lire
                        </a>
                    </div>        
                "
            ;}
        ?>
    </div>
</div>

<?php }}}?>

<?php require './footer.php'?>