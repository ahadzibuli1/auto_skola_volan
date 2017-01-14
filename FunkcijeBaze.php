<?php

//ova dva hosta su host za deploy i host za lokalnu bazu... ja sam Vam ostavila host za bazu na deploymentu jer sam to posljednje komitala, da mi proradi deployment


$host = getenv('MYSQL_SERVICE_HOST');
//$host = "localhost";


     function sveUsluge(){
         global $host;
     $veza = new PDO("mysql:dbname=wt8;host=$host;charset=utf8", "anisa", "anisa");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select ID, ime, opis from usluge");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
    
    $mojRezultat = [];

    foreach($rezultat as $usluga)
     {
         $mojaUsluga = new stdClass;
         $mojaUsluga -> ID = $usluga['ID'];
         $mojaUsluga -> ime = $usluga['ime'];
         $mojaUsluga -> opis = $usluga['opis'];
         array_push($mojRezultat, $mojaUsluga);
     }

     return $mojRezultat;}
    
     function korisnici(){
   
      global $host;
     $veza = new PDO("mysql:dbname=wt8;host=$host;charset=utf8", "anisa", "anisa"); 
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select ID, ime, sifra, rola from korisnici");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
    
    $mojRezultat = [];

    foreach($rezultat as $korisnik)
     {
         $mojKorisnik = new stdClass;
         $mojKorisnik -> ID = $korisnik['ID'];
         $mojKorisnik -> username = $korisnik['ime'];
         $mojKorisnik -> sifra = $korisnik['sifra'];
         $mojKorisnik -> role = $korisnik['rola'];
         array_push($mojRezultat, $mojKorisnik);
     }

     return $mojRezultat;}    

     function updateUslugu($usluga, $naziv, $opis){

     global $host;
     $veza = new PDO("mysql:dbname=wt8;host=$host;charset=utf8", "anisa", "anisa"); 
     $veza->exec("set names utf8");   

     $upit = $veza->prepare("UPDATE usluge SET ime=?, opis=? WHERE ID=?");
     $upit->bindValue(1, $naziv, PDO::PARAM_STR);
     $upit->bindValue(2, $opis, PDO::PARAM_STR);
     $upit->bindValue(3, $usluga->ID, PDO::PARAM_INT);
    // ; // ovo ti uradi update
 
    if ($upit->execute ()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $veza->error;
    }

    echo "<script> window.location.assign('./index.php'); </script>";
     }


     function deleteUslugu($id){
        global $host;
     $veza = new PDO("mysql:dbname=wt8;host=$host;charset=utf8", "anisa", "anisa"); 
    $veza->exec("set names utf8");  
   
    $upit = $veza->prepare("DELETE FROM usluge WHERE ID=?");
    $upit->bindValue(1, $id, PDO::PARAM_INT);
     if ($upit->execute ()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $veza->error;
    }

     echo "<script> window.location.assign('./index.php'); </script>";
     }

     function dodajUslugu($usluga, $ID)
     {
          global $host;
       $veza = new PDO("mysql:dbname=wt8;host=$host;charset=utf8", "anisa", "anisa"); 
          $veza->exec("set names utf8");  

          $upit = $veza->prepare("INSERT INTO usluge(ime, opis, id_korisnika) VALUES (?,?,?)");
          $upit->bindValue(1, $usluga->naziv, PDO::PARAM_STR);
          $upit->bindValue(2, $usluga->opis, PDO::PARAM_STR);
          $upit->bindValue(3, $ID, PDO::PARAM_INT);

           if ($upit->execute ()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $veza->error;
    }

     echo "<script> window.location.assign('./index.php'); </script>";

     }

     function prebaciIzXMLa($id){

         $uslugeUBazi = sveUsluge();
         $usluge_xml = simplexml_load_file('./xml/usluge.xml');
         $uslugeXML = $usluge_xml->usluga;

        for ($i=0; $i <count($uslugeXML) ; $i++) { 
            $flag = false;
            for ($j=0; $j < count($uslugeUBazi) ; $j++) { 
                if($uslugeXML[$i]->naziv == $uslugeUBazi[$j]->ime)
                {$flag= true; break;}

            }
            if($flag == false) dodajUslugu($uslugeXML[$i], $id);
            
        }

         echo "<script> window.location.assign('./index.php'); </script>";

     }

     function kreirajLog($id){
          global $host;
     $veza = new PDO("mysql:dbname=wt8;host=$host;charset=utf8", "anisa", "anisa"); 
          $veza->exec("set names utf8");  

          $upit = $veza->prepare("INSERT INTO log_izvjestaja(vrijeme, korisnik_ID) VALUES (CURDATE(), ?)");
          $upit->bindValue(1, $id, PDO::PARAM_INT);

           if ($upit->execute ()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $veza->error;
        }


     }


    ?>
