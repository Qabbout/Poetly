<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<style>
    textarea {
        display: none;
    }
</style>

<?php

if (isset($_POST['updateButton'])) {
    session_start();
    $text = $_POST['updatedText'];
    $poemid = $_POST['poemid'];
    $username = $_SESSION['username'];
    include("conn.php");

    $sql = "UPDATE poems SET poem = '$text' WHERE poemid =$poemid";
    if (mysqli_query($conn, $sql)) {
        header("location:profileadmin.php?username=" . $username);
        mysqli_close($conn);
    } {
        echo "query error";
        mysqli_close($conn);
    }
}

if (isset($_POST['delete'])) {
    session_start();
    $username = $_SESSION['username'];
    $poemid = $_POST['poemid'];
    include("conn.php");
    $sql = "DELETE FROM poems WHERE poemid = $poemid";
    if (mysqli_query($conn, $sql)) {
        header("location:profileadmin.php?username=" . $username);
    } {
        echo "query error";
    }
}

if (isset($_GET['poemid'])) {
    $poemid = $_GET['poemid'];

    loadPost();
} else {
    echo "you are not allowed here";
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

    echo (" <div class = 'container'><blockquote class = 'flow-text center-align z-depth-1'>" . $res["poem"] . "</blockquote> <br>");
    echo ("Poet: " . $res["fname"] . " " . $res["lname"] . "<br>");
    echo ("Posted by: " . $res["username"] . " at " . $res["time"]);
    $poemid = $res['poemid'];


    echo ("<form action='update.php'  method='post' id='editform'>
<div class='right-align'>
    <input type='submit' value='Update' id='editId'  class='waves-teal btn '>
<input type='submit' value='Delete' name = 'delete'  class='waves-teal btn'>
</div>
    <input type='hidden' name='poemid' value='$poemid'>
    <br>
</form>
<div class='container'>
<textarea id='updateC' name='updatedText' form='editform' placeholder='Enter Updated Poem Here:' rows='20' cols='50' class ='input-field'></textarea>
<div class='center-align'>
<br>
<input type='hidden' name='updateButton' value='Update' id='updateD' form='editform' class='btn'>
</div>
</div>
</div>
");
}



?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>  
var editId = document.getElementById('editId');
    var updateC = document.getElementById('updateC');
    var updateD = document.getElementById('updateD');
    editId.addEventListener("click", function(event) {
        event.preventDefault();
        updateC.style.display = "block";
        updateD.setAttribute("type", "submit");
    })
</script>