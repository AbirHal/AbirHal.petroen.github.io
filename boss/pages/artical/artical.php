<?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}

?>




<title> Artical</title>
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
<h1 class="h3 mb-2 text-gray-800">Artical </h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
   
    <div class="card-body">
        <div class="table-responsive">
      
        
 <FORM action = "php/action.php" method = post>
    <table  class="table table-bordered"   width="100%" cellspacing="0">
 
    <thead>
                     <tr>
                         
                         <th>Name </th>
                         <th>Code </th>

                         <th>purchasing price per liter
(DA)</th>
<th>
selling price per liter
(DA)</th>
                         <th>Max Quantity(l)</th>

                         
                     </tr>
                 </thead>
   
  
      <tbody>

<tr>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="name" ></td>

<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="code" ></td>

<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="plp" ></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="slp"></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="mq"  ></td>


 </tr>
 <tr>
 <td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="name1" ></td>

 <td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="code1" ></td>
 <td><input type=text  class="form-control"  aria-describedby="basic-addon2" name="plp1"></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="slp1" ></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="mq1" ></td>


 </tr>
 <tr>
 <td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="name2" ></td>

 <td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="code2"></td>

<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="plp2" ></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="slp2"></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="mq2"></td>


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
                     
               
                         <th>Name </th>
                         <th>Code </th>

                         <th>purchasing price per liter(DA)</th>
                         <th>selling price per liter(DA)</th>
                         <th>Max Quantity(l)</th>
                         <th></th>


                   

                      
                 </tr>
             </thead>

<?php 

  
$sql = " SELECT * FROM `artical` ";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result)> 0 ) { ?>

   
                <tbody>


   <?php
    while($row = mysqli_fetch_assoc($result) ) {
        $id=$row["id_artical"];
  
  $name=$row["name"];
  $code=$row["code"];
  $ppl=$row["purchasing_price_liter"];
  $spl=$row["selling_price_liter"];
  $mq=$row["max_quantity"];
        
        ?>
     

    <tr >
    <td ><?php echo $name?></td>
    <td ><?php echo $code?></td>
    <td ><?php echo $ppl?></td>
    <td ><?php echo $spl?></td>
    <td ><?php echo $mq?></td>
    <td><a class="btn btn-primary " type="submit" name="edit" >Edit</a></td>
   
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


        </div>
        <!-- End of Content Wrapper -->

      
    <!-- End of Page Wrapper -->
   
    <!-- Scroll to Top Button-->
            </div>
<?php 

          

include ('include/footer.php');
?>
           
           
     

       
    