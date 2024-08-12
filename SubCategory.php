
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="css/SubCategory.css">
</head>
<body>
<?php  include "HomeNav.php";  ?>
<br><br><br>
    <section id="trainers" class="bg-light py-1">
    <div class="container">
      <h2 class="m-heading py-1 text-center"> Our Face<span class="primary-text"> Categories</span></h2>
      <div class="trainer-boxes">
        <div class="trainer-box box-shadow p-1">
        <a href="products.php?id=Oily">
          <img class="img" src="img/oily-skin.webp" alt="Hair">
        </a>
          <hr>
          <h3 id="h3">Oily Skin</h3>
        </div>
        <div class="trainer-box box-shadow p-1">
        <a href="products.php?id=Dry">
          <img  class="img" src="img/dry-skin.jpg" alt="Face">
        </a>
          <hr>
          <h3 id="h3">Dry Skin</h3>
        </div>
        <div class="trainer-box box-shadow p-1">
        <a href="products.php?id=Sensitive">
          <img  class="img" src="img/sensitive-skin.jpg" alt="Face">
        </a>
          <hr>
          <h3 id="h3">Sensitive Skin</h3>
        </div>
      </div>
    </div>
  </section>

  <?php include("foter.php"); ?>
</body>
</html>


