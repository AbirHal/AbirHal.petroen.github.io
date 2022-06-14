
 <?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
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
                    <a type="button" class="btn btn-primary btn-lg" href="../login/index.php" >Add New Account</a>
                    <div class="row">
<div class="card-body col-12">
<h1>Users</h1>

<?php 

include ('php/connection.php');
  
$sql = " SELECT * FROM  `users`";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)> 0) { ?>

<div class="table-responsive">


<table  class="table table-bordered"  width="100%" cellspacing="0">
<thead>
                 <tr>
                     
                     <th>id</th>
                     <th>User Name</th>
                     <th>type_user</th>
                     <th></th>
                  

                 </tr>
             </thead>

   <?php
    while($row = mysqli_fetch_assoc($result) ) {
        $id=$row["id"];
  
  $username=$row["username"];

  $password=$row["password"];
  $type=$row["type_account"];

        ?>
     

    <tr >
    <td ><?php echo $id  ?></td>
    <td ><?php echo $username?></td>
    <td ><?php echo $type ?></td>
    <form action="php/delete.php" method="POST">
   <input type="hidden" name="id" value="<?php echo $id ?>"> 

    <td><button class="btn btn-danger " name="delete" type="submit"value="Delete" >Delete</button></td>
    </form>
   
    </tbody>
<?php 
 
  }?>
  
 

  
 
<?php  }mysqli_close($conn); ?>

</table>



  </div>

</div>


                    </div>
                </div>
                        
    </div>

<?php 
include('include/footer.php')
?>
    
   