<?php

//$korisnici_= simplexml_load_file('xml/korisnici.xml');
 require('./FunkcijeBaze.php');
$korisnici = korisnici();

$username = htmlentities($_POST['username']);
$pass = htmlentities($_POST['pass']);


for ($i=0; $i <  count($korisnici); $i++) { 
    if($korisnici[$i]->username == $username && $korisnici[$i]->sifra == md5($pass))
    $mojKorisnik = $korisnici[$i];
}
global $mojKorisnik;
if($mojKorisnik === null)
    echo "pogresan username ili password";
else
{
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['ID'] = $mojKorisnik->ID;
    echo "<script> window.location.assign('./index.php'); </script>";

}

?>