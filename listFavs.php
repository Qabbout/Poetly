<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="container">
    
</body>
<?php
session_start();
$username = $_SESSION['username'];
include("conn.php");
$sql = "SELECT DISTINCT poems.poem,poems.fname,poems.lname,poems.time, favorites.username
FROM poems
INNER JOIN favorites ON poems.poemid=favorites.poemid and favorites.username = '$username'";

echo ("<h1>Your Favorite Poems</h1>");
try {
    $result = mysqli_query($conn, $sql);
    $poems = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach (array_reverse($poems) as $poem) {
        echo ("<div class='flow-text'>");
        echo ("<blockquote class='center-align z-depth-1'>" . $poem["poem"] . "</blockquote> <br>");
        echo("</div>");
        echo ("Poet: " . $poem["fname"] . " " . $poem["lname"] . "<br>");
        echo ("Posted by: " . $poem["username"] . " at " . $poem["time"]);
        echo ("<br><hr>");
    }
} catch (\Throwable $th) {
    throw $th;
}


?>
<a href="profilepoet.php?username=" . '$username'></a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>