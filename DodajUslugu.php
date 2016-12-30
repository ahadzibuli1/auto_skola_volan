<?php
 
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
        echo"Greska, korisnik nema autorizaciju.";
    }
    else{
try{
     $usluge_xml = simplexml_load_file('./xml/usluge.xml');
     $usluge = $usluge_xml->usluga;

 
            if( isset($_POST['naziv']) && isset($_POST['opis']) )
            {
                if(count($usluge) !=0)
                $id = $usluge[count($usluge)-1]->id + 1;
                else 
                $id = 1;

                $mojaUsluga = $usluge_xml->addChild("usluga");
                $mojaUsluga->addChild("id", $id);
                $mojaUsluga->addChild("naziv", htmlentities($_POST['naziv'] ));          
                $mojaUsluga->addChild("opis", htmlentities($_POST['opis'] ));

                 $usluge_xml->asXML('xml/usluge.xml');
                echo "<script> window.location.assign('./index.php'); </script>";    
            }

    }
    catch( Exception $ex){

    }
    }

?>

    <link rel="stylesheet" href="./style/layout.css">
    <link rel="stylesheet" href="./style/DodajUsluguStyle.css">
<div>

    <div class="red">
        <div class="kolona jedan">
        </div>

        <div class="kolona pet">
            <h3>Dodavanje usluge</h3>
        </div>

    </div>

    <div class="red">

        <div class="kolona dva">
        </div>

          <?php
           global $logovanAdmin; 
           if(!$logovanAdmin){
               echo 'greska, korisnik nema autorizaciju';
           }
           else echo '
           <form id="addForm" action="" method="post">
                    
                    <div class="kolona dva" id="forma">                       

                    <label > Naziv usluge </label>
          
                        <input class="dodajUnos" type="text" name="naziv">                                         
                         <label > Opis usluge </label>                         
                        <textarea class="dodajUnos" rows="5" cols="22" name="opis">                     
                      </textarea> 
                    
                        <input id="add" type="submit" name="dodajUslugu" value="Dodaj uslugu" onclick="Validiraj()">               
                        
                    </div>
                </form>';
         ?>

        <div class="kolona dva">
        </div>
    </div>
</div>