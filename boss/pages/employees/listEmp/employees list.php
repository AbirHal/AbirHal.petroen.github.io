<?php 
session_start();
include ('php/conn.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../../LOG/index.php");
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
<h1 class="h3 mb-2 text-gray-800">employees list </h1>

<div class="  card shadow">
   
   <div class="card-body row">
   <div class="table-responsive col-12">
   <form action="../add/add.php" method="POST" enctype="multipart/form-data">
      <a  href="../addEmp/add.php" class="btn btn-primary">add new employee</a></form>
       <br>
       <br>
   <table  class="table table-bordered"  width="100%" cellspacing="0">
   <thead>
                    <tr>
                        
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Image</th>
                        <th>Salary</th>
                        <th></th>
                        
                    </tr>
                </thead>    
<?php 

include ('php/conn.php');
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}
$num_per_page= 2;
$start_from= ($page-1)*2;
  
$sql = " SELECT * FROM `employees` ORDER BY id_emp DESC LIMIT $start_from,$num_per_page";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) { ?>
 
  <tbody>
  <?php
    while($row = mysqli_fetch_assoc($result)) {?>
<tr >
<td ><?php echo $row["Name"];  ?></td>
<td ><?php echo $row["Last_Name"]; ?></td>
<td ><?php echo $row["Phone_Number"];  ?></td>
<td> <?php echo '<img src="../addEmp/img/'.$row["Image"].'" height="200" width="200" class="img-thumnail"/>';?> </td>
	</td>
   <td ><?php echo $row["salary"];  ?></td>

<td >
 <a href="../editEmp/edit.php?id=<?php echo $row['id_emp']; ?>" class="btn btn-primary" type="submit">Edit</a>
 <a href="php/delete.php?id=<?php echo $row['id_emp']; ?>" class="btn btn-danger" type="submit">Delete</a></td>
 </tbody>
         
<?php }mysqli_close($conn); ?>
    
<?php 
 }?>
</table>
 
  </div>
 
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
include ('php/conn.php'); 

$pr_query =" SELECT * FROM `employees` ";
$pr_result = mysqli_query($conn,$pr_query);
$total_record= mysqli_num_rows($pr_result);
$total_page = ceil($total_record/$num_per_page);
if($page>1){
    echo"  <a href='employees list.php?page=".($page-1)."' class='btn btn-primary m-1'>Previous</a>";

}

for($i=1 ;$i<$total_page;$i++){
    echo"  <a href='employees list.php?page=".$i."' class='btn btn-primary m-1'>$i</a>";

}
if($i>$page){
    echo"  <a href='employees list.php?page=".($page+1)."' class='btn btn-primary m-1'>Next</a>";

}

?>

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
     

    