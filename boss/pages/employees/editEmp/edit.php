<?php 
session_start();
include ('php/conn.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../../LOG/index.php");
    die();
}
?>
   

<?php
include('php/conn.php');

$id = $_GET["id"];
$q = " SELECT * FROM `employees` WHERE `id_emp`= $id";
$row = mysqli_query($conn, $q)->fetch_assoc();

if (isset($_REQUEST['edit'])) {
    $name = $_POST['Name'];
    $Last_Name = $_POST['Last_Name'];
    $Phone_Number = $_POST['Phone_Number'];
    $Salary = $_POST['Salary'];
    $image = $_FILES['Image']['name'];
    if ((!empty($name)) && (!empty($Last_Name)) && (!empty($Phone_Number)) && (!empty($Salary)) && (!empty($image))) {
        $q = " UPDATE `employees` SET `Name`='$name',`Last_Name`='$Last_Name',
        `Phone_Number`='$Phone_Number',`Salary`='$Salary',`Image`='$image' WHERE `id_emp`=$id ";
        $query = mysqli_query($conn, $q);
        if($query) {
            move_uploaded_file($_FILES['Image']['tmp_name'],"../addEmp/img/".$_FILES['Image']['name']);
            header('location:../listEmp/employees list.php');
        }
    }
   
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
     <h3 class="m-0 font-weight-bold text-center">Edit</h3>
     <div class="card-body p-4 p-lg-5">
    <form method="post" action="" enctype="multipart/form-data">
     <br>
     <label> First Name </label><input type="text" value="<?php echo $row["Name"];  ?>" name="Name" class="form-control form-control-sm col-6" placeholder="" aria-controls="dataTable" >
     <br>
     <label>Last Name </label><input  type="text" value="<?php echo $row["Last_Name"]; ?>" name="Last_Name" class="form-control form-control-sm col-6" placeholder="" aria-controls="dataTable">
     <br>
     <label>Phone Number</label>
      <input value="<?php echo $row["Phone_Number"];  ?>" type="text" name="Phone_Number" class="form-control form-control-sm col-6" placeholder="" aria-controls="dataTable">
     <br>
     <label>Salary</label>
     <input value="<?php echo $row["salary"];  ?>" type="text" name="Salary" class="form-control form-control-sm col-6" placeholder="" aria-controls="dataTable">
     <br>
     <input type="file" name="Image" id="image" value="<?php echo $row["Image"];  ?>"/><br><br>
     <input type="submit" class="btn btn-primary" name="edit" value="save"/>
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

</div>
</div>
<?php 
include ('include/footer.php');
?>