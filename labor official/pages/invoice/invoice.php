<?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}

?>

<title> The Invoices</title>
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
<h1 class="h3 mb-2 text-gray-800">The Invoices </h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
   
    <div class="card-body">
        <div class="table-responsive">
      


<table  class="table table-bordered"  width="100%" cellspacing="0">
<thead>
                
                  <th>Date</th>

                      <th>Artical Name</th>
                      <th>Code Product</th>
                      <th>Warehouse</th>
                     
                      <th>Imported Quantity (l)</th> 
                      <th>Amount (DA)</th>                         
                     
                         
                   
                     
                 </tr>
             </thead>
<?php 

include ('php/connection.php');

$day= $_SESSION['date'];




$sql="SELECT  BC.date , AR.name, AR.code, WE.name as we ,AR.purchasing_price_liter, QC.quantity as imported_quantity,(AR.purchasing_price_liter*QC.quantity)as amount
FROM `bon_commande` BC , `artical` AR,`quantity_commande` QC , `warehouse` WE 
WHERE BC.date='$day' AND  QC.id_artical=AR.id_artical AND  BC.id_bon=QC.id_bon AND  BC.id_ware=WE.id_ware  GROUP BY AR.name";
     
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result)> 0 ) { ?>

<tbody>

   <?php
    while($row = mysqli_fetch_assoc($result) ) {?>
    <tr >

    <td ><?php echo $row["date"]  ?></td>
     <td ><?php echo $row["name"]  ?></td>

     <td ><?php echo $row["code"]  ?></td>
     <td ><?php echo $row["we"]  ?></td>
    </td><td ><?php echo $row["imported_quantity"]  ?></td>
    <td ><?php echo $row["amount"]  ?></td>
    


    </tr>
    </tbody>  
<?php 
}?>

<?php }mysqli_close($conn); ?>
</table>

</div>

<div class="table-responsive   ">

<table class="table table-bordered "   width="10%"  cellspacing="0">

<?php 

include ('php/connection.php');
$date= $_SESSION['date'];


$sql="SELECT BC.date ,AR.purchasing_price_liter, QC.quantity,SUM(AR.purchasing_price_liter*QC.quantity) as amount_total
 
 FROM `bon_commande` BC , `artical` AR,`quantity_commande` QC 
 WHERE BC.date='$date ' AND QC.id_artical=AR.id_artical AND  BC.id_bon=QC.id_bon ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)> 0) { ?>

<thead>
<th>Total Amount (DA)</th> 

</thead>
<?php
    while($row = mysqli_fetch_assoc($result)) {?><tr><td colspan="3"> <?php echo $row['amount_total']?>  </td>
 </tr></tbody><?php 


}?>

   
 
   <?php }mysqli_close($conn); ?>
   

</table>

</div>  


       
       </div>
     
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
           
           
     

       
    