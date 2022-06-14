<?php
include_once("connection.php");

//inset to database
if(isset($_POST['submit'])){

    $note=$_POST["note"];
    $sql = "INSERT INTO `notsFl`(`note`) VALUES ('$note')";
    if (mysqli_query($conn, $sql) ) {
        header('location:../sale.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        
    }
    
    

}
if(isset($_POST['edit'])){

   
   session_start();
    
    

}

?>