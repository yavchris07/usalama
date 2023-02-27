<!DOCTYPE html>
<html lang="en">
<?php 
    require  './header.php';
    //fetching data
?>


    <section class='usalama'>
        <div class='child'>
            <h4>USALAMA </h4>
            <p class='slogan'>INFORMEZ POUR SAUVEZ DES VIES</p>
            <p>Nos articles portent sur de zones que vous devrez imperativement éviter, des choses que vous pouvez ou ne pouvez pas faire pour garantir votre securité dans la vie de Goma</p>
        </div>
            
    </section>

    <div class="all-title">
        <h4>Les plus recents</h4>
        <!-- <hr /> -->
    </div>

     <!-- <div class="online"> -->
        <div class="carousel">
            <div class="carousel-inner">

            <?php
                require './admin/cores/db.php';
                $cover = $db->query("SELECT  * FROM blogs ORDER BY id DESC limit 5");
                while($All = $cover->fetch()){
                    echo "
                    <div 
                        class='carousel-item'
                        style='background-color: rgba(235, 149, 50, 0.5)' 
                    >
                        <img 
                            style='width: 100%; height: 100%; object-fit: cover;'
                            src='./admin/cores/images/".$All['photo_cover']."'
                            alt=''
                        />
                    </div>
                    ";
                }
            ?> 
                <!-- <div 
                    style="background-color: rgba(235, 149, 50, 0.5);" 
                    class="carousel-item"
                >
                    <img 
                    src="" 
                    style="width: 100%; height: 100%; object-fit: cover;">
                </div> -->
            </div>

            <div class="carousel-controls">
              <span class="prev"></span>
              <span class="next"></span>
            </div>
            <div class="carousel-indicators"></div>
        </div>
    <!-- </div>  -->


    <div class="all-title">
        <h2>Un peu de lecture vous fera du bien </h2>
        <p>Les infos ici concernent la securité dans différents quartiers de la ville de Goma</p>
    </div>

    <div class="recent-container">
        
        <?php
            require './admin/cores/db.php';
            $cover = $db->query("SELECT * FROM blogs ORDER BY id DESC limit 9");
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

    <div class="all-buttons-container">
        <a href="./les-articles-usalama.php">
            <button class="all-button-more">Lire plus</button>
        </a>
    </div>
 
<?php require './footer.php';?>