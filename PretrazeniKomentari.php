<?php

    $komentari_xml = simplexml_load_file('./xml/komentari.xml');
    $komentari = $komentari_xml->komentar;

if(isset($_POST["livesearch"]) && strlen($_POST["livesearch"]) > 0){
    $trazeniKomentari = array();
 for ($i=0; $i < count($komentari) ; $i++) { 
     if(strpos( strtolower($komentari[$i]->ime), strtolower(htmlentities($_POST['livesearch']))) !==false || strpos(strtolower($komentari[$i]->prezime), strtolower(htmlentities($_POST['livesearch'])))!==false )
     array_push($trazeniKomentari,$komentari[$i] );

 }

}


echo '<div>';


  echo '<div class="red" > <h3>Pretrazeni Komentari</h3> </div>';
            global $trazeniKomentari;
            $y = 3;

     for ($i=0; $i < count($trazeniKomentari) ; $i++){
         if(fmod($i, $y) == 0 )        
        { echo'<div class="red">';}
        
       echo '<div class="kolona dva tekstKomentara">
            <h3>'. $trazeniKomentari[$i]->ime .'  '. $trazeniKomentari[$i]->prezime .':</h3>

           <p> '. $trazeniKomentari[$i]->tekst .'  </p>
        </div>';

        if(fmod($i, $y) == 2 || $i ==(count($trazeniKomentari) - 1) )
        // if($i===2)
         {echo'</div>';
         }
     }
       
  echo '<div class="red" > <h3>Svi Komentari</h3> </div>';
 

echo '</div>';
 ?> 