
<?php require("fetchname.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    .join {
    float: right;
  }
</style>
</head>
<body>
    <div class="contain">
        <div class="nav-bar fixed-top">
           <ul>
               <li><a class="navbar-brand" href="index.php"><img src="img/cover.png" style="width:120px;margin-top:-8px;border-radius:10px;"></a></li>
               <li><a href="index.php">Home</a></li>
             <li>
                 <a href="calendar.php">Book Appointment
                 <span class="arrow-down"></span>
                 </a>
                 <ul class="dropdown">
          <li>
                <a href="customer_appointment.php">My Appointments</a>
            </li>
            </ul>
            </li>
             <li><a href="contact.php">Contact Us</a></li>
             <li><a href="about.php">About Us</a></li>
             <li class="nav-item form-inline my-2 my-lg-0 join">
      <a class="nav-link" href="cart.php">
      <span class="badge badge-pill badge-light">
      <?php
// if($fetch_info["email"] == $_SESSION['email'])
// {
if (isset($_SESSION['shopping_cart'])){
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
        if($values["user_email"] == $_SESSION["email"])
        {
    $count = count($_SESSION["shopping_cart"]);
    echo "<span id=\"cart_count\" class=\"text-primary \">$count</span>";
    break;
}else{
    echo "<span id=\"cart_count\" class=\"text-primary \">0</span>";
}
    }
}
// }
?>
					 </span>
      <i class="bi bi-bag-check"></i>
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg>
      </a>
      </li>
             <li class="dropdown float-right" style="margin-right:42px;">
                            <a href="#" > 
                            <i class="bi bi-person-lines-fill"></i>
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
</svg><span class="arrow-down"></span>
</a>
          <ul class="dropdown">
          <li>
      <hr class="dropdown-divider" />
    </li>
    <li><b style="color:black;"><b style="color:red;">Welcome</b> &nbsp;<?php echo $fetch_info["fullname"] ;?></b></li>
    <hr>
    <li><a href="profile.php?id=<?php echo $fetch_info['id']; ?>" class="btn btn-outline-success">My Account</a></li>
    <li><a href="customer_order.php" class="btn btn-outline-success">Orders</a></li>
    <li><a href="order_track.php" class="btn btn-outline-success">Track Order</a></li>
    <li><a href="logout.php?logout='1'" class="btn btn-outline-success">LOGOUT</a></li>
 </ul>

            </ul> 
        </div>    
    </div>
</body>
</html>
