<?php
include('connection.php');
//edit table


if (isset($_REQUEST['submit'])) {
  /*
  $name = mysqli_real_escape_string($conn, $_POST['editusername']);
  $type_account ="boss";
  $password = mysqli_real_escape_string($conn, md5($_POST['editpassword']));

  $id= mysqli_real_escape_string($conn, $_POST['editusername']);

  
  $name=mysqli_real_escape_string($conn, $_POST['name']);
  $code=mysqli_real_escape_string($conn, $_POST['code']);
  $ppl=mysqli_real_escape_string($conn, $_POST['ppl']);
  $spl=mysqli_real_escape_string($conn, $_POST['spl']);
  $mq=mysqli_real_escape_string($conn, $_POST['mq']);
  
       $id= $_SESSION['id_artical'];
          $sql = "UPDATE users SET username='$name',password='$password',type_account='$type_account' WHERE id='$id'";
          $result = mysqli_query($conn, $sql);
          header("Location:../../index.php");
  
          echo '<script language="javascript">';
          echo 'alert("profile has updated !")';
          echo '</script>';*/

       
}

?>
   
        
   <FORM action = "edit.php?id_artical=<?php echo $id ?>" method="post">
    <table  class="table table-bordered"   width="100%" cellspacing="0">
 
    <thead>
                     <tr>
                         
                     <th>Name </th>
                         <th>Code </th>

                         <th>purchasing price per liter(DA)</th>
                         <th>selling price per liter(DA)</th>
                         <th>Max Quantity(l)</th>

 
                         
                     </tr>
                 </thead>
   
  
      <tbody>

<tr>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="name" ></td>

<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="code" ></td>

<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="plp" ></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="slp"></td>
<td ><input type=text  class="form-control"  aria-describedby="basic-addon2" name="mq"  ></td>


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
<button class="btn btn-primary" type="submit" name="update" >Save</button>

   </FORM>
      