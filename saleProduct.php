<?php
require "Db.php";
$saleProducts = [];
$sql="SELECT pro_id,name,image,price,qty FROM orders";
$query= mysqli_query($con,$sql);
    $index=0;
    while($row=mysqli_fetch_array($query)) {
        $saleProducts[$index] = $row;
        $index++;
    }
    $sql1="SELECT pro_id,name,image,price,qty FROM orders";
$query1= mysqli_query($con,$sql);
$msg="";
    $productQuantities = [];
    $newProduct= [];
    $i =0;
    if ($query1->num_rows > 0) {
        // סיכום הכמויות
        while($row = $query1->fetch_assoc()) {
            // $product_id = $row["pro_id"];
            // $quantity = $row["qty"];
            
            if (isset($productQuantities[$row['pro_id']])) {
                $productQuantities[$row['pro_id']] += $row['qty'];
                $newProduct[$i] = $row;
            } else {
                $productQuantities[$row['pro_id']] = $row['qty'];
                $newProduct[$i] = $row;
            }
            $newQty = $productQuantities[$row['pro_id']];
            $newProduct[$i] = $row;
            $newProduct[$i]['qty'] = $newQty;
            $i++;
        }
    // print_r($newProduct);

    // print_r($productQuantities);
    $newSales = [];
    $max=0;
        foreach($newProduct as $newSale){
            if($newSale['qty'] > $max) {
                $max = $newSale['qty'];
                $newSales = $newSale;
            }
        }
    } else {
        $msg= "There Is No Best Selling Product At This Moment Beacuse There Is No Orders Yet. !";
    }

    // print_r($newSales);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/products.css">
    <title>Document</title>
</head>
<body>
 
<section id="trainers" class="bg-light py-1" >
  <div class="container" >
  <h2 class="m-heading py-1 text-center">Our Best Selling  <span class="primary-text">Product</span></h2>
    <?php
     if(!empty($newSales)) {
 echo '<div class="row justify-content-center align-items-center" >';
 echo '<div class="wsk-cp-product" style="height: 52vh;">';
 echo '<form method="post" >';
 echo '<div class="wsk-cp-img">';
 echo '<img src="Admin/product_image/'.$newSales["image"].'"height="300px" class="img-responsive" />';
 echo '</div>';
 echo '<div class="wsk-cp-text">';
 echo '<div class="title-product">';
 echo '<h3>'.$newSales["price"].'₪</h3>';
 echo '</div>';
 echo ' <div class="description-prod">';
 echo '<p>'.$newSales["name"].'</p>';
 echo '<a href="details.php?id='.$newSales["pro_id"].'" name="details"><input type="button"  name="details" class="btnn" style="background:plum;color:#12222C;width:140px;font-size:20px;" value="Details" /></a>';
 echo '</div>';
  echo '</div>';
 echo '</div>';
 echo '</div>';
        } else {
            echo '<h2 class="m-heading py-1 text-center" style="color:#12222">'.$msg.'</h2>';
        }
    ?>
  </div>
  </section>
 
</body>
</html>