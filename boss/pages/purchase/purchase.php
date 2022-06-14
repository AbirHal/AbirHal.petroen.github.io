<?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}
?>
    
  
 <title>  BON Commande</title>
   

       
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
<h1 class="h3 mb-2 text-gray-800">Bon Commande</h1>

<div class="  card shadow">
   
   <div class="card-body row">
   <div class="table-responsive col-12   ">

   
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
if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  else{
    $page = 1;
  }
  $num_per_page= 3;
  $start_from= ($page-1)*3;
$day= $_SESSION['date'];



 
$sql="SELECT BC.date , AR.name, QC.quantity , WE.name as we
FROM `bon_commande` BC , `artical` AR,`quantity_commande` QC , `warehouse` WE , `sales_list` SA
WHERE BC.date='$day' AND QC.id_artical=AR.id_artical AND BC.id_bon=QC.id_bon AND  BC.id_ware=WE.id_ware  GROUP BY AR.name   LIMIT $start_from,$num_per_page";
     
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

  </div>
 

</div>
      
      </div>
               

<?php
include ('php/connection.php'); 

$pr_query ="SELECT BC.date , AR.name, QC.quantity , WE.name as we
FROM `bon_commande` BC , `artical` AR,`quantity_commande` QC , `warehouse` WE , `sales_list` SA
WHERE BC.date='$day' AND QC.id_artical=AR.id_artical AND BC.id_bon=QC.id_bon AND  BC.id_ware=WE.id_ware  GROUP BY AR.name ";
$pr_result = mysqli_query($conn,$pr_query);
$total_record= mysqli_num_rows($pr_result);
$total_page = ceil($total_record/$num_per_page);
if($page>1){
    echo"  <a href='purchase.php?page=".($page-1)."' class='btn btn-primary m-1'>Previous</a>";

}

for($i=1 ;$i<$total_page;$i++){
    echo"  <a href='purchase.php?page=".$i."' class='btn btn-primary m-1'>$i</a>";

}
if($i>$page){
    echo"  <a href='purchase.php?page=".($page+1)."' class='btn btn-primary m-1'>Next</a>";

}

?>
        </div>
       
    </div>
        
   
       
   
</div>



</div>

    
<div class="card-body row">
<form class="form-floating col-8" action="php/note.php" method = post>
        <label for="floatingInputValue">Send note about this:</label>

     <textarea class="form-control bg-warning"  placeholder="Leave a note here" id="floatingTextarea" name="note"></textarea>

    <button class="btn btn-primary m-1 " type="submit" name="submit" href="">Send</button>

    
</form>
</div>
<!-- /.container-fluid -->

<?php 

          

include ('include/footer.php');
?>

</div>
<!-- End of Main Content -->


            <!-- Footer -->
   
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    <!-- End of Page Wrapper -->
  

    <!-- Scroll to Top Button-->
            </div>

  
    