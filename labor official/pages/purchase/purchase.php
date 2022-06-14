<?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}

?>
 <title> The Purchase & Bon Commande</title>
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
 


<!-- DataTales Example -->
<div class="card shadow mb-4">
   
    <div class="card-body">
      
           
 <FORM action="php/action.php" method= post>
     <div class="row p-1">
         <div class="col-2"><label for="">warehouse:</label> <select name="warehouse" id="" class="form-select form-select-lg mb-3 form-select-disabled-color  "aria-label=".form-select-lg example" >

<?php 
$sql=mysqli_query($conn,"SELECT * FROM warehouse ");
while($row=mysqli_fetch_array($sql)){
?>
<option value=" <?php  echo $row['id_ware']?>">
<?php  echo $row['name']?></option>
<?php 

}
?>

</select></div>
     
<div class="col-2">
    <label for="">date</label>

<input type=text  class="form-control"  aria-describedby="basic-addon2" name="date" value=" <?php echo date("Y-m-d");?>"></div>
<div class="col-12">

<div class="col"><label for="">Gasoline:</label>
    <input type=text  class="form-control"  aria-describedby="basic-addon2" name="gas" value=" 
<?php 

include ('php/connection.php');


$date= $_SESSION['date'];



 
$sql="SELECT  SUM(QR.quantity_when_starting - QR.quantity_at_th_end) as command_quantity 
FROM `quantity_registerd` QR ,  `sales_list` SA ,`artical` AR 
WHERE SA.date='$date' AND QR.id_artical=AR.id_artical AND QR.id_sales=SA.id_sales AND AR.name='gasoline'";
     
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result)> 0 ) { ?>

   <?php
    while($row = mysqli_fetch_assoc($result) ) {?>
    
    

     <?php  echo$last_q= $row["command_quantity"]; ?>
     


   
<?php 
}?>

<?php }mysqli_close($conn); ?> "></div>
         <div class="col"><label for="">Diesel:</label>
    <input type=text  class="form-control"  aria-describedby="basic-addon2" name="die" value="  
<?php 

include ('php/connection.php');


$date= $_SESSION['date'];



 
$sql="SELECT  SUM(QR.quantity_when_starting - QR.quantity_at_th_end) as command_quantity 
FROM `quantity_registerd` QR ,  `sales_list` SA ,`artical` AR 
WHERE SA.date='$date' AND QR.id_artical=AR.id_artical AND QR.id_sales=SA.id_sales AND AR.name='diesel'";
     
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result)> 0 ) { ?>

   <?php
    while($row = mysqli_fetch_assoc($result) ) {?>
    
    

     <?php  echo$last_q= $row["command_quantity"]; ?>
     


   
<?php 
}?>

<?php }mysqli_close($conn); ?>"></div>
         <div class="col"><label for="">Sergaz:</label>
    <input type=text  class="form-control"  aria-describedby="basic-addon2" name="ser" value=" 
<?php 

include ('php/connection.php');


$date= $_SESSION['date'];



 
$sql="SELECT  SUM(QR.quantity_when_starting - QR.quantity_at_th_end) as command_quantity 
FROM `quantity_registerd` QR ,  `sales_list` SA ,`artical` AR 
WHERE SA.date='$date' AND QR.id_artical=AR.id_artical AND QR.id_sales=SA.id_sales AND AR.name='sergaz'";
     
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result)> 0 ) { ?>

   <?php
    while($row = mysqli_fetch_assoc($result) ) {?>
    
    

     <?php  echo$last_q= $row["command_quantity"]; ?>
     


   
<?php 
}?>

<?php }mysqli_close($conn); ?> "></div>
</div>

     </div>
    
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<button class="btn btn-primary" type="submit" name="submit" >Save</button>
</div>

</FORM> 


       
       </div>
     
   </div>
   <div class="card shadow mb-4">
   
   <div class="card-body row">
       
   <div class="table-responsive  col-12  ">
       


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 ">  Bon Commande
</h1>

<table  class="table table-bordered"  width="100%" cellspacing="0">
<thead>
                 <tr>
                     
                    
                 <th> Date </th>
                   
                     <th>Artical Name</th>
                         <th> Quantity of Demond (l) </th> 
                         <th>Warehouse</th>  
                         
                   
                     
                 </tr>
             </thead>
<?php 

include ('php/connection.php');

$date= $_SESSION['date'];
 
 
$sql="SELECT BC.date , AR.name,QC.quantity,WE.name as we
FROM `bon_commande` BC , `artical` AR,`quantity_commande` QC , `warehouse` WE 
WHERE BC.date='$date' AND QC.id_artical=AR.id_artical AND BC.id_bon=QC.id_bon AND  BC.id_ware=WE.id_ware  GROUP BY AR.name";
     
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result)> 0 ) { ?>

<tbody>

   <?php
    while($row = mysqli_fetch_assoc($result) ) {?>
    <tr >

    <td ><?php echo $row["date"]  ?></td>
     <td ><?php echo $row["name"]  ?></td>

     <td ><?php echo $row["quantity"]  ?></td>
     <td ><?php echo $row["we"]  ?></td>



    </tr>
    </tbody>  
<?php 
}?>

<?php }mysqli_close($conn); ?>
</table>
<a class="btn btn-primary" href="print.php" type="submit" name="print" >Print</a>



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
           
           
     

       
    