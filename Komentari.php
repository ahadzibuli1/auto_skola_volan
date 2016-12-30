<?php

    $komentari_xml = simplexml_load_file('./xml/komentari.xml');
    $komentari = $komentari_xml->komentar;



?>

<link rel="stylesheet" href="./style/layout.css">
<link rel="stylesheet" href="./style/KomentariStyle.css">
<div>

    <div class="red" id="dodajKomentar" >
    
    <div class="kolona jedan">
    </div>

    <div class="kolona tri" id="naslov">
        <h2 >Iskustva nasih bivsih kandidata</h2>
    </div>

    <div class="kolona jedan">
    </div>
    <div class="kolona jedan" id="linkZaKomentar" >
        <!--<a  href="DodajKomentar.html">-->
            <!--<form action="DodajKomentar.html" >-->
            <button type="submit" id="GoToDodajKomentar" >Dodaj komentar!
            <!--</button>
            </form>-->
            <!--</a>-->
    </div>
    </div>

    <div class = "red">
    <!--<form action="./PretrazeniKomentari.php" method="POST">-->
    <input id="searchString"  name="livesearch" type="text" size="30" onkeyup="prikaziRez(this.value)">
    
    <div id="livesearch"></div>
    <button id="search" type="button" >Pretrazi</button>
    <!--</form>-->
    </div>
   <!-- <div id="tekstKomentara">
           <ul>
        //     <?php
        //   global $komentari;
        
        //     for ($i=0; $i < count($komentari) ; $i++){
        //    echo'<li>
        //         <h3>'. $komentari[$i]->ime .' '. .'</h3>

        //    <p> '. $komentari[$i]->tekst .' </p>
        //     </li>';
        //     }
        //     ?>
        </ul>
    </div>-->


    

        <div id="pretraga">  </div>

       <?php
            global $komentari;
            $y = 3;
     for ($i=0; $i < count($komentari) ; $i++){
         
         if(fmod($i, $y) == 0 )        
        { echo'<div class="red">';
        }
       echo '<div class="kolona dva tekstKomentara">
            <h3>'. $komentari[$i]->ime .' '. $komentari[$i]->prezime .':</h3>

           <p> '. $komentari[$i]->tekst .'  </p>
        </div>';

        if(fmod($i, $y) == 2)
        // if($i===2)
         {echo'</div>';
         }
    }
        ?> 
      
 <script src="./myJSFile2.js"></script>
 

</div>