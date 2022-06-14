<?php 

include ('connection.php');  
if(isset($_POST['delete'])){

    $id=$_POST['id'];
    $query = "DELETE FROM users WHERE id='$id'";
    $query_run=mysqli_query($conn,$query);
    
    if($query_run ){

        
    header("location:../acounts.php");

    echo '<script language="javascript">';
        echo ' alert("Data Deleted");';
        echo '</script>';
    }else{
        echo'<script> alert("Data Not Deleted");</script>';

    }
    
   
    





}
?>