<?php

 require('./FunkcijeBaze.php');
//$usluge_x = simplexml_load_file('./xml/usluge.xml');

$usluge = sveUsluge();

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
                 
    }  

    if(!$logovanAdmin){
        echo 'Greska. Korisnik nema autorizaciju.';
    } {

    if(isset($_POST['id']))
    {
       deleteUslugu($_POST['id']);
    }
    }

?>