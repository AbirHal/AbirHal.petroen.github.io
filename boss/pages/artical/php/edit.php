<?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}

?>


<?php
include('php/connection.php');

$id = $_GET["id"];
$q = " SELECT * FROM `artical` WHERE `id_artical`= $id";
$row = mysqli_query($conn, $q)->fetch_assoc();

if (isset($_REQUEST['edit'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $pl = $_POST['plp'];
    $sl = $_POST['slp'];
    $mq = $_POST['mq'];
    if ((!empty($name)) && (!empty($code)) && (!empty($pl)) && (!empty($sl)) && (!empty($mq))) {
        $q = " UPDATE `artical` SET `name`='$name',`code`='$code',
        `purchasing_price_liter`='$pl',`selling_price_liter`='$sl',`max_quantity`='$mq' WHERE `id_artical`=$id ";
        $query = mysqli_query($conn, $q);
        if($query) {
            header('location:../artical.php');
        }
    }
   
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
      
        
 <FORM action = "" method = post>
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
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2"  value="<?php echo $row["name"];  ?>" name="name" ></td>

<td ><input type=text  class="form-control"  aria-describedby="basic-addon2"  value="<?php echo $row["code"];  ?>" name="code" ></td>

<td ><input type=text  class="form-control"  aria-describedby="basic-addon2"  value="<?php echo $row["purchasing_price_liter"];  ?>" name="plp" ></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2"  value="<?php echo $row["selling_price_liter"];  ?>" name="slp"></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2"  value="<?php echo $row["max_quantity"];  ?>" name="mq"  ></td>


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
<button class="btn btn-primary" type="submit" name="edit" href="">edit</button>
</div>

</FORM> 

</div>
       
       </div>
     
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
           
           
     

       
    