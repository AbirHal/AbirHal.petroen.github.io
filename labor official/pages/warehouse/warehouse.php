<?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}


?>

<title>Warehouses</title>
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


include_once("php/connection.php");



  
?>



                <!-- End of Topbar -->

                <!-- Begin Page Content -->
              
                <div class="container-fluid">
 <!-- Begin Page Content -->
 

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> Warehouses </h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
   
    <div class="card-body">
        <div class="table-responsive">
      
        
 <FORM action = "php/action.php" method = post>
    <table  class="table table-bordered"   width="100%" cellspacing="0">
 
    <thead>
                     <tr>
                         
                         <th>Warehouse Name </th>
                         <th>Address </th>


                         
                     </tr>
                 </thead>
   
  
      <tbody>

<tr>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="name" ></td>

<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="address" ></td>



 </tr>
 
 
</tbody>
</table>


<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<button class="btn btn-primary" type="submit" name="submit" href="">Save</button>
</div>

</FORM> 

</div>
       
       </div>
     
   </div>
   
   <div class="card shadow mb-4">
   
   <div class="card-body row">
       
   <div class="table-responsive  col-12  ">


<table  class="table table-bordered "  width="100%" cellspacing="0">
<thead>
                 <tr>
                     
               
                         <th>Warehouse Name</th>
                         <th>Address </th>
                         <th> </th>


                   

                      
                 </tr>
             </thead>

<?php 

if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}
$num_per_page= 3;
$start_from= ($page-1)*3;
  
$sql = " SELECT * FROM `Warehouse` ORDER BY id_ware DESC LIMIT $start_from,$num_per_page";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result)> 0 ) { ?>

   
                <tbody>


   <?php
    while($row = mysqli_fetch_assoc($result) ) {
        $id=$row["id_ware"];
  
  $name=$row["name"];
  $address=$row["address"];
        
        ?>
     

    <tr >
    <td ><?php echo $name?></td>
    <td ><?php echo $address?></td>
    
    <td><a class="btn btn-primary " type="submit" name="edit" href="php/edit.php?GetID=<?php echo $id;?>">Edit</a>
    <a href="php/delete.php?id=<?php echo $row['id_ware']; ?>" class="btn btn-danger" type="submit">Delete</a></td>

    </tbody>
<?php 
  }?>
  
 
  
 
<?php  }mysqli_close($conn); ?>



</table>



  </div>

      </div>




<!-- /.container-fluid -->
   
</div>
<!-- End of Main Content -->


<?php
include ('php/connection.php'); 

$pr_query =" SELECT * FROM `warehouse` ";
$pr_result = mysqli_query($conn,$pr_query);
$total_record= mysqli_num_rows($pr_result);
$total_page = ceil($total_record/$num_per_page);
if($page>1){
    echo"  <a href='warehouse.php?page=".($page-1)."' class='btn btn-primary'>Previous</a>";

}

for($i=1 ;$i<$total_page;$i++){
    echo"  <a href='warehouse.php?page=".$i."' class='btn btn-primary'>$i</a>";

}
if($i>$page){
    echo"  <a href='warehouse.php?page=".($page+1)."' class='btn btn-primary'>Next</a>";

}

?>

        </div>
        <!-- End of Content Wrapper -->

      
    <!-- End of Page Wrapper -->
   
    <!-- Scroll to Top Button-->
            </div>
<?php 

          

include ('include/footer.php');
?>
           
           
     

       
    