<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>

    <form>
        <div class="center-align">
            <b>Search for a poem below: </b><input type="text" onkeyup="search(this.value)">
        </div>
    </form>
    <div class="center-align">
        <p>Suggestions: <div id="results"></div>
</div>
        </p>

</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    function search(str) {
        if (str.length == 0) {
            document.getElementById("results").innerHTML = "";
            return;
        }
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("results").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getsearchadmin.php?search=" + str, true);
        xmlhttp.send();
    }
</script>