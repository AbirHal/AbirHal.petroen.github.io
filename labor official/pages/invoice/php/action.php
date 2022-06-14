<?php
include_once("connection.php");





//inset to database
if(isset($_POST['submit'])){

    //bon_commande table
 
 $id_bon= $_POST['ref'];
  $_SESSION['id_bon']=$id_bon;
    $sql = "INSERT INTO invoice (id_bon) VALUES('$id_bon')";
   //quantity_commande table
   if (mysqli_query($conn, $sql)) {
    $id_bon = mysqli_insert_id($conn);

    echo '<script language="javascript">';
    echo 'alert("' .   mysqli_insert_id($conn) .  '")';
    echo '</script>';
    header('location:../invoice.php');

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>
