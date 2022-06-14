
<?php
session_start();
 include 'config.php';
 $msg = "";

 
 if (isset($_POST['submit'])) {
   
 $username = mysqli_real_escape_string($conn, $_POST['username']);
 $password = mysqli_real_escape_string($conn, md5($_POST['password']));
 $sql = "SELECT * FROM users WHERE  username='{$username}' AND password='{$password}' AND type_account='boss' ";
 $result = mysqli_query($conn, $sql);

 if (mysqli_num_rows($result) === 1) {
         $row = mysqli_fetch_assoc($result);
         

         $_SESSION['user_id'] = $row['id'];
         $_SESSION['user_name'] = $row['username'];
         $_SESSION['password'] = $row['password'];


             header("Location:../boss/index.php");
             
 
 } else {
     $msg = "<div class='alert alert-danger'>username or password do not match.</div>";
 }






 $sql1 = "SELECT * FROM users WHERE  username='{$username}' AND password='{$password}' AND type_account='labor' ";
 $result1 = mysqli_query($conn, $sql1);

 if (mysqli_num_rows($result1) === 1) {
         $row = mysqli_fetch_assoc($result1);
         
         $_SESSION['user_id'] = $row['id'];
         $_SESSION['user_name'] = $row['username'];
         $_SESSION['password'] = $row['password'];


            header("Location:../labor official/index.php");
 } else {
     $msg = "<div class='alert alert-danger'>username or password do not match.</div>";
 }




  
 $sql2 = "SELECT * FROM users WHERE  username='{$username}' AND password='{$password}' AND type_account='pump' ";
 $result2 = mysqli_query($conn, $sql2);
 if (mysqli_num_rows($result2) === 1) {
         $row = mysqli_fetch_assoc($result2);
        
         $_SESSION['user_id'] = $row['id'];
         $_SESSION['user_name'] = $row['username'];
         $_SESSION['password'] = $row['password'];

            header("Location:../pump/index.php");
           
 } else {
     $msg = "<div class='alert alert-danger'>username or password do not match.</div>";
 }


    
     }
     

    
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login To PetroEn</title>
    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                     
                    <div class="w3l_form align-self" style="background-color:#fff ;">
                        <div class="left_grid_info">
                        <img src="img/logo.png" alt="">

                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Login Now</h2>
                        <?php echo $msg; ?>
                        <form method="post">
                            <input type="text" class="email" name="username" placeholder="Enter Your User Name" required/>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password"required/>
                          
                          
                            <button name="submit" name="submit" class="btn" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
     
</body>

</html>