window.onload = function(){
    if (window.XMLHttpRequest) {
        var Xhttp = new XMLHttpRequest();
    } else {
        var Xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    function fetch(){
        Xhttp.onload = function(){
            if(Xhttp.readyState == 4 && Xhttp.status == 200){
                var article = document.getElementById("article_links");
                article.innerHTML = Xhttp.responseText;
            }
        }
        Xhttp.open("GET", "includes/classes/profile_fetch.php", true);
        Xhttp.send();
    }

    function deleteArticle(){
        Xhttp.onload = function(){
            if(Xhttp.readyState == 4 && Xhttp.status == 200){
                var option = document.getElementById("delete");
                // console.log(option);
                option.innerHTML = "<option value=''>choose article to delete</option>";
                option.innerHTML += Xhttp.responseText;
            }
        }
    
        Xhttp.open("GET", "includes/classes/profileFetchDeletePost.php", true);
        Xhttp.send();
    }

    setInterval(fetch, 1000);
    deleteArticle()    
}