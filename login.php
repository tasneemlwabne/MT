<?php //include "HomeNav.php"; ?>
<?php require_once "controllerUserData.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Login</title>
  <style>
  @import url("https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap");
body {
 
  box-sizing: border-box;
  justify-content: center;
  align-items: center;
  height: 100vh;
  
}
#showcase {
  background-image: url(./img/showcase1.jpg) ;
  height: 65vh;
}
.center {
  position: relative;
  padding: 50px 50px;
  background: #fff;
  border-radius: 10px;
  opacity: 80%;
  width: 500px;
  height: 600px;
  margin-left:12%;
  margin-top:50px;
}
.center h1 {
  font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #000;
  letter-spacing: 5px;
  margin-bottom: 60px;
  font-weight: bold;
  padding-left: 10px;
}
.center .inputbox {
  position: relative;
  width: 300px;
  height: 50px;
  margin-bottom: 50px;
}
.center .inputbox input {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  border: 2px solid #000;
  outline: none;
  background: none;
  padding: 10px;
  border-radius: 10px;
  font-size: 1.2em;
}
.center .inputbox:last-child {
  margin-bottom: 0;
}
.center .inputbox span {
  position: absolute;
  top: 14px;
  left: 20px;
  font-size: 1em;
  transition: 0.6s;
  font-family: sans-serif;
}
.center .inputbox input:focus ~ span,
.center .inputbox input:valid ~ span {
  transform: translateX(-13px) translateY(-35px);
  font-size: 1em;
}
.center .inputbox [type="button"] {
  width: 50%;
  background: dodgerblue;
  color: #fff;
  border: #fff;
}
.center .inputbox:hover [type="button"] {
  background: linear-gradient(45deg, greenyellow, dodgerblue);
}

</style>
</head>
<body id="showcase">
  <br><br>
<div class="center" >
  <h1>Login</h1>
  <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
  <form method="post" action="login.php">
    <div class="inputbox">
      <input name="email" type="email" required="required">
      <span>Email</span>
    </div>
    <div class="inputbox">
      <input name="password" type="password" required="required">
      <span>Password</span>
    </div>
    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin/adminlog.php">Admin Member?</a></div>
    <br>
    <div class="inputbox">
      <input type="submit" name="login" value="Login">
    </div>
    <div class="link login-link text-center">Not yet a member? <a href="Register.php">Register now</a></div>

  </form>
</div>
</body>
</html>