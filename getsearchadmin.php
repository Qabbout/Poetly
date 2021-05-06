<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<?php
include('conn.php');
$search = $_GET["search"];

$result = mysqli_query($conn, "select poem,poemid from poems where poem like'$search%'");

echo "<div>";
while ($row = mysqli_fetch_assoc($result)) {
    echo ("<div class='flow-text'>");
    echo "<blockquote>" . $row['poem'] . "</blockquote> <br> </div>";
    $rowid = $row['poemid'];
    echo ("<form action='update.php?poemid=$rowid' method='post'>

<input type='submit' name='update' value='Controller' class = 'waves-teal btn'>
    <input type='hidden' name='poemid' value='$rowid'>
    
</form>");
}
echo "</div>";
mysqli_close($conn);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>