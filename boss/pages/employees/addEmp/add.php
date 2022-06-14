<?php 
session_start();
include ('php/conn.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}
?>
 
 
 <?php 
        include ('include/header.php');

        include ('include/navbar.php');
       ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content"><!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php 
include ('include/nav.php');
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
              
                <div class="container-fluid">
 <!-- Begin Page Content -->
 
<!-- Page Heading -->
     <h3 class="m-0 font-weight-bold text-center">َAdd Employee</h3>
    <div class="card-body p-4 p-lg-5">
    <form method="post"  action="php/insert.php"  enctype="multipart/form-data" >
     <br>
     <label> First Name </label><input value="" type="text" name="Name" class="form-control form-control-sm col-6" placeholder="" aria-controls="dataTable" >
     <br>
     <label>Last Name </label><input value="" type="text" name="Last_Name" class="form-control form-control-sm col-6" placeholder="" aria-controls="dataTable">
     <br>
     <label>Phone Number</label> <input value="" type="text" name="Phone_Number" class="form-control form-control-sm col-6" placeholder="" aria-controls="dataTable">
     <br>
     <br>
     <label>Salary</label> <input value="" type="text" name="salary" class="form-control form-control-sm col-6" placeholder="" aria-controls="dataTable">
     <br>
     <input  type="file" name="Image" id="image" />
     <br><br> 
     <input type="submit" class="btn btn-primary" name="save" value="save"/>
    </form>
    </div>
</div>
            </div>
            <!-- Footer -->
   
            <!-- End of Footer -->

            </div>
        <!-- End of Content Wrapper -->

      
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
            </div>

            <?php 
include ('include/footer.php');
?>
</div>
</div>