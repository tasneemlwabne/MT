<?php
require "Db.php";
session_start();
$errors = array();

if(isset($_POST['add_admin'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cPassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }  
    $admin_check = "SELECT * FROM admin WHERE username = '$username'";
    $res = mysqli_query($con, $admin_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "username that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $insert_data = "INSERT INTO admin (username, password)
                        values('$username', '$password')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('location: adminLog.php');
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
    mysqli_close($con);
}


if(isset($_POST['admin_log'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
  
    $admin_check = "SELECT * FROM admin WHERE username = '$username'";
    $res = mysqli_query($con, $admin_check);
    if(mysqli_num_rows($res) > 0){
    $fetch = mysqli_fetch_assoc($res);
    $fetch_pass = $fetch['password'];
    $fetch_id = $fetch['id'];
    if($password == $fetch_pass){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['id'] = $fetch_id;
        header('location: adminHome.php');
         }else{
            $errors['email'] = "Incorrect password!";
        }
    }else{
        $errors['email'] = "It's look like you're not yet a admin member! Click on the bottom link to signup.";
    }
    mysqli_close($con);
}

?>