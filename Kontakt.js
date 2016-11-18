var validnoImeKontakt = false;
var validanBrTelKontakt = false;
var validanMailKontakt = false;
var validnaPorukaKontakt = false;


document.forms[0]["imeIprezime"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("imeIprezimezaValid").value;
             if (!reImeIPrezime(varijabla) ) {               
            document.getElementById("posaljiPoruku").disabled = true;
             document.getElementById("greskaImeIPrezime").style.display = "block";
             validnoImeKontakt = false;
            }
            else {
                document.getElementById("greskaImeIPrezime").style.display = "none";
                document.getElementById("posaljiPoruku").disabled = false;
               validnoImeKontakt = true;
            }       
        })
        

document.forms[0]["brojTelefona"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("brojTelefonazaValid").value;
             if (!reBrojTelefona(varijabla) ) {               
            document.getElementById("posaljiPoruku").disabled = true;
             document.getElementById("greskaBrojTelefona").style.display = "block";
             validanBrTelKontakt = false;
            }
            else {
                document.getElementById("greskaBrojTelefona").style.display = "none";
                document.getElementById("posaljiPoruku").disabled = false;
              validanBrTelKontakt=true;  
            }       
        })

document.forms[0]["email"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("emailzaValid").value;
             if (!reEmail(varijabla) ) {               
            document.getElementById("posaljiPoruku").disabled = true;
             document.getElementById("greskaEmail").style.display = "block";
             validanMailKontakt=false;
            }
            else {
                document.getElementById("greskaEmail").style.display = "none";
                document.getElementById("posaljiPoruku").disabled = false;
                validanMail = true;
                
            }       
        })   

document.forms[0]["poruka"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("porukazaValid").value;
             if (!rePoruka(varijabla) ) {               
            document.getElementById("posaljiPoruku").disabled = true;
             document.getElementById("greskaPoruka").style.display = "block";
             validnaPorukaKontakt = false;
            }
            else {
                document.getElementById("greskaPoruka").style.display = "none";
                document.getElementById("posaljiPoruku").disabled = false;
                validnaPorukaKontakt = true;
            }       
        })       


function reImeIPrezime(varijabla){
    var reg = /[a-zA-Z]\s[a-zA-z]/;
    return reg.test(varijabla);
}

function reBrojTelefona(varijabla){
    var reg = /[0-9]{6,9}/;
    return reg.test(varijabla);
}

function reEmail(varijabla){
    var reg = /[a-z0-9!#$%&'*+\=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    return reg.test(varijabla);

}

function rePoruka(varijabla){
    var reg = /.{5,500}/;
    return reg.test(varijabla);
}

function Validiraj(){
    if(validnoImeKontakt && validnaPorukaKontakt && validanMailKontakt && validanBrTelKontakt) 
    { document.getElementById("posaljiPoruku").disabled = false;
document.getElementById("validiranaForma").style.display = "none";}
    else{
        document.getElementById("posaljiPoruku").disabled = true;
        document.getElementById("validiranaForma").style.display = "block";
         if(!validnoImeKontakt)
        document.getElementById("greskaImeIPrezime").style.display = "block";
         if(!validnaPorukaKontakt)
         document.getElementById("greskaPoruka").style.display = "block";
         if(!validanMailKontakt)
         document.getElementById("greskaEmail").style.display = "block";
         if(!validanBrTelKontakt)
         document.getElementById("greskaBrojTelefona").style.display = "block";
    }
   

}