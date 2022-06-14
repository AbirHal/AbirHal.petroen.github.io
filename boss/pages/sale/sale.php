  
  <?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}
?>
 <title> The sales</title>
   

       
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
<h1 class="h3 mb-2 text-gray-800">The Sales</h1>

<div class="card shadow mb-4">
   
   <div class="card-body row">
   <div class="table-responsive  col-12  ">


<table  class="table table-bordered"  width="100%" cellspacing="0">
<thead>
                 <tr>
                 <th>Employee Name</th>

                     <th>Date</th>
                     <th>Start Time</th>
                     <th>Finished Time</th>

                     <th>Artical</th>

                     <th> Consumed Quantity(l)</th>
                     <th>Amount(DA) </th>
                      </tr>
             </thead>
<?php 

include ('php/connection.php');

if(isset($_GET['page'])){
  $page = $_GET['page'];
}
else{
  $page = 1;
}
$num_per_page= 6;
$start_from= ($page-1)*6;
$date= $_SESSION['date'];

$sql="SELECT date,time_s,time_e , (quantity_when_starting - quantity_at_th_end) as consumed_quantity , 
 name, selling_price_liter,(selling_price_liter*(quantity_when_starting - quantity_at_th_end)) as amount ,username as empN
 FROM `sales_list` SA , `quantity_registerd` QR , `artical` AR ,users US
  WHERE   SA.date='$date' AND SA.user_id=US.id AND QR.id_artical=AR.id_artical AND QR.id_sales=SA.id_sales  LIMIT $start_from,$num_per_page";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)> 0 ) { ?>

      
<tbody>
   <?php
    while($row = mysqli_fetch_assoc($result) ) {?>
    <tr >
   

    <td ><?php echo $row["empN"]  ?></td>

    <td ><?php echo $row["date"]  ?></td>
    <td ><?php echo $row["time_s"]  ?></td>
    <td ><?php echo $row["time_e"]  ?></td>
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



$sql="SELECT date , SUM(quantity_when_starting - quantity_at_th_end) as consumed_quantity , 
 name, selling_price_liter,SUM(selling_price_liter*(quantity_when_starting - quantity_at_th_end)) as amount 
 FROM `sales_list` SA , `quantity_registerd` QR , `artical` AR 
  WHERE SA.date='$date'AND QR.id_artical=AR.id_artical AND QR.id_sales=SA.id_sales  ";

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
</div>




<?php
include ('php/connection.php'); 

$pr_query =" SELECT date,time_s,time_e , (quantity_when_starting - quantity_at_th_end) as consumed_quantity , 
name, selling_price_liter,(selling_price_liter*(quantity_when_starting - quantity_at_th_end)) as amount ,username as empN
FROM `sales_list` SA , `quantity_registerd` QR , `artical` AR ,users US
 WHERE   SA.date='$date' AND SA.user_id=US.id AND QR.id_artical=AR.id_artical AND QR.id_sales=SA.id_sales ";
$pr_result = mysqli_query($conn,$pr_query);
$total_record= mysqli_num_rows($pr_result);
$total_page = ceil($total_record/$num_per_page);
if($page>1){
    echo"  <a href='sale.php?page=".($page-1)."' class='btn btn-primary m-1'>Previous</a>";

}

for($i=1 ;$i<$total_page;$i++){
    echo"  <a href='sale.php?page=".$i."' class='btn btn-primary m-1'>$i</a>";

}
if($i>$page){
    echo"  <a href='sale.php?page=".($page+1)."' class='btn btn-primary m-1'>Next</a>";

}

?>

  
</div>
</div>

</div>
<!-- /.container-fluid -->


       </div>
       

<div class="card-body row">
<form class="form-floating col-8" action="php/note.php" method = post>
        <label for="floatingInputValue">Send note about this:</label>

     <textarea class="form-control bg-warning"  placeholder="Leave a note here" id="floatingTextarea" name="note"></textarea>

    <button class="btn btn-primary m-1 " type="submit" name="submit" href="">Send</button>

   
</form>
</div>

<?php 

          

include ('include/footer.php');
?>
</div>
<!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

      
    <!-- End of Page Wrapper -->
   
    <!-- Scroll to Top Button-->
            </div>

</div>
<!-- End of Main Content -->


       <!-- Footer -->

       <!-- End of Footer -->

   </div>
   <!-- End of Content Wrapper -->

</div>

  

