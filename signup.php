<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Poetly, a social media for poets</title>
</head>

<body class="conatiner valign-wrapper">

    <?php
    if (isset($_POST['submit']))
        if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['fname']) || empty($_POST['lname']))
            echo "All fields are required";

        else {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            include('conn.php');
            $query = "INSERT INTO poets VALUES ('$username' , '$password' , '$fname' , '$lname')";

            if (mysqli_query($conn, $query))
                header("location:profilepoet.php?username=" . $username);
            else
                echo "there is an error";
            mysqli_close($conn);
        }



    ?>
    <div class="container">

        <form action="signup.php" method="post">
            
            <label >Enter your First name</label>
            <div class="center-align">
            <input type="text" name="fname">
            <br>
            <label>Enter your Last name</label>
            <input type="text" name="lname">
            <br>
            <label>Enter your username</label>
            <input type="text" name="username">
            <br>
            <label>Enter your password</label>
            <input type="password" name="password">
            <br>
            <div class="center-align">
                <br>
                <input type="submit" value="Sign Up" name="submit" class="waves-teal btn">
            </div>
        </form>
    </div>


</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>