
<?php
include_once 'conn.php';
$msg = "";

//inset to database


//inset to database
if(isset($_POST["save"]) && isset($_FILES["Image"])){
    $name=$_POST["Name"];
    $Last_Name=$_POST["Last_Name"];
    $Phone_Number=$_POST["Phone_Number"];
    $Salary=$_POST["salary"];
    $uploadDir = '../img/'; 
    $uploadedFile = $uploadDir . basename($_FILES['Image']['name']);
    if(move_uploaded_file($_FILES['Image']['tmp_name'], $uploadedFile)) {
    $sql = "INSERT INTO employees(Name,Last_Name,Phone_Number,salary,Image)
    VALUES('$name','$Last_Name','$Phone_Number','$Salary','". basename($_FILES['Image']['name'])."')";
    $a=mysqli_query($conn,$sql);
    if ($a) {
        header('location:../../listEmp/employees list.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        
    }
   }

}?>