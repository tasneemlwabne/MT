<?php
require "sales.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/home.css">
    <title>index</title>
</head>
<body>
    <?php include("adminNav.php"); ?>
    <header>

    </header>
    <?php
// $id=$_GET['id'];
$sql="SELECT * FROM admin WHERE id=$_SESSION[id]";
$query=mysqli_query($con,$sql);
$fetch_admin = mysqli_fetch_assoc($query);
?>
<center>
<h1> Welcome <?php echo $fetch_admin['username']; ?> !</h1>
</center>
<hr>
<br>
<div class="container">
  <h2>Sales Statistics</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Quarter__Number</div>
      <div class="col col-2" style="margin-left:80px;">Total Sales</div>
      <div class="col col-3">Quarter Number</div>
      <div class="col col-4">Total Supply of stock</div>
      <div class="col col-5">Total profit</div>
    </li>
   <?php
   $inx = 0;
  foreach ($quarters as $quarter => $total_sales) {

   ?>
    <li class="table-row">
      <div class="col col-1" data-label="Job Id"><?php echo $quarter; ?> </div>
      <div class="col col-2" style="margin-left:80px;" data-label="Customer Name"><?php echo $total_sales; ?> ₪</div>
      <?php
      if (isset($quarters2[$quarter])) {
        $total_supply = $quarters2[$quarter];
        ?>
        <div class="col col-3" data-label="Quarter Number"><?php echo $quarter; ?></div>
        <div class="col col-4" data-label="Total Supply of stock"><?php echo $total_supply ; ?> ₪</div>
        <div class="col col-5" data-label="Total profit"><?php echo ($total_sales - $total_supply); ?> ₪</div>
      <?php  }  else {
        echo '<div class="col col-3" data-label="Quarter Number">N/A</div>';
        echo '<div class="col col-4" data-label="Total Supply of stock">N/A</div>';
        echo '<div class="col col-5" data-label="Total profit">N/A</div>';
      }
        ?>
    <?php
}
    ?>
  
    
    </li>
  </ul>
</div>
<br><hr>
<div class="container">
  <h2>All Customers In The Site</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1"> ID</div>
      <div class="col col-2">Customer Name</div>
      <div class="col col-3">Customer Email</div>
      <div class="col col-4">Customer Phone</div>
      <div class="col col-5">Status</div>
    </li>
    <?php 
    $sql2="SELECT * FROM customers";
    $query2=mysqli_query($con,$sql2);
    while($row=mysqli_fetch_array($query2))
    {
    ?>
    <li class="table-row">
      <div class="col col-1" data-label="Job Id"><?php echo $row['id']; ?> </div>
      <div class="col col-2" data-label="Customer Name"><?php echo $row['fullname']; ?></div>
      <div class="col col-3" data-label="Amount"><?php echo $row['email']; ?></div>
      <div class="col col-4" data-label="Payment Status"><?php echo $row['phone']; ?></div>
      <div class="col col-5" data-label="Payment Status"><?php echo $row['status']; ?></div>
    </li>
    <?php
    }
    ?>
  </ul>
</div>
    
</body>
</html>