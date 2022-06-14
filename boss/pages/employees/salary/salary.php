<?php 
session_start();
include ('php/connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}
?>

<title>Salary</title>
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
<h1 class="h3 mb-2 text-gray-800">Salary</h1>

<div class="  card shadow">
   
   <div class="card-body row">
        
<?php 

include ('php/connection.php');
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}
$num_per_page= 2;
$start_from= ($page-1)*2;


  
$sql = " SELECT * FROM `employees` ORDER BY id_emp DESC LIMIT $start_from,$num_per_page"  ;


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)> 0) { ?>
       
       <div class="table-responsive col-12">
   

<form action="salary.php" method="POST">
    		<label>From: </label><input type="date" name="from">
    		<label>To: </label><input type="date" name="to">
            <input type="submit" class="btn btn-primary" name="submit" value="save"/>
    	</form>

       <!-- modification -->

           
   <table  class="table table-bordered"  width="100%" cellspacing="0">
   <thead>
                    <tr>
                        
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Salary</th>
                        <th>Total Absent</th>
                        <th>Discount</th>
                        <th>Salary after discount</th>

                    </tr>
                </thead>
                
              
                <?php
                                
             
                
   extract($_POST);
   
include ('php/connection.php');
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}
$num_per_page= 5;
$start_from= ($page-1)*5;
   $pr_query=" SELECT * FROM `employees` ORDER BY id_emp  DESC LIMIT $start_from,$num_per_page" ;
   $s=0;
   
   //<!-- modification -->
   
   if (isset($_POST['submit'])){
    
   $start = date("Y-m-d",strtotime($_POST['from']));
 
   $end = date("Y-m-d",strtotime($_POST['to']));
   
   $pr_query2="SELECT id_emp, SUM( absente )  AS value_sum 
   FROM `absent` where date BETWEEN '".$start."' AND '".$end."'
   GROUP BY id_emp";

   $pr_query3 = "SELECT id_emp ,SUM( Discount )  AS value_dic  FROM `absent` where date BETWEEN '".$start."' AND '".$end."'
   GROUP BY id_emp";

//    $pr_query4="SELECT ( Salary - Discount ) AS total
//    FROM `employees` AND `absent` ORDER BY id_emp " ;

      $result = mysqli_query($conn, $pr_query);
      $result2 = $conn->query( $pr_query2);
      $result3 = $conn->query( $pr_query3);
    //   $result4 = $conn->query( $pr_query4);

    //   and $row4= mysqli_fetch_array($result4)
     
      while($row = mysqli_fetch_array($result) and $row2= mysqli_fetch_array($result2)  and $row3= mysqli_fetch_array($result3) ) {
       ?>
       
     <tbody>

    <tr >
        
    <td ><?php echo $row["Name"]; ?></td>
    <td ><?php echo $row["Last_Name"]; ?></td>
    <td ><?php echo $row["salary"]; ?></td>
    <td ><?php echo $row2["value_sum"];?></td>
    <td ><?php echo $row3["value_dic"]; ?></td>
    <!-- <td ><?php echo $row4["total"]; ?></td> -->
    <td ><?php echo $row["salary"] - $row3["value_dic"]; ?></td>
       
    <!-- modification -->

    </tr>
     
     </tbody>
 
     <?php 
     
     }
    }
     ?>
</table>

  </div>
 
<?php }mysqli_close($conn); ?>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
include ('php/connection.php'); 

$pr_query =" SELECT * FROM `employees` ";
$pr_result = mysqli_query($conn,$pr_query);
$total_record= mysqli_num_rows($pr_result);
$total_page = ceil($total_record/$num_per_page);
if($page>1){
    echo"  <a href='salary.php?page=".($page-1)."' class='btn btn-primary'>Previous</a>";
    
}
 
for($i=1 ;$i<$total_page;$i++){
    echo"  <a href='salary.php?page=".$i."' class='btn btn-primary'>$i</a>";

}
if($i>$page){
    echo"  <a href='salary.php?page=".($page+1)."' class='btn btn-primary'>Next</a>";

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