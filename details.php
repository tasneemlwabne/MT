<?php 
include ('HomeNav.php');


function remove_qty()
{
	include('Db.php');
	$qty=$_POST['hidden_qtty']-$_POST['quantity'];
    $query="update product set qty='".$qty."'WHERE id='".$_GET['id']."'";
    mysqli_query($con,$query);
  mysqli_close($con);
}
?>
<?php
if(isset($_POST["add_to_cart"]) )
{
    if($_POST['hidden_qt'] >= 1 && $_POST['hidden_qt'] - $_POST['quantity'] >=0)
    {
        remove_qty();
  
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'			=>	$_GET["id"],
                "user_email"        =>  $_SESSION["email"],
                'item_name'			=>	$_POST["hidden_name"],
                'item_price'		=>	$_POST["hidden_price"],
                'item_image'        =>  $_POST["hidden_image"],
                'item_quantity'		=>	$_POST["quantity"],
                'item_qty'          => $_POST["hidden_qtty"]
            );
			$_SESSION["shopping_cart"][$count] = $item_array;
			echo '<script>alert("Item Added successfully")</script>';
            header("location:cart.php?success=1");
		}
		else
		{ 
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
        $item_array = array(
            'item_id'			=>	$_GET["id"],
            "user_email"        =>  $_SESSION["email"],
            'item_name'			=>	$_POST["hidden_name"],
            'item_price'		=>	$_POST["hidden_price"],
            'item_image'        =>  $_POST["hidden_image"],
            'item_quantity'		=>	$_POST["quantity"],
            'item_qty'          => $_POST["hidden_qtty"]
        );
		$_SESSION["shopping_cart"][0] = $item_array;  
		echo '<script>alert("Item Added successfully")</script>';
        header("location:cart.php?success=1");
	}
                
}
else
{
  echo '<script>alert("sorry the quantity of the Product is lower than your request quantity")</script>';
}
}

////////////////////////// my code
// if(isset($_POST["add_to_cart"]))
// {
//         if($_POST['hidden_qt'] >= 1 && $_POST['hidden_qt'] - $_POST['quantity'] >=0)
//         {
//             // $qty=$_POST['hidden_qtty']-$_POST['quantity'];
//             // $query="update product set qty='".$qty."'WHERE id='".$_GET['id']."'";
//             // mysqli_query($con,$query);
            
//         if(isset($_COOKIE["shopping_cart"]))
//         {
//             $cookie_data = stripslashes($_COOKIE['shopping_cart']);

//             $cart_data = json_decode($cookie_data, true);
//         }
//         else
//         {
//             $cart_data = array();
//         }

//         $item_id_list = array_column($cart_data, 'item_id');

//         if(in_array($_POST["hidden_id"], $item_id_list))
//         {
//             foreach($cart_data as $keys => $values)
//             {
//                 if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
//                 {
//                     $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
//                 }
//             }
//         }
//         else
//         {
//                     $item_array = array(
//                         'item_id'			=>	$_POST["hidden_id"],
//                         "user_email"        =>  $_SESSION["email"],
//                         'item_name'			=>	$_POST["hidden_name"],
//                         'item_price'		=>	$_POST["hidden_price"],
//                         'item_image'        =>  $_POST["hidden_image"],
//                         'item_quantity'		=>	$_POST["quantity"],
//                         'item_qty'          => $_POST["hidden_qtty"]
//                     );
//                     $cart_data[] = $item_array;
//                 }

                
//                 $item_data = json_encode($cart_data);
//                 setcookie('shopping_cart', $item_data, time() + (86400 * 30));
//                 header("location:cart.php?success=1");
//                 } else {
//                 echo '<script>alert("Sorry The Quantity That You Have Write Greater Than The Quantity Of The Product In The Shop")</script>';
//             }
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/details.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div style="margin-top:-195px;">
    <center>
    <h4 style="font-size:50px;">Product Details</h4>
    </center>
    </div>
<div class="container" id="product_view" style="margin-top:160px;">
<?php
    if(isset($_GET['id']))
    {
        $pid=$_GET['id'];
        $query1 = "SELECT * FROM product where id = '$pid'";
        $sql = mysqli_query($con,$query1);
        while($row = mysqli_fetch_array($sql))
        {
    ?>
        <div class="box">
            <form method="POST">
            <div class="product__img">
                <img src="admin/product_image/<?php echo $row['image']; ?>" height="510px" id="img" alt="">
            </div>
            <div class="product__disc">
                <div class="product__disc--content">
                    <div class="disc__content--about">
                        <?php
                            if($row['qty'] > 2)
                            {
                        ?>
                        <h5 style="color:green;"> Available</h5>
                        <?php
                            } else if($row['qty'] == 2)
                            {
                            ?>
                            <h5 style="color:red;">Only 2 Available</h5>
                             <?php
                            }
                            else if($row['qty'] == 1)
                            {
                            ?>
                            <h5 style="color:red;">Only 1 Available</h5>
                             <?php
                            } else {
                                ?>
                                <h5 style="color:red;"> Not Available</h5>
                            <?php
                            }
                            ?>

                        <h1><?php echo $row['name']; ?></h1>
                        <span><?php echo $row['price']; ?> ₪
                        <input type="number" name="quantity" placeholder="Qty" min='1' max='5' value="1" style="margin-left:20px;width:70px;">
                        </span>
                        <p><?php echo $row['details']; ?></p>
                    </div>

                </div>
            </div>

            <div class="product_buttons">
            <input type="hidden" name="hidden_id" value="<?php echo $row["id"];?>" />
            <input type="hidden" name="hidden_name" value="<?php echo $row["name"];?>" />
            <input type="hidden" name="hidden_image" value="<?php echo $row["image"];?>" />
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>" />
            <input type="hidden" name="hidden_qtty" value="<?php echo $row["qty"];?>" />
            <input type="hidden" name="hidden_qt" value="<?php echo $row["qty"];?>" />
           <a href="cart.php?id=<?php echo $pid ;?>"> <button type="submit" name="add_to_cart" class="btn wishlist">Add To Cart</button></a> 
               <a href="payment.php?id=<?php echo $pid ;?>" name="buy_now"><button name="buy_now" class="btn buy">Buy Now</button></a> 
            </div>
            </form>
        </div>
        <?php
        
        }
    }
    ?>
    </div>
<div style="margin-top:150px;">
<?php include("foter.php"); ?>
</div>
</body>
</html>
