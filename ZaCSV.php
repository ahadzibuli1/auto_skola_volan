<?php


 $usluge_xml = simplexml_load_file('./xml/usluge.xml');
            $usluge = $usluge_xml->usluga;
 

$file = fopen("contacts.csv","w");



  for ($i=0; $i < count($usluge) ; $i++) { 
           
                $uslugice = array($usluge[$i]->naziv, $usluge[$i]->opis);
                 fputcsv($file, $uslugice, ','); 
          
           }



fclose($file); 
 header("Location: http://localhost:8080/auto_skola_volan/contacts.csv");
?>