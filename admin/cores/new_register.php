     <?php
    //  require './db.php';
    //  require './upload_file.php'
     ini_set('display_errors','10');
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
    var_dump($_POST);
    var_dump($_FILES);
     
   

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
      //AND !empty($img_control
      $target = "./images/".basename($_FILES['photo_cover']['name']);
      $target1 = "./images/".basename($_FILES['photo1']['name']);
      $target2 = "./images/".basename($_FILES['photo2']['name']);
      $target3 = "./images/".basename($_FILES['photo3']['name']);

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
        header('location: ../ajoute_blogs.php');
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

/*
L'ENIAC utilise des compteurs à anneaux à dix positions pour enregistrer les chiffres ; chaque chiffre nécessite à cet effet 36 tubes électroniques. L'arithmétique est réalisée en comptant les pulsations avec les anneaux et en générant des pulsations lorsque le compteur fait un tour. L'idée revient en fait à simuler par l'électronique les systèmes de roue à chiffres des machines électromécaniques.

Sa capacité est de vingt nombres à dix chiffres signés permettant chacun de réaliser 5 000 additions simples chaque seconde (pour un total de 100 000 additions par seconde). Il ne peut en revanche gérer en moyenne que 357 multiplications ou 38 divisions par seconde ou trois extractions de racine par seconde. Les entrées-sorties se font au moyen de cartes perforées, à la vitesse de 133 caractères par seconde10.

L'ENIAC est remarquablement volumineux : il contient 17 468 tubes à vide, 7 200 diodes à cristal, 1 500 relais, 70 000 résistances, 10 000 condensateurs, 300 voyants lumineux pour l'affichage continu de l'état des registres, et environ 5 millions de soudures faites à la main11. Deux ventilateurs massifs de 20 cv chacun permettent l'extraction de la chaleur générée par l'ensemble12. Son poids est de 30 t pour des dimensions de 2,4 × 0,9 × 30,5 m occupant une surface de 167 m2 (1 800 pieds carrés)13. Sa consommation est de 150 kW.

Il utilise des tubes à vide à 8 broches, les accumulateurs décimaux sont réalisés avec des bascules 6SN7, alors que les fonctions logiques utilisent des 6L7, 6SJ7, 6SA7 et 6AC7. De nombreux 6L6 et 6V6 servent de relais pour acheminer les pulsations entre les différents racks d'éléments.

Certains experts en électronique prédirent que les tubes tomberaient en panne si fréquemment que la machine en serait inutilisable. La prédiction n'était que partiellement correcte, de nombreux tubes brûlaient chaque jour laissant l'ENIAC inopérant la moitié du temps. Des lampes plus fiables ne furent disponibles qu'à partir de 1948, Eckert et Mauchly durent donc utiliser des tubes de qualité standard. La plupart des problèmes liés aux tubes se produit au démarrage ou à l'arrêt de la machine car ils sont soumis à un important stress thermique. Le simple fait de ne jamais couper la machine, permet aux ingénieurs de réduire le nombre de pannes à un ou deux tubes par jour. La plus longue période de calcul sans panne est atteinte en 1954 avec 116 heures, ce qui est une prouesse compte tenu de la technologie de l'époque.

Une cause fL'ENIAC utilise des compteurs à anneaux à dix positions pour enregistrer les chiffres ; chaque chiffre nécessite à cet effet 36 tubes électroniques. L'arithmétique est réalisée en comptant les pulsations avec les anneaux et en générant des pulsations lorsque le compteur fait un tour. L'idée revient en fait à simuler par l'électronique les systèmes de roue à chiffres des machines électromécaniques.

Sa capacité est de vingt nombres à dix chiffres signés permettant chacun de réaliser 5 000 additions simples chaque seconde (pour un total de 100 000 additions par seconde). Il ne peut en revanche gérer en moyenne que 357 multiplications ou 38 divisions par seconde ou trois extractions de racine par seconde. Les entrées-sorties se font au moyen de cartes perforées, à la vitesse de 133 caractères par seconde10.

L'ENIAC est remarquablement volumineux : il contient 17 468 tubes à vide, 7 200 diodes à cristal, 1 500 relais, 70 000 résistances, 10 000 condensateurs, 300 voyants lumineux pour l'affichage continu de l'état des registres, et environ 5 millions de soudures faites à la main11. Deux ventilateurs massifs de 20 cv chacun permettent l'extraction de la chaleur générée par l'ensemble12. Son poids est de 30 t pour des dimensions de 2,4 × 0,9 × 30,5 m occupant une surface de 167 m2 (1 800 pieds carrés)13. Sa consommation est de 150 kW.

Il utilise des tubes à vide à 8 broches, les accumulateurs décimaux sont réalisés avec des bascules 6SN7, alors que les fonctions logiques utilisent des 6L7, 6SJ7, 6SA7 et 6AC7. De nombreux 6L6 et 6V6 servent de relais pour acheminer les pulsations entre les différents racks d'éléments.

Certains experts en électronique prédirent que les tubes tomberaient en panne si fréquemment que la machine en serait inutilisable. La prédiction n'était que partiellement correcte, de nombreux tubes brûlaient chaque jour laissant l'ENIAC inopérant la moitié du temps. Des lampes plus fiables ne furent disponibles qu'à partir de 1948, Eckert et Mauchly durent donc utiliser des tubes de qualité standard. La plupart des problèmes liés aux tubes se produit au démarrage ou à l'arrêt de la machine car ils sont soumis à un important stress thermique. Le simple fait de ne jamais couper la machine, permet aux ingénieurs de réduire le nombre de pannes à un ou deux tubes par jour. La plus longue période de calcul sans panne est atteinte en 1954 avec 116 heures, ce qui est une prouesse compte tenu de la technologie de l'époque.

Une cause fréquente de panne était la combustion d'un insecte sur un tube chaud, provoquant un stress thermique local et la rupture de l'ampoule de verre. Le terme anglais désignant un insecte est bug. Ce terme, par extension, serait devenu synonyme de dysfonctionnement informatique

Unité d’initialisation : Permet d'allumer et éteindre la machine, tester les unités, lancer un programme, et réinitialiser l'état des accumulateurs. Comme chaque unité, l'unité d'initialisation dispose également d'un contrôle de préchauffage des tubes électroniques lors de la séquence de démarrage.
Unité de cycle : Contient l’horloge maître, cadencée à 100 kHz. Synchronise les modules entre eux et permet l'exécution pas-à-pas pour le débogage. Possède un oscilloscope de contrôle affichant les pulses en circulation dans la machine.
Programmeur maître (deux panneaux) : Unité de haut niveau permettant de scinder le programme en fonctions, appeler ces fonctions, ainsi que programmer les boucles, les branchements conditionnels et les modifications de séquence dans le programme. Le programmeur maître permet le branchement de 10 actions différentes en fonction de la valeur d'un chiffre18, de façon analogue à l'instruction « switch » des langages de programmation. Les fonctions, elles, sont implémentées sous forme de dix « steppers » autorisant chacun le lancement d'une séquence de six boucles, et permettant également la création de boucles imbriquées.18 Cette possibilité de programmer des fonctions, des sauts conditionnels et des boucles imbriquées distingue l'ENIAC de ses prédécesseurs.
Tables de fonction 1 (deux panneaux) : Larges mémoires mortes contenant les données numériques et les formules du programme. Leur utilisation est générique, elles peuvent également contenir des tables de correspondances, ou trigonométriques ou à tout autre usage pertinent pour le programme.
Accumulateurs 1 et 2 : Les accumulateurs constituent tant la mémoire que la puissance de calcul de l'ENIAC. Chacun des vingt accumulateurs possède une mémoire de 10 chiffres décimaux, ainsi qu'un circuit d’addition-soustraction à cinq entrées (désignées par des lettres grecques) et deux sorties (A pour addition et S pour soustraction). Ils peuvent également être appairés pour travailler sur des nombres de 20 chiffres décimaux.
Diviseur et extracteur de racine carrée. Le diviseur-extracteur réquisitionne et pilote les accumulateurs adjacents 2, 3, 5 et 7 pour son fonctionnement19. Ces accumulateurs servent au calcul et stockage du numérateur (dividende ou radicande), du dénominateur (diviseur ou racine), du quotient, et un dernier sert enfin      réquente de panne était la combustion d'un insecte sur un tube chaud, provoquant un stress thermique local et la rupture de l'ampoule de verre. Le terme anglais désignant un insecte est bug. Ce terme, par extension, serait devenu synonyme de dysfonctionnement informatique

Unité d’initialisation : Permet d'allumer et éteindre la machine, tester les unités, lancer un programme, et réinitialiser l'état des accumulateurs. Comme chaque unité, l'unité d'initialisation dispose également d'un contrôle de préchauffage des tubes électroniques lors de la séquence de démarrage.
Unité de cycle : Contient l’horloge maître, cadencée à 100 kHz. Synchronise les modules entre eux et permet l'exécution pas-à-pas pour le débogage. Possède un oscilloscope de contrôle affichant les pulses en circulation dans la machine.
Programmeur maître (deux panneaux) : Unité de haut niveau permettant de scinder le programme en fonctions, appeler ces fonctions, ainsi que programmer les boucles, les branchements conditionnels et les modifications de séquence dans le programme. Le programmeur maître permet le branchement de 10 actions différentes en fonction de la valeur d'un chiffre18, de façon analogue à l'instruction « switch » des langages de programmation. Les fonctions, elles, sont implémentées sous forme de dix « steppers » autorisant chacun le lancement d'une séquence de six boucles, et permettant également la création de boucles imbriquées.18 Cette possibilité de programmer des fonctions, des sauts conditionnels et des boucles imbriquées distingue l'ENIAC de ses prédécesseurs.
Tables de fonction 1 (deux panneaux) : Larges mémoires mortes contenant les données numériques et les formules du programme. Leur utilisation est générique, elles peuvent également contenir des tables de correspondances, ou trigonométriques ou à tout autre usage pertinent pour le programme.
Accumulateurs 1 et 2 : Les accumulateurs constituent tant la mémoire que la puissance de calcul de l'ENIAC. Chacun des vingt accumulateurs possède une mémoire de 10 chiffres décimaux, ainsi qu'un circuit d’addition-soustraction à cinq entrées (désignées par des lettres grecques) et deux sorties (A pour addition et S pour soustraction). Ils peuvent également être appairés pour travailler sur des nombres de 20 chiffres décimaux.
Diviseur et extracteur de racine carrée. Le diviseur-extracteur réquisitionne et pilote les accumulateurs adjacents 2, 3, 5 et 7 pour son fonctionnement19. Ces accumulateurs servent au calcul et stockage du numérateur (dividende ou radicande), du dénominateur (diviseur ou racine), du quotient, et un dernier sert enfin      


*/

