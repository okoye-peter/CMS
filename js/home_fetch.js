window.onload = function(){
    if (window.XMLHttpRequest) {
        var Xhttp = new XMLHttpRequest();
    } else {
        var Xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    Xhttp.onload = function(){
        if(Xhttp.readyState == 4 && Xhttp.status == 200){
            var article = document.getElementById("article_links");
            article.innerHTML = Xhttp.responseText;
        }
    }

    Xhttp.open("GET", "includes/classes/home_fetch.php", true);
    Xhttp.send();
}