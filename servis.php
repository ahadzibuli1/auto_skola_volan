<?php
require('./FunkcijeBaze.php');

$usluge = sveUsluge();

if(isset($_GET['id'])) {
    for ($i=0; $i < count($usluge) ; $i++) { 
        if($usluge[$i]->ID == $_GET['id'])
        {
            $mojaUsluga = $usluge[$i];
            break;
        }
    }
    header('Content-Type: application/json');
    global $mojaUsluga;
    echo json_encode($mojaUsluga, JSON_PRETTY_PRINT);
}
else 
   if(isset($_GET['idvar'])) {
       $flag = false;
    for ($i=0; $i < count($usluge) ; $i++) { 
       
        if($usluge[$i]->ID == $_GET['idvar'])
        {         
    $veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "anisa", "anisa");
    $veza->exec("set names utf8");  
   
    $upit = $veza->prepare("DELETE FROM usluge WHERE ID=?");
    $upit->bindValue(1, $_GET['idvar'], PDO::PARAM_INT);
    $flag = true;
    echo json_encode($upit->execute (), JSON_PRETTY_PRINT);
 

      }
  }
  echo json_encode($flag, JSON_PRETTY_PRINT);
}
else {
    header('Content-Type: application/json');
    echo json_encode($usluge, JSON_PRETTY_PRINT);
}
?>