<?php 
try {
  //code...

  // $db= new PDO('mysql:host=localhost;dbname=baruvine_baruvi_database','baruvine_baruvine','R#QcXq5?TiDH');
  // $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  //switch(){}
  //if(){}else{}
  $db= new PDO('mysql:host=localhost;dbname=usalama_database','root','');
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  } catch (\Exceptions $e) {
  echo $e->getMessage();
}

?>