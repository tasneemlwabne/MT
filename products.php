<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/products.css">
    <title>Products</title>
    <style>
        header
        {
    width: 85%;
    height: 100vh;
    background: url("img/1.jpg") no-repeat 50% -50%;
    background-size: cover;
	background-attachment: fixed;
        }
    </style>
</head>
<body>
    <?php include("HomeNav.php");
    $id=$_GET['id'];
    ?>
    <br><br><br>    
    <div class="container text-center">
    <hr style="background-color:plum;">
        <h2 style="color:#12222c;font-size:80px;"><?php echo $id; ?> Products</h2>
<hr style="background-color:plum;">
</div>
<center>
<header>

</header>
</center>
<br>
<center>
<hr style="background:plum;width:1113px;">
</center>
<div class="shell">
  <div class="container">
    <div class="row">
<?php
require('Db.php');

$query = "SELECT * FROM product WHERE category ='$id'";
    $sql=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($sql))
    {
        $Did = $row['id'];
        echo '<div class="col-md-3">';
        echo '<div class="wsk-cp-product">';
        echo '<form method="post">';
        echo '<div class="wsk-cp-img">';
        echo '<img src="Admin/product_image/'.$row["image"].'"height="300px" class="img-responsive" />';
        echo '</div>';
        echo '<div class="wsk-cp-text">';
        echo '<div class="title-product">';
        echo '<h3>'.$row["price"].'₪</h3>';
        echo '</div>';
        echo ' <div class="description-prod">';
        echo '<p>'.$row["name"].'</p>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<input type="hidden" name="hidden_id" value="'.$row["id"].'" />';
        echo '<input type="hidden" name="hidden_image" value="'.$row["image"].'" />';
        echo '<input type="hidden" name="hidden_price" value="'.$row["price"].'" />';
        echo '<input type="hidden" name="hidden_quantity" value="'.$row["qty"].'" />';
        echo '<input type="hidden" name="hidden_name" value="'.$row["name"].'" />';
        echo '<a href="details.php?id='.$Did.'" name="details"><input type="button"  name="details" class="btnn" style="background:plum;color:#12222C;margin-left:20px;width:140px;font-size:20px;" value="Details" /></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
          }
?>
</div>
</div>
</div>
    <div id="ft">
        <?php include("foter.php"); ?>
    </div>
</body>
</html>


   













