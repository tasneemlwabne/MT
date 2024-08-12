<?php
$id=$_GET['id'];
require "Db.php";
$sql= "DELETE FROM product WHERE id = '$id'";

$query = mysqli_query($con,$sql);
if($query){
    echo '<script>alert("Product Has Been Deleted Successfully!")</script>';
    header("location:products.php");
}else {
    echo '<script>alert("Something Went Wrong While Deleting Product!")</script>';
}

?>