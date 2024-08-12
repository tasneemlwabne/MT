<?php require "adminServer.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Add Admin User</title>
</head>
<body id="showcase">
  <br><br>
<div class="center" >
  <h1>Add Admin User</h1>
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
    <div class="inputbox">
      <input name="cPassword" type="password" required="required">
      <span>Re-Type Password</span>
    </div>
    <br>
    <div class="inputbox">
      <input type="submit" name="add_admin" value="Submit">
    </div>
  </form>
</div>
</body>
</html>