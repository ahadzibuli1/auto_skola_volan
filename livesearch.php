<?php


  $komentari_xml = simplexml_load_file('./xml/komentari.xml');
   $komentari = $komentari_xml->komentar;

$q=htmlentities($_GET["q"]);
$br=0;

if (strlen($q)>0) {
  $hint="";
  for($i=0; $i< count($komentari); $i++) {


     if(strpos( strtolower($komentari[$i]->ime), strtolower($q)) !==false || strpos(strtolower($komentari[$i]->prezime), strtolower($q))!==false ){

       if ($hint=="")  {$hint="<p>" . 
       $komentari[$i]->ime ." ".   $komentari[$i]->prezime . "</p>";
       $br = $br +1;}
       else if($br<10)  { $hint=$hint . "<br /><p>" . 
       $komentari[$i]->ime ." ".   $komentari[$i]->prezime . "</p>";
       $br = $br +1;}
     }

  }
}

if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

echo $response;
?>