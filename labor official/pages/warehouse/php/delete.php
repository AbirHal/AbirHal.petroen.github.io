<?php
include'connection.php';
$id = $_GET['id'];                                              
$q = " DELETE FROM `warehouse` WHERE id_ware = $id ";
$query = mysqli_query($conn,$q);
header('location:../warehouse.php');

?>