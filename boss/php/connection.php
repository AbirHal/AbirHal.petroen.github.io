<?php
$serverName="localhost"; $dbusername="root";  $dbpassword=""; $dbname="petroen";
$conn = new mysqli($serverName, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
 
?>