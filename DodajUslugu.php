<?php
  require('./FunkcijeBaze.php');
   $logovanAdmin = false;
      session_start();
         if(isset($_SESSION['username']) ) {
        
             $korisnici = korisnici();
             $id ;
            for ($i=0; $i <  count($korisnici); $i++)
                { 
                if($korisnici[$i]->username == $_SESSION['username'])
                $mojKorisnik = $korisnici[$i];
                }

            global $mojKorisnik;  
            if($mojKorisnik->role == "admin")                
                $logovanAdmin = true;
                $id = $mojKorisnik->ID;
      
    }    
    if(!$logovanAdmin){
        echo"Greska, korisnik nema autorizaciju.";
    }
    else{
try{
    
            if( isset($_POST['naziv']) && isset($_POST['opis']) )
            {
                $mojaUsluga = new stdClass;
                $mojaUsluga -> naziv = $_POST['naziv'];
               $mojaUsluga -> opis = $_POST['opis'];
               global $id;
               dodajUslugu($mojaUsluga, $id );
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