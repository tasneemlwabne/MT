<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The cosmtica - HomePage</title>

  <!-- Main Style -->
  <link rel="stylesheet" href="./css/style1.css">
 <!-- WideScreen Style -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap'); */
*{
	margin:0;
	padding:0;
	box-sizing:border-box;
	font-family:"Poppins", sans-serif;
}
</style>
</head>
<body id="home">
  
  <!-- Navbar -->
    <?php  include "HomeNav.php";  ?>

  <!-- ShowCase -->
  <section id="showcase" class="text-center">
    <div class="showcase-content">
      <h1 class="l-heading py-1">Subscribe with us to get beautiful skin <br> Easy With Our <span class="primary-text" style="color:plum;">MT</span></h1>

    </div>
  </section>

  <section id="about" class="bg-light py-1">
    <div class="container">
        <h2 class="m-heading text-center py-1">
            Hello, We are the <span class="primary-text">Cosmtica MT</span><br />
                We choose Cosmtica because we want to advise or get tips for people to change their lives..
        </h2>
      <div class="about-content">
          <div>
              
              <h1 style="color:plum">&darr; Golden tips &darr;</h1><br />
              <p>
                  * BE PROUD -<br />
                  Avoid popping pimples. A pimple indicates trapped oil, sebum, and bacteria. ...
              </p><br />
              <p>
                  * be clean -<br />
                  Wash twice daily, and again after sweating. ...
              </p><br />
              <p>
                  * Focus on gentle products
 -<br />
 People who need extra care for their skin will generally find that they react better to gentle products, which are less likely to irritate the skin. Products that commonly irritate sensitive skin include:

alcohol-based products
toners
exfoliants
astringents.              </p>
          </div>
        <img class="box-shadow" src="./img/about-us1.jpg" alt="About Us">
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section id="cta" class="text-center">
    <div class="cta-content">
      <div class="container">
        <h1 class="l-heading py-1">Don't <span class="primary-text">Think</span>, Begin <span class="primary-text">Today</span>!</h1>
        <p class="lead">If you're not sweating by the end of your workout, perhaps you aren't pushing yourself hard enough. Try to reach an "out of breath" state at least once during your workout by incorporating high-intensity movements like sprinting, jumping jacks, burpees or squat jumps.</p>
     </div>
    </div>
  </section>

  <section id="programs" class="text-center bg-light py-2" style="height:500px;">
    <h2 class="m-heading py-1">Our <span class="primary-text">Courses</span></h2>
    <center>
    <div class="card mb-3" style="max-width: 900px;">
  <div class="row g-5">
    <div class="col-md-4">
      <img src="img/hydrafacial.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><b style="color:#122222c;"class="m-heading py-1">Hydrofacial <span class="primary-text">Treatment</span></b></h5>
        <?php  
              $sql5 = "SELECT * FROM course";
              $query_rows = mysqli_query($con,$sql5);
              if(mysqli_num_rows($query_rows) > 10) {

        ?>
        <p class="card-text" style="color:red;"><b>Not Available </b></p>
        <?php 
              } else {
                $rows = mysqli_num_rows($query_rows);
        ?>
        <p class="card-text" style="color:green;"><b><?php echo 10-$rows;?> Places Left </b></p>
        <?php 
              }
        ?>
        <p class="card-text" style="color:#12222c;">This is a course in the field of a highly innovative technological device that allows you to combine in one treatment deep cleaning, peeling and mesotherapy without pain and without recovery time! The Hydrafacial treatment improves elasticity and firmness of the skin, gives the skin glow, shine and fragrance, suitable for maintenance treatment, treatment before facial procedures, for acne sufferers and of course - before events.</p>
        <p class="card-text"><small class="text-body-secondary"><a href="course_Register.php" style="font-size:17px;color:#12222c;">Register For The Course</a></small></p>
      </div>
    </div>
  </div>
</div>
</center>
   
  </section>

  <?php include("category.php"); ?>
<br>
  <?php require "saleProduct.php"; ?>
 

<br><br>
  <?php include("foter.php"); ?>
</body>
</html> 