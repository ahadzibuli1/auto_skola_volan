<?php

      $logovanAdmin = false;
      session_start();
         if(isset($_SESSION['username'])) {
            
          require('./FunkcijeBaze.php');
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
    }  
    else{
    
     $usluge = sveUsluge();


     $usluga = null;
    if(isset($_GET['id']))
    {
         for ($i=0; $i < count($usluge); $i++) 
         { 
          if($usluge[$i]->ID == $_GET['id']) 
          {
              $usluga = $usluge[$i];
            
            if( isset($_POST['naziv']) && isset($_POST['opis']))
            {
                $mala = htmlentities($_POST['naziv']);
               updateUslugu($usluge[$i], $mala, $_POST['opis']);    
            }

          }
          
          }
    }}
    

?>

    <link rel="stylesheet" href="./style/layout.css">
    <link rel="stylesheet" href="./style/EditStyle.css">
<div>

    <div class="red">
        <div class="kolona jedan">
        </div>

        <div class="kolona pet">
            <h3>Editovanje posta</h3>
        </div>

    </div>

    <div class="red">

        <div class="kolona dva">
        </div>

       
            <form id="editForm" action="" method="post">
                   

                    <div class="kolona dva" id="forma">                       
                      <?php 
                      global $usluga;
                      global $logovanAdmin;
                      if(!$logovanAdmin){
                          echo"greska";
                      }
                      else{

                      
                      echo' <label > Naziv usluge </label>
                      
                     
                        <input class="editUnos" type="text" name="naziv"';
                        if($usluga != null) echo'value ='.$usluga->ime  .'> ';
                         echo '                    
                        
                         <label > Opis usluge </label>  
                        
                        <textarea class="editUnos" rows="5" cols="22" name="opis">';
                        if($usluga != null) echo''.$usluga->opis .' ';
                        echo '</textarea>
                      '; }?>
                    
                        <input id="posaljiPrijavu" type="submit" name="posaljiUslugu" value="Posalji prijavu" onclick="Validiraj()">               
                        
                    </div>
                </form>
        

        <div class="kolona dva">
        </div>
    </div>
</div>