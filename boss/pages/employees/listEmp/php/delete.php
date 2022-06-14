<?php
include'conn.php';
$id = $_GET['id'];                                              
$q = " DELETE FROM `employees` WHERE id_emp = $id ";
$query = mysqli_query($conn,$q);
header('location:../employees list.php');

?>