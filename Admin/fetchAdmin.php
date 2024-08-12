<?php require("adminServer.php"); ?>
<?php 

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$id = $_SESSION['id'];
if($username != false && $password != false){
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $run_Sql = mysqli_query($con, $sql);
    if(mysqli_num_rows($run_Sql) > 0){
       
                header('Location: adminHome.php');
    }
}else{
    header('Location: login.php');
}
?>