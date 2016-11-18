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