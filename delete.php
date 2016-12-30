<?php
$usluge_x = simplexml_load_file('./xml/usluge.xml');
$usluge = $usluge_x->usluga;

    $logovanAdmin = false;
      session_start();
         if(isset($_SESSION['username'])) {
            
             $korisnici_= simplexml_load_file('xml/korisnici.xml');
             $korisnici = $korisnici_->korisnik;

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
    }  
    else{

    if(isset($_POST['id']))
    {
        for ($i=0; $i < count($usluge) ; $i++) { 
            if ($usluge[$i]->id == $_POST['id'])
            {
            unset($usluge_x->usluga[$i]);
            $usluge_x->asXML('./xml/usluge.xml');
            echo "<script> window.location.assign('./index.php'); </script>";
            
            }

        }
    }
    }

?>