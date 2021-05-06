<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Poetly, a social media for poets</title>
</head>

<body class = "valign-wrapper">

    <?php
    if (isset($_POST['submit']))
        if (empty($_POST['username']) || empty($_POST['password']))
            echo "Username or Password is empty";

        else {

            $username = $_POST['username'];
            $password = $_POST['password'];
            include('conn.php');

            $sql = "select * from poets where password='$password' 
		         AND username='$username'";
            $result = mysqli_query($conn, $sql);
            $nbrows = mysqli_num_rows($result);
            if ($nbrows == 1) {
                $res = mysqli_fetch_array($result);
                if ($res['username'] == 'admin') {
                    header("location:profileadmin.php?username=" . $username);
                } else
                    header("location:profilepoet.php?username=" . $username);
            } else
                echo "Username or Password is invalid";
            mysqli_close($conn);
        }



    ?>
    <div class = "container">
  
    <form action="index.php" method="post" >
        <label>Enter your username</label>
        <input type="text" name="username">
        <br>
        <label>Enter your password</label>
        <input type="password" name="password">
        <br>
        <!-- <input type="checkbox" name="rememberme"> Remember me<br> -->
        <div class = "center-align">
            <br>
        <input type="submit" value="log in" name="submit" class="waves-teal btn" >
            <br> <br>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        <br>
        <p>Or log in as a GUEST <a href="timelineguest.php?username=guest">here</a> </p>
</div>  
    </form>
</div>

</body>

</html>


<?php
/*
if (isset($_COOKIE)) {
    if (isset($_GET['logedout'])) {
        if ($_GET['logedout'] == 1) {
            setcookie("username", "", time() - 3600);
            setcookie("password", "", time() - 3600);
        }
    } else {
        if ($_COOKIE['username'] == 'admin') {
            header("location:profileadmin.php?username=" . $_COOKIE['username']);
        } else
            header("location:profilepoet.php?username=" . $_COOKIE['username']);
    }
} else {
    if (isset($_POST['rememberme'])) {
        $cookie_username = $_POST['username'];
        $cookie_password = $_POST['password'];
        setcookie("username", $cookie_username, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("password", $cookie_password, time() + (86400 * 30), "/"); // 86400 = 1 day
    }
}*/
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>