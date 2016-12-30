<?php

$korisnici_= simplexml_load_file('xml/korisnici.xml');
$korisnici = $korisnici_->korisnik;

$username = $_POST['username'];
$pass = $_POST['pass'];


for ($i=0; $i <  count($korisnici); $i++) { 
    if($korisnici[$i]->username == $username && $korisnici[$i]->pass == $pass)
    $mojKorisnik = $korisnici[$i];
}
global $mojKorisnik;
if($mojKorisnik === null)
    echo "pogresan username ili password";
else
{
    session_start();
    $_SESSION['username'] = $username;
    echo "<script> window.location.assign('./index.php'); </script>";

}

?>