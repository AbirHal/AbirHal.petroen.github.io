<?php
  include("connection.php");
   
  if(isset($_POST["submit"])){
    
    //bon_commande table
    $day= $_POST['date'];
  $_SESSION['date']=$day;
 $id_ware= $_POST['warehouse'];
  $_SESSION['id_ware']=$id_ware;
    $sql = "INSERT INTO bon_commande (date,id_ware) VALUES('$day','$id_ware')";
   //quantity_commande table
   if (mysqli_query($conn, $sql)) {
    $id_bon = mysqli_insert_id($conn);

    echo '<script language="javascript">';
    echo 'alert("' .   mysqli_insert_id($conn) .  '")';
    echo '</script>';
    header('location:../purchase.php');

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  $quantity= $_POST['gas'];

   $id_artical=35;
  $_SESSION['id_artical']=$id_artical;
 $sql2 = "INSERT INTO quantity_commande (quantity,id_artical,id_bon) VALUES('$quantity','$id_artical','$id_bon')";
  

  if (mysqli_query($conn, $sql2)) {
    header('location:../purchase.php');

    echo '<script language="javascript">';
    echo 'alert("' .   mysqli_insert_id($conn) .  '")';
    echo '</script>';
  } else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
  }
  

  //bon_commande table
  $day= $_POST['date'];
$_SESSION['date']=$day;
$id_ware= $_POST['warehouse'];
$_SESSION['id_ware']=$id_ware;
  $sql = "INSERT INTO bon_commande (date,id_ware) VALUES('$day','$id_ware')";
 //quantity_commande table
 if (mysqli_query($conn, $sql)) {
  $id_bon = mysqli_insert_id($conn);

  echo '<script language="javascript">';
  echo 'alert("' .   mysqli_insert_id($conn) .  '")';
  echo '</script>';
  header('location:../purchase.php');

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$quantity= $_POST['die'];

$id_artical=36;
$_SESSION['id_artical']=$id_artical;
$sql2= "INSERT INTO quantity_commande (quantity,id_artical,id_bon) VALUES('$quantity','$id_artical','$id_bon')";


if (mysqli_query($conn, $sql2)) {
  header('location:../purchase.php');

  echo '<script language="javascript">';
  echo 'alert("' .   mysqli_insert_id($conn) .  '")';
  echo '</script>';
} else {
  echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}





  //bon_commande table
  $day= $_POST['date'];
 $_SESSION['date']=$day;
 $id_ware= $_POST['warehouse'];
 $_SESSION['id_ware']=$id_ware;
  $sql = "INSERT INTO bon_commande (date,id_ware) VALUES('$day','$id_ware')";
 //quantity_commande table
 if (mysqli_query($conn, $sql)) {
  $id_bon = mysqli_insert_id($conn);

  echo '<script language="javascript">';
  echo 'alert("' .   mysqli_insert_id($conn) .  '")';
  echo '</script>';
  header('location:../purchase.php');

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$quantity= $_POST['ser'];

$id_artical=37;
$_SESSION['id_artical']=$id_artical;
$sql2= "INSERT INTO quantity_commande (quantity,id_artical,id_bon) VALUES('$quantity','$id_artical','$id_bon')";


if (mysqli_query($conn, $sql2)) {
  header('location:../purchase.php');

  echo '<script language="javascript">';
  echo 'alert("' .   mysqli_insert_id($conn) .  '")';
  echo '</script>';
} else {
  echo "Error: " . $sql2. "<br>" . mysqli_error($conn);
}

mysqli_close($conn);




}  


?>