var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
    if(ajax.status == 200 && ajax.readyState == 4) {
        document.getElementById("PageContent").innerHTML = ajax.responseText;
    }
}
ajax.open("GET", "./_index.html", true);
ajax.send();

document.getElementById("GoToONama").addEventListener("click", function() {
    var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
    if(ajax.status == 200 && ajax.readyState == 4) {
        document.getElementById("PageContent").innerHTML = ajax.responseText;
    }
}
ajax.open("GET", "./ONama.html", true);
ajax.send();
});

document.getElementById("GoToKomentari").addEventListener("click", function() {
    var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
    if(ajax.status == 200 && ajax.readyState == 4) {
        document.getElementById("PageContent").innerHTML = ajax.responseText;
        var script = document.createElement('script');
        script.src = './myJSFile2.js';
        script.onload = function()
{};
document.head.appendChild(script);
        
    }
}
ajax.open("GET", "./Komentari.php", true);
ajax.send();
});

document.getElementById("GoToKontakt").addEventListener("click", function() {
    var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
    if(ajax.status == 200 && ajax.readyState == 4) {
        document.getElementById("PageContent").innerHTML = ajax.responseText;
         var script = document.createElement('script');
        script.src = './Kontakt.js';
        script.onload = function()
        {};
document.head.appendChild(script);
    }
}
ajax.open("GET", "./Kontakt.html", true);
ajax.send();
});

document.getElementById("GoToPrijaviSe").addEventListener("click", function() {
    var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
    if(ajax.status == 200 && ajax.readyState == 4) {
        document.getElementById("PageContent").innerHTML = ajax.responseText;
         var script = document.createElement('script');
        script.src = './PrijaviSe.js';
        script.onload = function()
        {};
document.head.appendChild(script);
        
    }
      
    }
ajax.open("GET", "./PrijaviSe.html", true);
ajax.send();
});

document.getElementById("GoTo_index").addEventListener("click", function() {
    var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
    if(ajax.status == 200 && ajax.readyState == 4) {
        document.getElementById("PageContent").innerHTML = ajax.responseText;
    }
}
ajax.open("GET", "./_index.html", true);
ajax.send();
});

document.getElementById("GoToVozila").addEventListener("click", function() {
    var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
    if(ajax.status == 200 && ajax.readyState == 4) {
        document.getElementById("PageContent").innerHTML = ajax.responseText;
          var script = document.createElement('script');
        script.src = './Vozila.js';
        script.onload = function()
{};
document.head.appendChild(script);
    }
}
ajax.open("GET", "./Vozila.html", true);
ajax.send();
});

document.getElementById("GoToUsluge").addEventListener("click", function() {
    var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
    if(ajax.status == 200 && ajax.readyState == 4) {
        document.getElementById("PageContent").innerHTML = ajax.responseText;
          var script = document.createElement('script');
        script.src = './Usluge.js';
        script.onload = function()
{};
document.head.appendChild(script);
    }
}
ajax.open("GET", "./Usluge.php", true);
ajax.send();
});

if(document.getElementById("GoToLogin") != null){
document.getElementById("GoToLogin").addEventListener("click", function() {
    var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
    if(ajax.status == 200 && ajax.readyState == 4) {
        document.getElementById("PageContent").innerHTML = ajax.responseText;
        //   var script = document.createElement('script');
        // script.src = './Vozila.js';
        // script.onload = function()
// {};
// document.head.appendChild(script);
    }
}
ajax.open("GET", "./Login.php", true);
ajax.send();
});
}







