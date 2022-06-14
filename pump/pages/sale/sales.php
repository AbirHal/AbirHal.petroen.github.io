
<?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}

?>


<title> sales</title>

        <?php 
        include ('include/header.php');

        include ('include/navbar.php');
       ?>
        <!-- Content Wrapper -->
      <!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
<?php 
include('include/nav.php');
?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
 

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">The Sales </h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    
    <div class="card-body">
        <div class="table-responsive">

        
      <FORM  action = "php/insert.php" method = post>

      
      <label class=" col-form-label col-form-label-lg">Artical</label> 
      <select name="artical" id="" class="form-select form-select-lg mb-3 form-select-disabled-color  "aria-label=".form-select-lg example" >

      <?php 
      $sql=mysqli_query($conn,"SELECT * FROM artical ");
while($row=mysqli_fetch_array($sql)){
    ?>
    <option value=" <?php  echo $row['id_artical']?>">
      <?php  echo $row['name']?></option>
    <?php 
    
}
?>
      
      </select>
      <table  class="table table-bordered"   width="100%" cellspacing="0">
 
      <thead>
                     <tr>
                         
                         <th>Date </th>
                         <th>Start Time </th>
                         <th>End Time </th>                         
                         <th>Quantity When Starting</th>
                         <th>Quantity At The End</th>

                
                     </tr>
                 </thead>
   
  
      <tbody>

<tr>
<td><input type=text  class="form-control"  aria-describedby="basic-addon2" name="date" value=" <?php echo date("Y-m-d");?>" ></td>
<td><input type=text  class="form-control"  aria-describedby="basic-addon2" name="st" value=""></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="et"></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="qs"></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="qe"></td>
<input type="hidden" class="form-control"  aria-describedby="basic-addon2" name="username" value=" <?php echo $_SESSION['user_id'];?> ">

 </tr>
</tbody>
</table>


<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<button class="btn btn-primary" type="submit" name="save">Save</button>
</div>

</FORM> 

</div>
       
       </div>
     
   </div>




   
   <div class="card shadow mb-4">
   
   <div class="card-body row">
       
   <div class="table-responsive  col-12  ">


<table  class="table table-bordered"  width="100%" cellspacing="0">
<thead>
                 <tr>
                     
                    
                     <th> Date </th>
                   
                     <th>Artical Name</th>
                         <th>Consumed Quantity(l) </th>   
                         <th>Amount(DA)</th>   

                   
                     
                 </tr>
             </thead>
<?php 

include ('php/connection.php');


$date= $_SESSION['date'];
$user_id=$_SESSION['user_id'];
$sql="SELECT date , SUM(quantity_when_starting - quantity_at_th_end) as consumed_quantity , 
 name, selling_price_liter,SUM(selling_price_liter*(quantity_when_starting - quantity_at_th_end)) as amount 
 FROM `sales_list` SA , `quantity_registerd` QR , `artical` AR 
  WHERE SA.date='$date'AND SA.user_id='$user_id'AND QR.id_artical=AR.id_artical AND QR.id_sales=SA.id_sales GROUP BY AR.name ";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)> 0 ) { ?>

<tbody>
   <?php
    while($row = mysqli_fetch_assoc($result) ) {
        ?>

    <tr >
   

     
     <td ><?php echo $row["date"]  ?></td>
     <td ><?php echo $row["name"]  ?></td>
     
     <td ><?php echo $row["consumed_quantity"]  ?></td>
     <td ><?php echo $row["amount"]  ?></td>


    </tr>
    </tbody>  
<?php 
}?>
<?php }mysqli_close($conn); ?>
</table>
  </div>


  <div class="table-responsive  col ">

<table class="table table-bordered "   width="10%"  cellspacing="0">

<?php 

include ('php/connection.php');
$date= $_SESSION['date'];
$user_id=$_SESSION['user_id'];


$sql="SELECT date , SUM(quantity_when_starting - quantity_at_th_end) as consumed_quantity , 
 name, selling_price_liter,SUM(selling_price_liter*(quantity_when_starting - quantity_at_th_end)) as amount
 FROM `sales_list` SA , `quantity_registerd` QR , `artical` AR 
 WHERE SA.date='$date' AND SA.user_id='$user_id'AND QR.id_artical=AR.id_artical AND QR.id_sales=SA.id_sales ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)> 0) { ?>

<thead>
<th>Total Amount (DA)</th> 

</thead>
<?php
    while($row = mysqli_fetch_assoc($result)) {?><tr><td colspan="3"> <?php echo $row['amount']?>  </td>
 </tr></tbody><?php 


}?>

   
 
   <?php }mysqli_close($conn); ?>
   

</table>

</div>  
</div>

<!-- /.container-fluid -->
</div>

<?php 
include ('include/footer.php');
?>
<!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->

            </div>