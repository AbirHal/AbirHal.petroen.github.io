<?php
  session_start();
  include("connection.php");
 if(isset($_POST["save"])){
  //sales_list table
  $day= $_POST['date'];
  $st=$_POST['st'];
  $et=$_POST['et'];
  $username =$_POST['username'];
  
   
   $_SESSION['date'] = $day;
   $_SESSION['st'] = $st;
   $_SESSION['et'] = $et;
   

    $sql = "INSERT INTO sales_list (date,time_s,time_e,user_id) VALUES('$day','$st','$et','$username')";

   //quantity_registerd table
    

   if (mysqli_query($conn, $sql)) {


    $id_sales = mysqli_insert_id($conn);
    

    echo '<script language="javascript">';
    echo 'alert("' .   mysqli_insert_id($conn) .  '")';
    echo '</script>';
    header('location:../sales.php');

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
   $qs=$_POST['qs'];
   $qe=$_POST['qe'];

$id_artical=$_POST['artical'];


$_SESSION['qs'] = $qs;
$_SESSION['qe'] = $qe;
$_SESSION['id_artical'] =$id_artical;

$sql2 = "INSERT INTO quantity_registerd (quantity_when_starting,quantity_at_th_end,id_artical,id_sales) VALUES('$qs','$qe','$id_artical','$id_sales')";
  

  if (mysqli_query($conn, $sql2)) {
    header('location:../sales.php');

    echo '<script language="javascript">';
    echo 'alert("' .   mysqli_insert_id($conn) .  '")';
    echo '</script>';
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);




 





  //'SELECT id_sales FROM sales_list WHERE date ='2022-05-19','SELECT id_artical FROM artical WHERE name='gasoline''
  
  
}  

?>