<!doctype html>
<html>
<head>

<style>
@font-face {
    font-family: "Roadgeek2005SeriesD";
    src: url("/Roadgeek 2005 Series D.otf");
}

body, * {
}

body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td {
    margin: 0;
    padding: 0;
}

fieldset,img {
    border: 0;
}


/* Settin' up the page */

html, body, #main {
    overflow: hidden; /* */
}

body
{
    color: white;
    font-family: 'Roadgeek2005SeriesD', sans-serif;
    font-size: 18px;
    line-height: 20px;
}

body, html, #main
{
    background: transparent !important;
}

#lasttrack {
    padding: 10px;
    color: white;
}

#lasttrack img {
    float: left;
    margin-right: 10px;
}

</style>

<script>

function ajaxStateChange()
{
    if (this.readyState == 4) {
        console.log(this.responseText);
        document.getElementById('lasttrack').innerHTML = '' + this.responseText;
    }
};

function init()
{
    // Change page background to black if the URL contains "?desktop", for debugging while developing on your computer
    if (document.location.href.indexOf('desktop') > -1)
    {
        document.getElementById('lasttrack').style.backgroundColor = 'black';
    }

    var url = '/lasttrack/update.php?username=<?php echo $_GET['username']; ?>';
    var req = new XMLHttpRequest();

    req.onreadystatechange = ajaxStateChange.bind(req);
    req.open("GET", url, true);
    req.send(null);

    setTimeout('init();', 10000);

}

</script>

</head>
<body onload="init();">

<div id="lasttrack"></div>

</body>
</html>