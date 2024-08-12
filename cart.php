<?php 
require("Db.php");
include("HomeNav.php");
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
	
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				
				$oldQTY=$values['item_qty'];
				$sql_query="update product set qty='".$oldQTY."'where id='". $_GET["id"]."'";
				$retval = mysqli_query($con, $sql_query);
				unset($_SESSION["shopping_cart"][$keys]);
				 header("location:cart.php?remove=1");
			}
		}
	}
}	
if(isset($_GET["remove"]) == 1)
{
    echo '<script>alert("Item Removed")</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/cart.css" >
</head>
<body>
    <br><br><br><br>
    <?php
if(!empty($_SESSION["shopping_cart"]))
{
    $shop='Your Shopping Cart';
    ?>
<div class="container-fluid">
<h1 class="text-center"><?php echo $shop ?></h1>
<br>
<form method="post">
    <div class="row">

        <aside class="col-lg-9">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col" width="800">Product</th>
                                <th scope="col" width="220">Quantity</th>
                                <th scope="col" width="220">Price</th>
                                <th scope="col" width="220">Total</th>
                                <th scope="col" class="text-right d-none d-md-block" width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
						$total = 0;
                        foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
                        if($values["user_email"] == $_SESSION["email"])
                          {
						
					?>
                            <tr>
                                <td>
                                    <figure class="itemside align-items-center">
                                    
                                        <div class="aside"><img src="admin/product_image/<?php echo $values["item_image"]; ?>" class="img-sm"></div>
                                        <figcaption class="info"> 
                                            <a class="title text-dark" data-abc="true"><?php echo $values["item_name"]; ?>
                                            </a>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td> 
                                    <h5  name="qty"  style="width:70px;"><?php echo $values["item_quantity"]; ?> </h5>
                                 </td>
                                 <td>
                                    <div class="price-wrap" name="price"><var class="price"><?php echo $values["item_price"] ;?>₪</var></div>
                                  </td>
                                    <td>
                                    <div class="price-wrap" name="price"><var class="price"><?php echo $values["item_price"] * $values['item_quantity']; ?>₪</var></div>
                                  </td>
                                </td>
                                
                                <td class="text-right d-none d-md-block"> 
                                    <a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>" name="remove" class="btn btn-light" data-abc="true"> Remove</a>                                    
                                </td>
                            </tr>
                            <?php
                            $total += ($values['item_price'] * $values['item_quantity']);
                          }
                        }
                            ?>
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </aside>
        <aside class="col-lg-3">
            <div class="card">
                <div class="card-body">
                <dt>Products Total Price: &nbsp; ₪ <?php echo $total;?></dt>
                <hr>
                    <dl class="dlist-align">
                        <?php 
                        $shipping = 20; 
                        ?>
                        <dt>Total price With Shipping : &nbsp; ₪ <?php echo $total + $shipping;?></dt>
                    </dl>
                    <hr> <a href="purchase.php?id=<?php echo $values["item_id"]; ?>" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Check Out </a>
                </div>
            </div>
        </aside>
    </div>
    </form>
</div>
<?php
                       
                    } else{
                       echo '<br><h1 class="text-center">';
                       echo 'Your Shopping Cart Is Empty';
                       echo '</h1>';
                       echo '<br><br><br><br>';
                    }
                    ?>
<br><br><br>
<?php include("foter.php"); ?>
</body>
</html>

