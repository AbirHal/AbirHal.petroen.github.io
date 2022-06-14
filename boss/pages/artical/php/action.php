<?php
include_once("connection.php");





//inset to database
if(isset($_POST['submit'])){
    //material
    $code=$_POST["code"];

    $name=$_POST["name"];
  
    $plp=$_POST["plp"];
    $slp=$_POST["slp"];
    $mq=$_POST["mq"];


    $sql = "INSERT INTO `artical` (name,code,purchasing_price_liter,selling_price_liter,max_quantity) VALUES ('$name','$code','$plp','$slp','$mq')";
   

    if (mysqli_query($conn, $sql) ) {
        header('location:../artical.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        
    }



    }
    
     //material1
     if(isset($_POST['submit'])){
    
      
        
    
        //material1
        
    $code1=$_POST["code1"];

    $name1=$_POST["name1"];
  
    $plp1=$_POST["plp1"];
    $slp1=$_POST["slp1"];
    $mq1=$_POST["mq1"];
    $sql = "INSERT INTO `artical` (name,code,purchasing_price_liter,selling_price_liter,max_quantity) VALUES ('$name1','$code1','$plp1','$slp1','$mq1' )";
       
    
        if (mysqli_query($conn, $sql) ) {
            header('location:../artical.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            
        }
    
    
        }
      //material2

      if(isset($_POST['submit'])){

       
    
      
        
    
        //material
       
    $code2=$_POST["code2"];

    $name2=$_POST["name2"];
  
    $plp2=$_POST["plp2"];
    $slp2=$_POST["slp2"];
    $mq2=$_POST["mq2"];

        $sql = "INSERT INTO `artical` (name,code,purchasing_price_liter,selling_price_liter,max_quantity) VALUES ('$name2','$code2','$plp2','$slp2','$mq2' )";
       
    
        if (mysqli_query($conn, $sql) ) {
            header('location:../artical.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            
        }
    }
    
    
        
?>
