<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="container">
    
</body>
<?php

if (isset($_GET['username']))
    if ($_GET['username'] == 'guest') {
        include("conn.php");

        $sql = "SELECT * from poems";
        $result = mysqli_query($conn, $sql);
        $poems = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo ("<div class='center-align'><h1>Guest Page (Exploring Only)</h1></div>");
        foreach (array_reverse($poems) as $poem) {
        echo ("<div class='flow-text'>");
            echo ("<br><blockquote class='center-align z-depth-1'>" . $poem["poem"] . "</blockquote> <br>");
        echo ("</div>");
            echo ("Poet: " . $poem["fname"] . " " . $poem["lname"] . "<br>");
            echo ("Posted by: " . $poem["username"] . " at " . $poem["time"]);
            echo ("<br><hr>");
        }
    }

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>