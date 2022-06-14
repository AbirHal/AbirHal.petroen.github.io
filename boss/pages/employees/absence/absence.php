<?php 
session_start();
include ('php/conn.php');
if(!isset($_SESSION['user_id'])){
    header("Location:../LOG/index.php");
    die();
}
?>


<?php 
include ('include/header.php');?>
    <title>List of attendees and absences</title>
    <script type="text/javascript">
	function getatt(value)
	{
		if(value == true)
		{
			document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) - 1;
			document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) + 1;
		}
		else
		{
			document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) + 1;
			document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) - 1;
		}
	}
</script>
    <?php 

include ('include/navbar.php');?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
    <?php 
    include('include/nav.php');
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
              
                <div class="container-fluid">
 <!-- Begin Page Content -->
 

<!-- Page Heading -->
<h2 class="h3 mb-2 text-gray-800">List of attendees and absences</h2>

<div class="card shadow">
   
   <div class="card-body row">
   <form action="php/getatte1.php" method="post" class="col-12">
        <table width="180px" >
            	<tr>
				<p>
							<label for="firstName">Enter Discount:</label>
							<input type="text" name="disc" id="firstName" >
							
							</p> 
                	<td> Select date : <br />
                   <?php 
				 		    $dt = getdate();
							$day = $dt["mday"];
							$month = date("m");
							$year = $dt["year"];
							
							echo "<select name='cdate'>";
							for($a=1;$a<=31;$a++)
							{
								if($day == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select><select name='cmonth'>";
							for($a=1;$a<=12;$a++)
							{
								if($month == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select><select name='cyear'>";
							for($a=2010;$a<=$year;$a++)
							{
								if($year == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select>";
						?>                    
                    </td>
                </tr>
             </table>	
        
             <table class="table table-bordered "   width="10%"  cellspacing="0">
             <thead>
               <tr>
              <th>FIrst Name</th>
              <th>Last Name</th>
              <th>Absent</th>

            </tr>
			
			<?php

                include('php/conn.php');

				
				if(isset($_GET['page'])){
					$page = $_GET['page'];
				}
				else{
					$page = 1;
				}
				$num_per_page= 2;
				$start_from= ($page-1)*2;
				$query = "SELECT *FROM `employees` order by `id_emp`  DESC LIMIT $start_from,$num_per_page";
				

				$s = 0;
				$result = mysqli_query($conn,$query)or die("select error");
				while($rec = mysqli_fetch_array($result))
				{
					
					

					$s = $s + 1;
					echo ' <tbody>  
                <tr>
							  <td width="114">'.$rec["Name"].'</td>
							  <td width="152">'.$rec["Last_Name"].'</td>
							 
							  <td width="110"><input type=checkbox name='.$rec["id_emp"].'
							   onclick="getatt(this.checked);"/></td>
							   
							  
							</tr>
              </tbody>';
				}





			?>			
           </table>
	
           <table>
                <tr>
                  <td> Total Present : 
					<input type="text" id="txtPresent" value="<?php print $s; ?>" size="10" disabled="disabled"/></td>
                
                  <td> Total Absent :
					<input type="text" id="txtAbsent" value="0" size="10"  disabled="disabled"/></td>
                </tr>
           </table>
       <button class="btn btn-primary " type="submit" name="submit" href="">save</button>  
       </form>
</div>
</div>
                </div>
			</div>

   
<?php include('include/footer.php');?>
