<?php
    require('./fpdf181/fpdf.php');
    $usluge_xml = simplexml_load_file('./xml/usluge.xml');
    $usluge = $usluge_xml->usluga;

?>

<link href="./style/Usluge.css" rel="stylesheet"></link>
<div>
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
   ?>

            <?php
            global $usluge;
            global $logovanAdmin;

            
            echo '<div class="red">';

            echo '<div class = "kolona tri"> </div>';
             echo '<div class = "kolona jedan">
             <a href="./ZaPDF.php" >Kreiraj PDF izvjestaj</button>
              </div>';

                   
             
               echo '<div class = "kolona jedan">
             <a href="./ZaCSV.php" >Kreiraj CSV izvjestaj</button>
              </div>';

             if($logovanAdmin == true){
               echo ' <div class="kolona jedan">
                <form action="./DodajUslugu.php" method="GET">
                <input  type="submit" value = "DodajUslugu">
                </form>
             </div>';}

             echo '</div>';       
            for ($i=0; $i < count($usluge) ; $i++) { 
             echo'
              <div class="red">
            <div class="kolona jedan">
            </div>

            <div class="kolona cetiri">

                <div class="red">
                    <h2>'. $usluge[$i]->naziv .'</h2>
                    ';

        

                 echo   '
                </div>

                <div  class="red">
                    <p id="opis">'. $usluge[$i]->opis .'</p>
             
                </div>';
                
                if($logovanAdmin == true)
             {
                 echo'<div  class="red"> 
                  <div class="kolona dva">               
                </div>
                 <div class="kolona dva">                   
                </div>

                <div class="kolona jedan">
                
                <form action="./delete.php" method="POST">
                <input  type="submit" value = "Delete">
                <input type="hidden" name="id" value = "'.$usluge[$i]->id.'">
                </form>
                </div>

                <div class="kolona jedan">
                <form action="./Edit.php" method="GET">
                <input  type="submit" value = "Edit">
                <input type="hidden" name="id" value = "'.$usluge[$i]->id.'">
                </form>
                </div>

                 </div>';
                    
             }
                 

            echo '    
            </div>   
             <div class="kolona jedan">
            </div>
             </div> ';           
            }

            
            
             

        ?>
        


        
 <script src="./Usluge.js"></script>   

</div>      
