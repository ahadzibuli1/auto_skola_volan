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
        echo 'Greska. Korisnik nema autorizaciju.';
    }  
    else{
     $usluge_xml = simplexml_load_file('./xml/usluge.xml');
     $usluge = $usluge_xml->usluga;


     $usluga = null;
    if(isset($_GET['id']))
    {
         for ($i=0; $i < count($usluge); $i++) 
         { 
          if($usluge[$i]->id == $_GET['id']) 
          {
              $usluga = $usluge[$i];
            
            if( isset($_POST['naziv']) && isset($_POST['opis']))
            {
               $usluge_xml->usluga[$i]->naziv =  htmlentities($_POST['naziv']);
                $usluge_xml->usluga[$i]->opis =  htmlentities($_POST['opis']);

                 $usluge_xml->asXML('xml/usluge.xml');
                 echo "<script> window.location.assign('./index.php'); </script>";     
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
                        if($usluga != null) echo'value ='.$usluga->naziv  .'> ';
                         echo '                    
                        
                         <label > Opis usluge </label>  
                        
                        <textarea class="editUnos" rows="5" cols="22" name="opis">';
                        if($usluga != null) echo''.$usluga->naziv .' ';
                        echo '</textarea>
                      '; }?>
                    
                        <input id="posaljiPrijavu" type="submit" name="posaljiUslugu" value="Posalji prijavu" onclick="Validiraj()">               
                        
                    </div>
                </form>
        

        <div class="kolona dva">
        </div>
    </div>
</div>