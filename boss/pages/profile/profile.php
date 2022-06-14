
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
<div class="card-body col-12">
<h1>My Account</h1>

<div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 ">
      
                      <form method="post" action="">
      
                      <?php 
                      $currentuser=$_SESSION['user_name'];
                      $sql ="SELECT * FROM users WHERE username='$currentuser'";
                   $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result)> 0) { 
    
                    while($row = mysqli_fetch_assoc($result) ) {
                
                 ?>

<div class="form-outline mb-2">
                            <label class="form-label" for="form2Example17" style=" color: #3b3663;">User Name</label>

                          <input type="text" id="form2Example17" name="editusername" class="form-control form-control-lg" value="<?php echo $row['username'] ?>"/>
                        </div>
      
                       
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form2Example27" style=" color: #3b3663;">Password</label>
                            
                          <input type="text" id="form2Example27" name="editpassword"class="form-control form-control-lg" value="<?php echo $row['password'] ?>"/>
                        </div>
                        
                      
                        <div class="d-grid gap-4 pt-4 mb-2">
                            <button class="btn btn-primary btn-lg" type="submit" name="submit">edit</button>
                          </div>
                        
                 
<?php 
                        }?>
                
  
 
  <?php  }mysqli_close($conn); ?>
                   
    

      
      
                      </form>
      
                    </div>
                  </div>
</div>

 <!-- Content Row -->
 
                    </div>
                </div>
                        
    </div>

<?php 
include('include/footer.php')
?>
    
   