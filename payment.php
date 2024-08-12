<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/purchase.css">
<title>Checkout</title>
</head>
<body>
<?php include("HomeNav.php"); ?>
<br><br><br>
<?php 
if(isset($_GET['id']))
{
    $pid = $_GET['id'];
}
?>
<center>
   <div class="wrapper">
    <div class="container">
        <form  method="post" id="Form"  onsubmit="return form(Form)" >
            <h1>
                <i class="fas fa-shipping-fast"></i>
                Shipping Details
            </h1>
            <div class="name">
                <div>
                    <input type="text" name="fullname" id="fullname" placeholder="Full name" required>
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>" disabled>
                </div>
            </div>
            <div class="street">
                <input type="text" name="address" placeholder="Street Address" required>
            </div>
            <div class="address-info">
                <div>
                    <input type="text" name="city" id="city" placeholder="City" required>
                </div>
                <div>
                    <input type="text" name="phone" id="phone" placeholder="Phone Number" required>
                </div>
            </div>
            <h1>
                <i class="far fa-credit-card"></i> Payment Information
            </h1>
            <div class="cc-num">
                <input type="text" name="creditN" id="creditN" placeholder="Credit Card No." required>
            </div>
            <div class="cc-info">
                <div>
                    <input type="text" name="expire" id="expire" placeholder="Expire Date" required>
                </div>
                <div>
                    <input type="text" name="CVV" id="CVV" placeholder="CCV Number" required>
                </div>
            </div>
            <div class="btns">
                <button name="pay">Purchase</button>
            </div>
            <?php       
                        $pid = $_GET['id'];
                        $sql = "SELECT * FROM product WHERE id='$pid'";
                        $query = mysqli_query($con,$sql);
                        if(mysqli_num_rows($query) > 0){
                            $fetch_product = mysqli_fetch_assoc($query);
                            $fetch_price = $fetch_product['price'];
                        }
                        $shipping = 20; 
                        ?>
                        <center>
                            <p style="background-color:beige;color:#12222c;font-weight:600;">
                            There Is A Shipping Fees For This Product Wich is : <?php echo $shipping;?> ₪.
                         <br>
                            And The Total Price With Shipping Is : <?php echo $fetch_price + $shipping; ?> ₪.
                            </p>
                        </center>
        </form>
    </div>
</div>
</center>
<script type="text/javascript" src="JS/purchase.js"></script>

    <?php include("foter.php"); ?>

</body>
</html>
