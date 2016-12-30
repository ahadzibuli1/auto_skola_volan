document.getElementById("GoToDodajKomentar").addEventListener("click", function() {
    var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
    if(ajax.status == 200 && ajax.readyState == 4) {
        document.getElementById("PageContent").innerHTML = ajax.responseText;
         var script = document.createElement('script');
        script.src = './DodajKomentar.js';
        script.onload = function()
{};
document.head.appendChild(script);
    }
}
ajax.open("GET", "./DodajKomentar.html", true);

ajax.send();
});

function prikaziRez(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","http://localhost:8080/auto_skola_volan/livesearch.php?q="+str,true);
  xmlhttp.send();

  
}

document.getElementById("search").addEventListener("click", function() {
    var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
    if(ajax.status == 200 && ajax.readyState == 4) {
        document.getElementById("pretraga").innerHTML = ajax.responseText;

    }
}
ajax.open("POST", "./PretrazeniKomentari.php", true);
ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
ajax.send("livesearch=" + document.getElementById("searchString").value);
});
