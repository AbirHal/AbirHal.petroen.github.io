
<?php
include_once 'conn.php';
$msg = "";

//inset to database
if(isset($_POST["save"])){

    $name=$_POST["Name"];
    $Last_Name=$_POST["Last_Name"];
    $Phone_Number=$_POST["Phone_Number"];

    //$filename = $_FILES["image"]["name"];
    //$tempname = $_FILES["image"]["tmp_name"];   
       // $folder = "image/".$filename;
    $salary= $_POST["salary"];
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  

    $sql = "INSERT INTO `employees`(Name,Last_Name,Phone_Number,Image,salary)VALUES('$name','$Last_Name','$Phone_Number','$file','$salary')";
   
   // mysqli_query($db, $sql);
         
    // Now let's move the uploaded image into the folder: image
   // if (move_uploaded_file($tempname, $folder))  {
       //// $msg = "Image uploaded successfully";
    //}else{
        //$msg = "Failed to upload image";
  }

//$result = mysqli_query($db, "SELECT * FROM employes");

?>