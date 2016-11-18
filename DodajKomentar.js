var validnoImeKomentar = false;
var validanBrTelKomentar = false;
var validanMailKomentar = false;
var validanKomentar = false;


document.forms[0]["imeIprezime"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("imeIprezimezaValid").value;
             if (!reImeIPrezime(varijabla) ) {               
            document.getElementById("posaljiKomentar").disabled = true;
             document.getElementById("greskaImeIPrezime").style.display = "block";
             validnoImeKomentar = false;
            }
            else {
                document.getElementById("greskaImeIPrezime").style.display = "none";
                document.getElementById("posaljiKomentar").disabled = false;
               validnoImeKomentar = true;
            } 
            localStorage.setItem('name', varijabla);      
        })
        

document.forms[0]["brojTelefona"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("brojTelefonazaValid").value;
             if (!reBrojTelefona(varijabla) ) {               
            document.getElementById("posaljiKomentar").disabled = true;
             document.getElementById("greskaBrojTelefona").style.display = "block";
             validanBrTelKomentar = false;
            }
            else {
                document.getElementById("greskaBrojTelefona").style.display = "none";
                document.getElementById("posaljiKomentar").disabled = false;
              validanBrTelKomentar=true;  
            } 

             localStorage.setItem('phoneNumber', varijabla);        
        })

document.forms[0]["email"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("emailzaValid").value;
             if (!reEmail(varijabla) ) {               
            document.getElementById("posaljiKomentar").disabled = true;
             document.getElementById("greskaEmail").style.display = "block";
             validanMailKomentar=false;
            }
            else {
                document.getElementById("greskaEmail").style.display = "none";
                document.getElementById("posaljiKomentar").disabled = false;
                validanMailKomentar = true;
                
            } 
            localStorage.setItem('email', varijabla);       
        })   

document.forms[0]["komentar"].addEventListener("input",
        function(){
         var varijabla = document.getElementById("komentarzaValid").value;
             if (!rePoruka(varijabla) ) {               
            document.getElementById("posaljiKomentar").disabled = true;
             document.getElementById("greskaKomentar").style.display = "block";
             validanKomentar = false;
            }
            else {
                document.getElementById("greskaKomentar").style.display = "none";
                document.getElementById("posaljiKomentar").disabled = false;
                validanKomentar = true;
            }  
            localStorage.setItem('comment', varijabla);     
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
    if(validnoImeKomentar && validanKomentar && validanMailKomentar && validanBrTelKomentar) 
    { document.getElementById("posaljiKomentar").disabled = false;
document.getElementById("validiranaForma").style.display = "none";}
    else{
        document.getElementById("posaljiKomentar").disabled = true;
        document.getElementById("validiranaForma").style.display = "block";
         if(!validnoImeKomentar)
        document.getElementById("greskaImeIPrezime").style.display = "block";
         if(!validanKomentar)
         document.getElementById("greskaKomentar").style.display = "block";
         if(!validanMailKomentar)
         document.getElementById("greskaEmail").style.display = "block";
         if(!validanBrTelKomentar)
         document.getElementById("greskaBrojTelefona").style.display = "block";
    }
}


      var getName = localStorage.getItem('name');  
      if (getName != null) document.getElementById("imeIprezimezaValid").value = getName;

       var getphoneNumber = localStorage.getItem('phoneNumber');  
      if (getphoneNumber != null) document.getElementById("brojTelefonazaValid").value = getphoneNumber;

       var getEmail = localStorage.getItem('email');  
      if (getEmail != null) document.getElementById("emailzaValid").value = getEmail;

       var getComment = localStorage.getItem('comment');  
      if (getComment != null) document.getElementById("komentarzaValid").value = getComment;
