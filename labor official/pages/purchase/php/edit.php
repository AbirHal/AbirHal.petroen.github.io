<?php
include('connection.php');
//edit table

$id=$_GET['GetID'];
$query = "SELECT * FROM `the purchases` WHERE ID ='".$id."'";
$result= mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
  $id=$row["ID"];
  
  $material=$row["material"];

  $tq=$row["tq"];
  $mq=$row["mq"];
  $md=$row["md"];
  $lp=$row["lp"];
  $price=$row["price"];

}

?>
   
        
   <FORM action = "action.php?ID=<?php echo $id ?>" method="post">
    <table  class="table table-bordered"   width="100%" cellspacing="0">
 
    <thead>
                     <tr>
                         
                         <th>Materials</th>
                         <th>The quantity in the tank (l)</th>
                         <th>Max quantity in the tank (l)</th>                         
                         <th>Price per litre (DA)</th>
 
                         
                     </tr>
                 </thead>
   
  
      <tbody>

<tr>
<td class="table-active"><input type=text  class="form-control"  aria-describedby="basic-addon2" name="material"value="unleaded gasoline" ></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="tq"id="tq" value="<?php  echo $row["tq"]?>"></td>
<td class ="table-active"><input type=text  class="form-control"  aria-describedby="basic-addon2" name="mq"value="60000"></td>
<td class="table-active"><input type=text  class="form-control"  aria-describedby="basic-addon2" name="lp"  value=" 45.01 "></td>


 </tr>
 <tr>
<td class="table-active"><input type=text  class="form-control"  aria-describedby="basic-addon2" name="material1" value="diesel
"></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="tq1" id="tq1" value="<?php  echo $row["tq"]?>"></td>
<td class ="table-active"><input type=text  class="form-control"  aria-describedby="basic-addon2" name="mq1"value="50000"></td>
<td class="table-active"><input type=text  class="form-control"  aria-describedby="basic-addon2" name="lp1"  value="  29.01"></td>


 </tr>
 <tr>
<td class="table-active"><input type=text  class="form-control"  aria-describedby="basic-addon2" name="material2" value="sergaz"></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="tq2" id="tq2" value="<?php  echo $row["tq"]?>"></td>
<td class ="table-active"><input type=text  class="form-control"  aria-describedby="basic-addon2" name="mq2"value="30000"></td>
<td class="table-active"><input type=text  class="form-control"  aria-describedby="basic-addon2" name="lp2"  value=" 9 "> </td>


 </tr>   
</tbody>
</table>
<button class="btn btn-primary" type="submit" name="update" >Save</button>

   </FORM>
      