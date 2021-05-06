<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="container">
    
</body>
<?php
if (isset($_GET['poemid'])) {
    $poemid = $_GET['poemid'];

    loadPost();
    loadFavs();
} else {
    echo "you are not allowed here";
}


if (isset($_POST['favorite'])) {
    session_start();
    $text = $_POST['updatedText'];
    $poemid = $_POST['poemid'];
    $username = $_SESSION['username'];
    include("conn.php");
    $sql = "INSERT INTO favorites(username,poemid) VALUES('$username', '$poemid')";
    if (mysqli_query($conn, $sql)) {
        header("location:profilepoet.php?username=" . $username);
        mysqli_close($conn);
    } {
        echo "query error";
        mysqli_close($conn);
    }
}
function loadPost()
{
    include("conn.php");
    $poemid = $_GET['poemid'];
    $sql = "SELECT * from poems WHERE poemid =$poemid ";
    try {
        $result = mysqli_query($conn, $sql);
        $res = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } catch (\Throwable $th) {
        throw $th;
    }
    echo ("<div class='flow-text'>");
    echo ("<blockquote class='center-align z-depth-1'>" . $res["poem"] . "</blockquote> <br>");
    echo ("</div>");
    echo ("Poet: " . $res["fname"] . " " . $res["lname"] . "<br>");
    echo ("Posted by: " . $res["username"] . " at " . $res["time"]);
    echo ("<br>");
}

function loadFavs()
{
    include("conn.php");
    $poemid = $_GET['poemid'];
    $sql = "SELECT DISTINCT username from favorites WHERE poemid =$poemid ";
    try {
        $result = mysqli_query($conn, $sql);
        $res = mysqli_num_rows($result);
    } catch (\Throwable $th) {
        throw $th;
    }

    echo ($res . " People likes this poem <br>");



    echo ("<form action='fav.php' method='post'>

     <div class='right-align'>
    <input type='submit' value='Add to Favorite' name='favorite' class='waves-teal btn'>
    <input type='hidden' name='poemid' value='$poemid'>
    </div>
</form>



<hr>
");
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>