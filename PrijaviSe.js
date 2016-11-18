var validnoIme = false;
var validanBrTel = false;
var validanMail = false;
var validnaPoruka = true;
var validanDatum = false;

document.forms[0]["imeIprezime"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("imeIprezimezaValid").value;
             if (!reImeIPrezime(varijabla) ) {               
            document.getElementById("posaljiPrijavu").disabled = true;
             document.getElementById("greskaImeIPrezime").style.display = "block";
             validnoIme = false;
            }
            else {
                document.getElementById("greskaImeIPrezime").style.display = "none";
                document.getElementById("posaljiPrijavu").disabled = false;
               validnoIme = true;

            }       
        })

document.forms[0]["datumRodjenja"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("datZaValid").value;
             if (!validirajDatum(varijabla) ) {               
            document.getElementById("posaljiPrijavu").disabled = true;
             document.getElementById("greskaDatum").style.display = "block";
             validanDatum = false;
            }
            else {
                document.getElementById("greskaDatum").style.display = "none";
                document.getElementById("posaljiPrijavu").disabled = false;
               validanDatum = true;

            }       
        })        

document.forms[0]["brojTelefona"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("brojTelefonazaValid").value;
             if (!reBrojTelefona(varijabla) ) {               
            document.getElementById("posaljiPrijavu").disabled = true;
             document.getElementById("greskaBrojTelefona").style.display = "block";
             validanBrTel = false;
            }
            else {
                document.getElementById("greskaBrojTelefona").style.display = "none";
                document.getElementById("posaljiPrijavu").disabled = false;
              validanBrTel=true;  
            }       
        })

document.forms[0]["email"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("emailzaValid").value;
             if (!reEmail(varijabla) ) {               
            document.getElementById("posaljiPrijavu").disabled = true;
             document.getElementById("greskaEmail").style.display = "block";
             validanMail=false;
            }
            else {
                document.getElementById("greskaEmail").style.display = "none";
                document.getElementById("posaljiPrijavu").disabled = false;
                validanMail = true;
                
            }       
        })   

document.forms[0]["poruka"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("porukazaValid").value;
             if (!rePoruka(varijabla) ) {               
            document.getElementById("posaljiPrijavu").disabled = true;
             document.getElementById("greskaPoruka").style.display = "block";
             validnaPoruka = false;
            }
            else {
                document.getElementById("greskaPoruka").style.display = "none";
                document.getElementById("posaljiPrijavu").disabled = false;
                validnaPoruka = true;
            }       
        })       


function validirajDatum(varijabla){
 var reg = /\d{4}\-\d{2}\-\d{2}/;
 if (reg.test(varijabla))
  {
      var datum = varijabla.split('/');
      var mm = Number(datum[2]);
      var dd = Number(datum[1]);
      var yyyy = Number(datum[0]);
       if(  mm > 0 && mm <13  &&
            dd >0 && dd<32 && 
            yyyy >1900 && yyyy<2000){
            return true;
        }
  }

  return reg.test(varijabla);
}


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
    var reg = /.{0,500}/;
    return reg.test(varijabla);
}

function Validiraj(){
    if(validnoIme && validnaPoruka && validanMail && validanBrTel && validanDatum) 
    { document.getElementById("posaljiPrijavu").disabled = false;
document.getElementById("validiranaForma").style.display = "none";}
    else{
        document.getElementById("posaljiPrijavu").disabled = true;
        document.getElementById("validiranaForma").style.display = "block";
         if(!validnoIme)
        document.getElementById("greskaImeIPrezime").style.display = "block";
         if(!validnaPoruka)
         document.getElementById("greskaPoruka").style.display = "block";
         if(!validanMail)
         document.getElementById("greskaEmail").style.display = "block";
         if(!validanBrTel)
         document.getElementById("greskaBrojTelefona").style.display = "block";
         if(!validanDatum)
         document.getElementById("greskaDatum").style.display = "block";
    }
   

}