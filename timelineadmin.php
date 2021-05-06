<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<?php
include("conn.php");

loadAdmin();
mysqli_close($conn);


/*
if (isset($_POST['updateButton'])) {
    $poemid = $_POST['poemid'];
    print_r($poemid);
    echo 1;
    //header("location:update.php?poemid=" . $poemid);
}
*/


if (isset($_POST['update'])) {
    $poemid = $_POST['poemid'];
    header("location:update.php?poemid=" . $poemid);
}
function loadAdmin()
{
    include("conn.php");
    $sql = "SELECT * from poems";
    $result = mysqli_query($conn, $sql);
    $poems = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach (array_reverse($poems) as $poem) {
        
        echo("<div class='flow-text'>");
        echo ("<blockquote class='center-align z-depth-1'>" . $poem["poem"] . "</blockquote> <br>");
        echo ("</div>");
        echo ("Poet: " . $poem["fname"] . " " . $poem["lname"] . "<br>");
        echo ("Posted by: " . $poem["username"] . " at " . $poem["time"]);
        $poemid = $poem['poemid'];
        echo ("<form action='timelineadmin.php' method='post'>

    <div class='right-align'>
<input type='submit' name='update' value='Controller' class = 'waves-teal btn'></div>
    <input type='hidden' name='poemid' value='$poemid'>
    </div>
</form>

<br><hr>
");

    }
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>