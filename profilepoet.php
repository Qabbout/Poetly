<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Your Profile</title>
</head>

<body class="container">

    <?php
    if (isset($_GET['username'])) {
        $username = $_GET['username'];
        session_start();
        $_SESSION['username'] = $username;
        echo "<div class='valign-wrapper'><h1>" . $username . " Page</h1>";

        echo "<a href='index.php?logedout=1'>Log out</a> </div>";

        include("addHeader.php");
        echo "<br>";

        include("timelinepoet.php");
    } else
        echo "you need to login";
    ?>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>