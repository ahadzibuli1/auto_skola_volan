<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pocetna</title>
	<link rel="stylesheet" href="./style/layout.css">
    <link rel="stylesheet" href="./style/MeniStyle.css">
    
</head>
<body>
    <div class="red" id="meniSlika">       
        <img id="GoTo_index" src="./slike/collage.jpg"  alt="">
    </div>
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
                $logovanAdmin = true; {
                echo'<div class = "red">               
                <div class="kolona dva">
                    
                </div>
                <div class="kolona dva">
                    
                </div>
                <div class="kolona dva">
                     <form action="./logout.php" method="GET">
                    <input  type="submit" id="logout" value = "logout">
                    </form>
                   <h5>  Trenutno je logiran korisnik '. $mojKorisnik->username .'</h5>
               
                </div>
              
                </div>';

                }
      
    }
       ?>
    <div class="kolona sest" id="meni" >
        <ul >
            <li  id="GoToONama">O nama</li>
            <li id="GoToUsluge">Usluge</li>
            <li  id="GoToVozila">Vozila</li>
            <li  id="GoToPrijaviSe">Prijavi se</li>            
            <li  id="GoToKomentari">Komentari</li> 
            <li  id="GoToKontakt">Kontakt</li>
           <?php 
           global $logovanUser;

           if($logovanUser == false ){
           echo '<li  id="GoToLogin">Login</li>';
           }

           ?>
            <li id="linkovi">
                <a href="http://mon.ks.gov.ba/sektori/saobracajedukacija">
                        <img id="minIkona" src="./slike/ministarstvo.jpg" alt=""></a>
                <a href="https://www.facebook.com/Auto-%C5%A0kola-Volan-1606392052961428/?fref=ts">
                        <img id="fbIkona" src="./slike/facebook.png" alt=""></a></li>  
        </ul>
       
    </div>

    <div id = "PageContent">
    </div>
    <script src="./myJSFile.js"></script>
  
    </body>
    </html>