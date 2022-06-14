<?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}

?>

<?php 
 
include ('include/header.php');
?>
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
                <div class="container-fluid">



                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Today:
                                               
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                                                 echo date("Y-m-d");
                                                ?></div></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <?php 

include ('php/connection.php');


  
$sql = " SELECT count(id_emp) as total FROM employees ;";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)> 0) { ?>
                        <div class="col mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Number of employees</div><?php
    while($row = mysqli_fetch_assoc($result)) {?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row["total"]?></div><?php 


}?>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa-solid fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }mysqli_close($conn); ?>
                        

                       

                  
                        <?php 

include ('php/connection.php');

if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}
$num_per_page= 1;
$start_from= ($page-1)*1;
  
$sql = " SELECT note FROM  `nots` ORDER BY id DESC LIMIT $start_from,$num_per_page";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)> 0) { ?>
                        <!-- Pending Requests Card Example -->
                        <div class="col mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            notes from manager</div><?php
    while($row = mysqli_fetch_assoc($result)) {?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row["note"]?></div><?php 


}?>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
 
   <?php }mysqli_close($conn); ?>
                    </div>

                    <!-- Content Row -->


                    

                </div>

                    <div class="row">
                        
                        <img src="img/logo4.jpg" class="img-fluid" alt="...">
                    </div>
                        </div>

                       

      

                    
                        <?php 
include('include/footer.php')
?>
                    </div>



