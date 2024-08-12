<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="css/contact.css">
    <title>Contact Us</title>
  </head>
  <body>
<?php include("HomeNav.php"); ?>
<br>
  <div class="content">
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <h5 class="heading mb-4">Let's talk about everything!</h5>
              <p><img src="img/1.jpg" alt="Image" id="img1" class="img-fluid"></p>
            </div>
            <div class="col-md-6">
                <h2 class="text-center"> Contact Us</h2>
                <h5 class="text-center"> We are here to assist you.</h5>
                <br>
              <form class="mb-5" method="post" id="Form"  action="contact.php" onsubmit="return form(Form)">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text"  class="form-control" name="fullname" id="fullname" placeholder="Your Full Name" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <textarea class="form-control" style="background-color:WhiteSmoke;" name="message" id="message" cols="30" rows="7" placeholder="Write your message" required></textarea>
                  </div>
                </div>  
                <div class="row">
                  <div class="col-12">
                    <input type="submit" value="Get a Response Back Soon" name="contact" class="btn btn-primary rounded-2 py-2 px-4">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="JS/contact.js"></script>
  <?php include('foter.php'); ?>
  </body>
</html>