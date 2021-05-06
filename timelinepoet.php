<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<?php
include("conn.php");

loadPoet();
mysqli_close($conn);


if (isset($_POST['update'])) {
    $poemid = $_POST['poemid'];
    header("location:fav.php?poemid=" . $poemid);
}
function loadPoet()
{

    $username = $_SESSION['username'];
    include("conn.php");
    echo "<div class='center-align'><a href='listFavs.php?username=$username' >View My Favorites</a></div>";
    $sql = "SELECT * from poems";
    $result = mysqli_query($conn, $sql);
    $poems = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach (array_reverse($poems) as $poem) {
        echo ("<div class='flow-text'>");
        echo ("<blockquote class='center-align z-depth-1'>" . $poem["poem"] . "</blockquote> <br>");
        echo ("</div>");
        echo ("Poet: " . $poem["fname"] . " " . $poem["lname"] . "<br>");
        echo ("Posted by: " . $poem["username"] . " at " . $poem["time"]);
        $poemid = $poem['poemid'];
        echo ("<form action='timelinepoet.php' method='post'>

    <div class='right-align'>
<input type='submit' name='update' value='Details' class='waves-teal btn'>
    <input type='hidden' name='poemid' value='$poemid'>
    </div>
</form>

<br><hr>
");
    }
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>