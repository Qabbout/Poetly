<?php

if (isset($_POST['add'])) {
    $poem = htmlspecialchars($_POST['newPoem']);
    session_start();

    $username = $_SESSION['username'];

    $sql = "SELECT fname,lname FROM poets WHERE username = '$username' ";
    include('conn.php');
    try {
        $result = mysqli_query($conn, $sql);
        $res = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $fname = $res['fname'];
        $lname = $res['lname'];
    } catch (\Throwable $th) {
        echo $th;
    }


    $sql = "INSERT INTO poems(poem,fname,lname,username) VALUES ('$poem','$fname','$lname','$username')";
    echo ($sql);
    if (mysqli_query($conn, $sql)) {
        if ($username == 'admin')
            header("location:profileadmin.php?username=" . $username);
        else
            header("location:profilepoet.php?username=" . $username);
    } {
        echo "query error" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
/*
if (isset($_POST['submitfile']) && isset($_POST['fileToUpload'])) {
    mkdir("images");
    $target_file = "images/" . basename($_FILES["fileToUpload"]["name"]);
    if (
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)
    ) {
        session_start();
        header("location:profilepoet.php?username=" . $_SESSION['username']);
        echo "<p>The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.</p>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}*/
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<style>
    textarea {
        display: none;
    }

    #addId {
        display: inline;
    }
</style>
<form action="addHeader.php" method="POST" id="addform">
    <div class='center-align'>
        <input type="submit" value="Add a new Poem" id="addId" class="waves-teal btn">

    </div>


</form>
<div class='center-align'>
    <textarea id="updateA" name="newPoem" form="addform" placeholder="Enter Poem Here:" rows="20" cols="50" class="input-field"></textarea>
    <!--<label form="addform"> Select image to upload:</label>
<input type="file" name="fileToUpload" form="addform">
<input type="submit" value="Upload Image" name="submitfile" form="addform">-->
    <input type="hidden" value="Add" id="updateB" name="add" form="addform" class="waves-teal btn">

</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        var addId = document.getElementById('addId');
        var updateA = document.getElementById('updateA');
        var updateB = document.getElementById('updateB');
        addId.addEventListener("click", function(event) {
            event.preventDefault();
            updateA.style.display = "block";
            updateB.setAttribute("type", "submit");
            addId.style.display = "none";

        })
    </script>