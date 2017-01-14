<?php

require('./FunkcijeBaze.php');

 $logovanAdmin = false;
      session_start();
         if(isset($_SESSION['username'])) {

             $korisnici = korisnici();

            for ($i=0; $i <  count($korisnici); $i++)
                { 
                if($korisnici[$i]->username == $_SESSION['username'])
                $mojKorisnik = $korisnici[$i];
                }

            global $mojKorisnik;  
            if($mojKorisnik->role == "admin")                
                $logovanAdmin = true;
         $id = $mojKorisnik->ID;  }   
// $usluge_xml = simplexml_load_file('./xml/usluge.xml');
            $usluge = sveUsluge();
 

$file = fopen("contacts.csv","w");



  for ($i=0; $i < count($usluge) ; $i++) { 
           
                $uslugice = array($usluge[$i]->ime, $usluge[$i]->opis);
                 fputcsv($file, $uslugice, ','); 
          
           }



fclose($file); 
global $id;
kreirajLog($id);
echo "<script> window.location.assign('./contacts.csv'); </script>"; 
 
?>