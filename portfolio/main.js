loadPage('home.html', callBack);

function loadPage(href, callback) {
//        document.getElementById('spinner').style.display = 'block';
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {

        if (this.readyState == 4 && this.status == 200) {
//                document.getElementById('spinner').style.display = 'none';
            callback(this);
        }
    };
    xhr.open("GET", "http://school.dev/portfolio/"+href, true);
    xhr.send();
}

function callBack(result) {
    console.log(result);
    return document.getElementById('col-content').innerHTML = result.response;
}