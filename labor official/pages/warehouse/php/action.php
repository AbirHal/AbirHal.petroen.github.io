<?php
include_once("connection.php");





//inset to database
if(isset($_POST['submit'])){
   
    $name=$_POST["name"];
  
    $address=$_POST["address"];


    $sql = "INSERT INTO `warehouse` (name,address) VALUES ('$name','$address')";
   

    if (mysqli_query($conn, $sql) ) {
        header('location:../warehouse.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        
    }



    }
    
     
?>
