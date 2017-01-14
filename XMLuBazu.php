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
           $id = $mojKorisnik->ID;     

           if($logovanAdmin)
           prebaciIzXMLa($id);
           else 
         echo'unathorized';}
?>