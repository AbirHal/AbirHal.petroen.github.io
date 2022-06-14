
<?php

include 'connection.php';
$msg = "";

if (isset($_POST['boss'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $type_account ="boss";
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username='{$name}'")) > 0) {
        echo '<script language="javascript">';
        echo 'alert("' . $name .  ' - This user name has been already exists.")';
        echo '</script>';
        } else {
        if ($password === $confirm_password) {
            $sql = "INSERT INTO users (username,password,type_account) VALUES ('{$name}','{$password}','{$type_account}')";
            $result = mysqli_query($conn, $sql);
            header("Location:../../index.php");
        }    
    }
}
if (isset($_POST['labor'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $type_account ="labor";

    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username='{$name}'")) > 0) {
        echo '<script language="javascript">';
        echo 'alert("' . $name .  ' - This user name has been already exists.")';
        echo '</script>';    } else {
        if ($password === $confirm_password) {
            $sql = "INSERT INTO users (username,password,type_account) VALUES ('{$name}','{$password}','{$type_account}')";
            $result = mysqli_query($conn, $sql);
            header("Location:../../../LOG/index.php");
        }    
    }
}
if (isset($_POST['pump'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $type_account ="pump";

    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username='{$name}'")) > 0) {
        echo '<script language="javascript">';
echo 'alert("' . $name .  ' - This user name has been already exists.")';
echo '</script>';
    } else {
        if ($password === $confirm_password) {
            $sql = "INSERT INTO users (username,password,type_account) VALUES ('{$name}','{$password}','{$type_account}')";
            $result = mysqli_query($conn, $sql);
            header("Location:../../../LOG/index.php");
        }    
    }
}

?>