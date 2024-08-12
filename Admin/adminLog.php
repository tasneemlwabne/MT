<?php require "adminServer.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Admin Login</title>
    <style>
        body {
 
 box-sizing: border-box;
 justify-content: center;
 align-items: center;
 height: 100vh;
 
}
#showcase {
 background-image: url(../img/showcase1.jpg) ;
 height: 65vh;
}
.center {
 position: relative;
 padding: 50px 50px;
 background: #fff;
 border-radius: 10px;
 opacity: 80%;
 width: 400px;
 height: 660px;
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
.center .inputbox:hover [type="submit"] {
 background: #12222c;
 color:beige;
}
    </style>
</head>
<body id="showcase">
  <br><br>
<div class="center" >
    <h1>Admin Login</h1>
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
  <form method="post">
    <div class="inputbox">
      <input name="username" type="text" required="required">
      <span>User Name</span>
    </div>
    <div class="inputbox">
      <input name="password" type="password" required="required">
      <span>Password</span>
    </div>
    <br>
    <div class="inputbox">
      <input type="submit" name="admin_log" value="Submit">
    </div>
    <div class="link login-link text-center">Not yet a admin member? <a href="adminAddworker.php">Click To Register</a></div>
  </form>
</div>
</body>
</html>