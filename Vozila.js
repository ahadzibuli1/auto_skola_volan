function Funkcija(src) {
    var slika = document.getElementById("slikaZaPikaz");
    document.getElementById("ovdjePrikazi").style.display = "inherit";

    slika.src = src;
    slika.style.zIndex = "2000";
    slika.style.display="block";

}

// var esc = function(event){
//     if(event.keyCode == 27)
//     document.getElementById("ovdjePrikazi").style.display="none";
// }

document.onkeydown = function(event) {
   
   if(event.keyCode == 27)
    document.getElementById("ovdjePrikazi").style.display="none";
};