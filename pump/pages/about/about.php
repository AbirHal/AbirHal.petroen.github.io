
 <?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}
?>
  <?php

include 'php/connection.php';
$msg = "";

if (isset($_REQUEST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['editusername']);
    $type_account ="boss";
    $password = mysqli_real_escape_string($conn, md5($_POST['editpassword']));
 

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username='{$name}'")) > 0) {
        echo '<script language="javascript">';
        echo 'alert("' . $name .  ' - This username has been already exists.")';
        echo '</script>';
        } else {
         $id= $_SESSION['user_id'];
            $sql = "UPDATE users SET username='$name',password='$password',type_account='$type_account' WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            header("Location:../../index.php");
    
            echo '<script language="javascript">';
            echo 'alert("profile has updated !")';
            echo '</script>';

         
    }

}

?>
<?php 
include ('include/header.php');?>
    <title>Petroen</title>
    <?php 

include ('include/navbar.php');?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
    <?php 
    include('include/nav.php');
?>

                <!-- Begin Page Content -->
                <div class="container-fluid ">

                    <!-- Content Row -->
                    <div class="row">

 <!-- Content Row -->
 <div class="card m-2 col-12 ">
  <div class="card-header h3">
    About Petroen
  </div>
  <div class="card-body ">
    <p class="card-text"> is an exclusive Management Application wep which is designed especially for petrol station. It helps in maintaining pump volume entry, sales & purchases stock, accounts, invoices, and much more.</p>
  </div>
</div>



<div class="card m-2  col-12">
  <div class="card-header h3">
  Language Support

  </div>
  <div class="card-body ">
  <div class="form-check">
  <input class="form-check-input" type="checkbox" checked>
  <label class="form-check-label" >
    English
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox"   checked>
  <label class="form-check-label" >
   Arabic
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox"  >
  <label class="form-check-label" >
    French
  </label>
</div>
  </div>
</div>
 
<div class="card  m-2 col-12">
  <div class="card-header h3">
  Specifications


  </div>
  <div class="card-body ">
    <div class="row">
      <div class="col">
      <h5 class="card-title">Desktop Platforms</h5>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" checked>
  <label class="form-check-label" >
    Wep app
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox"   checked>
  <label class="form-check-label" >
   Windows
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox"  >
  <label class="form-check-label" >
    mac
  </label>
</div>
</div>
      <div class="col">
      <div class="col">
      <h5 class="card-title">Mobile Platforms</h5>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" checked>
  <label class="form-check-label" >
  ios
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox"   checked>
  <label class="form-check-label" >
   android
  </label>
</div>

</div>
</div>
    </div>
  
</div>
 
                    </div>
                </div>
                        
    </div>

<?php 
include('include/footer.php')
?>
    
   