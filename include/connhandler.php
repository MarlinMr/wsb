<?php
    require "credentials.php";
    $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
    if (!$conn) {die("Connection failed: ".mysqli_connect_error());}
?>
