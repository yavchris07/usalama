<!DOCTYPE html>
<html lang="en">
<?php require './header.php'?>

<section class='direction'>
    <div class='child'>
        <div class='chemin'>
            <h4>Usalama </h4>
            <p>Informez pour sauver des vies</p>
        </div>
        <p> Article / les articles </p>
    </div>
</section>

<div class="all-title">
    <h2>Les articles parlant de la securité </h2>
    <p>Usalama donne des infos de la securité  des différents quartiers de la ville de Goma</p>
</div>

<div class="recent-container">
    <?php
        require './admin/cores/db.php';
        $cover = $db->query("SELECT * FROM blogs ORDER BY id DESC");
        while($All = $cover->fetch()){
            echo"
                <div class='recent-card'>
                <a href='./article.php?article=".$All['id']."' class='card-link'>
                    <div class='card-child1'>
                        <img 
                            src='./admin/cores/images/".$All['photo_cover']."'
                            class=pic
                        >
                    </div>
                    <div class='card-child2'>
                    <div class='child1'>
                        <p>".$All['titre']."</p>
                    </div>
                        <div class='child2'>
                            <p>".$All['dates']."</p>
                            <p>".$All['heure']."</p>
                        </div>
                        </div>
                    </a>
                </div>
                
        ";}
    ?>
</div>

<?php require './footer.php'?>