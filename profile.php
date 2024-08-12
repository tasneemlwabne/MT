<?php
include("Db.php");
include("HomeNav.php"); 

if(isset($_POST['saveEmail']))
{
				$id=$_GET['id'];
				$email=$_POST['email'];
				
				$email_check = "SELECT * FROM customers WHERE email = '$email'";
				$res = mysqli_query($con, $email_check);
				if(mysqli_num_rows($res) > 0){
					$errors['email'] = "Email that you have entered is already exist !";
				}
				else
				{

					$userSql2="UPDATE customers SET email='$email' WHERE id='".$id."'";
					$query3=mysqli_query($con,$userSql2);

					$ordersSql="UPDATE orders SET user_email='$email' WHERE user_email='".$_SESSION['email']."'";
					$query4=mysqli_query($con,$ordersSql);

					$bookingSql="UPDATE appointment SET email='$email' WHERE email='".$_SESSION['email']."'";
					$query5=mysqli_query($con,$bookingSql);

					$courseSql="UPDATE course SET email='$email' WHERE email='".$_SESSION['email']."'";
					$query6=mysqli_query($con,$courseSql);

					$purchaseSql="UPDATE purchases SET email='$email' WHERE email='".$_SESSION['email']."'";
					$query7=mysqli_query($con,$purchaseSql);

						$errors['updated'] = "Your Email Has Been Changed Successfully !";
						$_SESSION['email']=$email;
				}
}

if(isset($_POST['save']))
{
	require("Db.php");
	// $filename = $_FILES['image']['name'];
	
	$id=$_GET['id'];
	// echo "<script>alert('$id')</script>";
$name=$_POST['name'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$userSql1="UPDATE customers SET fullname='$name',password='$password',phone='$phone' WHERE id='".$id."'";
$query2=mysqli_query($con,$userSql1); 
if ($query2)
{
$errors['updated'] = "Your Personal Details Has Been Changed Successfully !";
}


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<style>
    body{
    background: #f7f7ff;
    margin-top:100px;
}
.card {
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
</style>
<body>
<?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
					
<div class="container">
    <center>
    <h1>My Account</h1>
    </center>
    <br>
		<div class="main-body">
			<div class="row">
				<div class="col-lg-5">
					<div class="card">
					<form action="" id="Form" method="POST" onsubmit="return form(Form)">
					<?php
							 $sql="SELECT * FROM customers WHERE email='".$_SESSION['email']."'";
							 $query=mysqli_query($con,$sql);
							 while($row=mysqli_fetch_array($query))
							 {
							 ?>
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="img/admin.png" alt="" class="rounded-circle p-1 bg-dark" width="150" height="150">
								<div class="mt-2">
									<h4><?php echo $row['fullname'];?> </h4>
									<p class="text-secondary mb-3"><?php echo $row['email'];?></p>
									<p class="text-muted font-size-sm"><?php echo $row['phone'];?> </p>
								</div>
							</div>
							<hr class="my-0">
						</div>
					    </div>
					</div>
				<div class="col-lg-7">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="name" value="<?php echo $row['fullname'];?>" required>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone'];?>" required>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text"  class="form-control" id="pass" name="password" value="<?php echo $row['password'];?>"  required>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<a href="profile.php?uid=<?php echo $_GET['id']; ?>" name="save"><button type="submit" class="btn px-5 text-#12222c" style="background-color:plum;" name="save">Save Changes</button></a>
								</div>
							</div>
							</form>
							<br>
							<form action="" method="post">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="email" value="<?php echo $row['email'];?> " required>
									<input type="hidden" class="form-control" name="password" value="<?php echo $row['password'];?> ">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<a href="profile.php?uid=<?php echo $_GET['id']; ?>" name="saveEmail"><input type="submit" class="btn px-5 text-#12222c" style="background-color:plum;" name="saveEmail" value="Save Email"></a>
								</div>
							</div>
							</form>
							<?php
							 }
							 ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
						function form() {
  var check1 = /^[a-z]{3,}[0-9]{5,}[A-Z]{2,}$/;
  var check3 = /^[050|052|053|054|055|057|058]{3}[-][0-9]{7}$/g;
  var pass = document.getElementById("pass").elements.value;
  var phone = document.getElementById("phone").elements.value;

  if (check1.test(pass) == true) {
	if(check3.test(phone) == true) {
		alert(
      "Thank You"
    );
	}else {
		alert(
          "your phone number must have at first '050/052/053/054/055/057/058' then ' - ' then only 7 numbers "
        );
        return false;
	}
  } else {
    alert(
      "please enter password that include al least 3 letters then 5 numbers then at least 2 capital letters"
    );
    return false;
  }
}

					</script>
					
    <br>
    <?php include("foter.php"); ?>
</body>
</html>