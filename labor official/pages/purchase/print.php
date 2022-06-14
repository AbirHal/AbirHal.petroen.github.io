<?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}

?>
 <title> Bon Commande</title>
        <?php 
        include ('include/header.php');

        
       ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">


            <!-- Main Content -->
            <div id="content">

         



                <!-- End of Topbar -->

                <!-- Begin Page Content -->
              
                <div class="container-fluid">
 <!-- Begin Page Content -->
 

       
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

$day= $_SESSION['date'];



 
$sql="SELECT BC.date , AR.name, QC.quantity , WE.name as we
FROM `bon_commande` BC , `artical` AR,`quantity_commande` QC , `warehouse` WE , `sales_list` SA
WHERE BC.date='$day' AND QC.id_artical=AR.id_artical AND BC.id_bon=QC.id_bon AND  BC.id_ware=WE.id_ware  GROUP BY AR.name";
     
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
<Button class="btn btn-primary" onclick="window.print()" type="submit" name="print" >Print</Button>



  </div>


       
 
</div>
      
      </div>




</div>

<!-- /.container-fluid -->
   

</div>
<!-- End of Main Content -->

<?php 
include ('include/footer.php');
?>

        </div>
        <!-- End of Content Wrapper -->

      
    <!-- End of Page Wrapper -->
  
    <!-- Scroll to Top Button-->
            </div>
   
           
     

       
    