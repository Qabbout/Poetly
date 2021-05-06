<?php
$conn = mysqli_connect('localhost', 'root', '', 'poetry');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
