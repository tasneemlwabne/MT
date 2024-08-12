<?php
include('HomeNav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
    <style>
                     header
        {
    width: 80%;
    height: 90vh;
    background: url(./img/track.jfif) no-repeat -50% -10%;
    background-size: cover;
	background-attachment: fixed;
        }
    </style>
</head>
<body>
    <center>
<header>

</header>
</center>
    <br><br><br><br>
    <center>
        <h1>Track Your Order</h1>
    </center>
    <br>
<div class="card">
    <div class="upper">
        <center>
        <form method="post" action="order_track.php" >
            <div class="form-element">
             <span id="input-header"><h4>Put Order ID</h4></span> 
            <input type="text"  name="id" placeholder="123456">
             </div>
            <br>
         <input style="color:#12222c;font-size:20px;  background-color:plum; width: 150px;" value="track" name="track" type="submit"  >
        </form>
        </center>
    </div>
    <br>
</div>
</body>
</html>
<?php
include('foter.php');
?>