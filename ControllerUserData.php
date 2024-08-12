<?php
session_start();
require "db.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['Register'])){
    $fullName = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cPassword']);
    
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }  
    $email_check = "SELECT * FROM customers WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO customers (fullname, email,phone, password, code, status)
                        values('$fullName', '$email','$phone', '$password', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: mthome034@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: Code-Verification.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
    mysqli_close($con);
}

 //if user click verification code submit button
 if(isset($_POST['check'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM customers WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE customers SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if($update_res){
            $_SESSION['name'] = $fullName;
            $_SESSION['email'] = $email;
            header('location: login.php');
            exit();
        }else{
            $errors['otp-error'] = "Failed while updating code!";
        }
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
    mysqli_close($con);
}

 //if user click login button
 if(isset($_POST['login'])){
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$check_email = "SELECT * FROM customers WHERE email = '$email'";
$res = mysqli_query($con, $check_email);
if(mysqli_num_rows($res) > 0){
    $fetch = mysqli_fetch_assoc($res);
    $fetch_pass = $fetch['password'];
    if($password == $fetch_pass){
        $_SESSION['email'] = $email;
        $status = $fetch['status'];
        if($status == 'verified'){
          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;
            header('location: index.php');
        }else{
            $info = "It's look like you haven't still verify your email - $email";
            $_SESSION['info'] = $info;
            header('location: Code-Verification.php');
        }
    }else{
        $errors['email'] = "Incorrect email or password!";
    }
}else{
    $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to Register.";
}
mysqli_close($con);
}

 //if user click continue button in forgot password form
 if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM customers WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE customers SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if($run_query){
            $subject = "Password Reset Code";
            $message = "Hello, $fullName
            Your password reset code is $code";
            $sender = "From: mthome034@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a passwrod reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Something went wrong!";
        }
    }else{
        $errors['email'] = "This email address does not exist!";
    }
    mysqli_close($con);
}

//if user click check reset otp button
if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM customers WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: n-password.php');
        exit();
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
    mysqli_close($con);
}


//if user click change password button
if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $update_pass = "UPDATE customers SET code = $code, password = '$password' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if($run_query){
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: changed-password.php');
        }else{
            $errors['db-error'] = "Failed to change your password!";
        } 
    }
    mysqli_close($con);
}

 //if user click contact button
if(isset($_POST['contact']))
{
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $subject=$_POST['subject'];
  $message=$_POST['message'];

  $query="INSERT INTO contact(fullname,email,phone,subject,message) VALUES ('$fullname','$email','$phone','$subject','$message')";
  $res= mysqli_query($con,$query);

  $from = "From: mthome034@gmail.com";
  $sbj = "Doggy Assistance";
  $report = "Thank you For Conatcting Us." . "\n" . " We Will Response To Your Message Very Soon." . "\n" . "Thank You , " . "\n" . "Doggy Assistance.";
if($res)
{
   if(mail($email,$sbj,$report,$from)) 
   {
       header('location: contact.php');
       exit();
   } else {
   echo "<script> alert('sorry there is a problem with sending mail') </script>";
       } 
} else {
   echo "<script> alert('there is a problem inserting data') </script>";
} 
mysqli_close($con);
}


 //if user clicks BUY Button
 if(isset($_POST['buy_now']))
 {
     if(isset($_GET['id']))
     {
        $cid=$_GET['id'];
        $sql = "SELECT * FROM product WHERE id='$cid'";
        $query=mysqli_query($con,$sql);
        if($query)
        {
 
           if($_POST['hidden_qt'] >= 1 && $_POST['hidden_qt'] - $_POST['quantity'] >= 0)
           {
              $qty=$_POST['hidden_qtty'] - $_POST['quantity'];
              $_SESSION['qty2']=$_POST['quantity'];
              $_SESSION['reset_qty'] = $qty;
            //   $query="update product set qty='".$qty."'WHERE id='".$_GET['id']."'";
            //   $res=mysqli_query($con,$query);
            //   if($res)
            //   {
               echo "<script>alert('thank you for your shopping');</script>";
               header("location:payment.php?id=$cid");
            //   }
           } else{
             echo '<script>alert("Sorry There Is No More Quantity For This Product")</script>';
         }
           } 
        }
     
 }



 /// if user click pay button
 if(isset($_POST['pay']))
{
    if(isset($_GET['id'])) 
   {
    $pid = $_GET['id'];
    $fullname=$_POST['fullname'];
    $email=$_SESSION['email'];
    // $_SESSION['email2']=$email;
    $address=$_POST['address'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];
    // $shipping = $_POST['shipping'];
    $creditN = $_POST['creditN'];
    $exp=$_POST['expire'];
    $cvv =$_POST['CVV'];
    $creditNumber = password_hash($creditN, PASSWORD_BCRYPT);
    $cvvpass = password_hash($cvv, PASSWORD_BCRYPT);
    $query="INSERT INTO purchases(fullname,email,address,city,phone,creditN,cvv,date,pro_id) VALUES ('$fullname','$email','$address','$city','$phone',' $creditNumber','$cvvpass','$exp','$pid')";
   $res= mysqli_query($con,$query);
   if($res)
      {
    echo "<script> alert('The Product Has Been Bought Successfully') </script>";
    // header("location:recipt2.php?id=$pid");
      }
  }

  $order_id=rand(11111,99999);

 $sql3="SELECT MAX(count) AS BigCount FROM orders";
 $query3=mysqli_query($con,$sql3);
 while($row=mysqli_fetch_array($query3))
 {
         $i=$row['BigCount'];
         ++$i;
        $sql4="SELECT * FROM product WHERE id=$pid";
        $query4=mysqli_query($con,$sql4);
        if(mysqli_num_rows($query4) > 0)
        {
            $result = mysqli_fetch_assoc($query4);
        // $id = $row['id'];
        $name=mysqli_real_escape_string($con, $result['name']);
        $price=$result['price'];
        $image= mysqli_real_escape_string($con, $result['image']);
        $qty=$_SESSION['qty2'];
        $email=$_SESSION['email'];
        $order_status="Packaged";
        $query="update product set qty='".$_SESSION['reset_qty']."'WHERE id='".$pid."'";
        $res=mysqli_query($con,$query);
        if($res) {
        $sql="INSERT INTO orders(pro_id,order_id,name,image,price,qty,date,user_email,status,count) VALUES('$pid','$order_id','$name','$image','$price','$qty','$date','$email','$order_status','$i')";
        $query6=mysqli_query($con,$sql);
        $from = "From: mthome034@gmail.com";
        $sbj = "MT Assistance";
        $report = "Thank You For Your Shopping From Us." . "\n" . "The Purchase Proccess Went Successfully." . "\n" . "Your Order Id Is : ". $order_id . "." . "\n" ."Thank You , " . "\n" . "MT Assistance.";
        if($query6) {
            if(mail($email,$sbj,$report,$from)) 
             {
                  header("location:recipt2.php?id=$pid");
                 exit();
            } else {
   echo "<script> alert('sorry there is a problem with sending mail') </script>";
                 } 
        }else {
            echo "<script> alert('there is a problem inserting data') </script>";
         } 
       
        }else {
            echo '<script>alert("Sorry There Is Problem Updating Quantity For This Product")</script>';
        }
    }
 }
 mysqli_close($con);
    }


     //  if user click purchase button
     if(isset($_POST['purchase']))
     {
         if(isset($_GET['id'])) 
        {
         $pid = $_GET['id'];
         $fullname=$_POST['fullname'];
         $email=$_SESSION['email'];
        //  $_SESSION['email2']=$email;
         $address=$_POST['address'];
         $city=$_POST['city'];
         $phone=$_POST['phone'];
         $creditN = $_POST['creditN'];
         $exp=$_POST['expire'];
         $cvv =$_POST['CVV'];
         $creditNumber = password_hash($creditN, PASSWORD_BCRYPT);
         $cvvpass = password_hash($cvv, PASSWORD_BCRYPT);
         
         $query="INSERT INTO purchases(fullname,email,address,city,phone,creditN,cvv,date,pro_id) VALUES ('$fullname','$email','$address','$city','$phone',' $creditNumber','$cvvpass','$exp','$pid')";
        $res= mysqli_query($con,$query);
        if($res)
           {
         echo '<script> alert("The Product Has Been Bought Successfully") </script>';
           }
       }
 
       
  
      if(!empty($_SESSION["shopping_cart"]))
      {
       
        $i=0;
      $sql3="SELECT MAX(count) AS BigCount FROM orders";
      $query3=mysqli_query($con,$sql3);
      if($row=mysqli_fetch_array($query3))
      {
          $i=$row['BigCount'];
      }
      ++$i;
      $order_id=rand(11111,99999);
         foreach($_SESSION["shopping_cart"] as $keys => $values)
         {
             $id = $values['item_id'];
             $pro_name = mysqli_real_escape_string($con, $values['item_name']);
             $price=$values['item_price'];
             $image=mysqli_real_escape_string($con, $values['item_image']);
             $qty=$values['item_quantity'];
             $date=date("d-m-Y h:i:s");
             $email=$values['user_email'];
             $order_status="Packaged";
             $sql="INSERT INTO orders(pro_id,order_id,name,image,price,qty,date,user_email,status,count) VALUES('$id','$order_id','$pro_name','$image','$price','$qty','$date','$email','$order_status','$i')";
             $query=mysqli_query($con,$sql);

             if($query) {
                header("location:recipt.php?id=$id");
                // echo '<script>alert("fuck yeahhhhhh")</script>';
                
             }else{
                echo '<script>alert("not ok")</script>';
             }
           
         }
        
      } 
         mysqli_close($con);   
     }

     //// if user want to sign for the course
if(isset($_POST['course_Register'])) {

    $fullname = $_POST['fullname'];
    $email = $_SESSION['email'];
    $phone = $_POST['phone'];
    $sql5 = "SELECT * FROM course";
    $query_rows = mysqli_query($con,$sql5);
    
    if(mysqli_num_rows($query_rows) > 10){
        $errors['email'] = "You Can`t Register For This Course Because We Reached The Maximum Number Of Participants!";
    } else {
    $check_email2 = "SELECT * FROM course WHERE email='$email'";
    $query_email = mysqli_query($con,$check_email2);
    if(mysqli_num_rows($query_email) > 0) {
        $errors['email'] = "This Email Is Already Exits Or You Have Already Been Registered!";
        }else {
            $insert_sql = "INSERT INTO course(fullname,email,phone) VALUES('$fullname','$email','$phone')";
            $insert_query= mysqli_query($con,$insert_sql);
            $message = "Thank You For Register For Our Course We Will Take Care Of You During The Course!";
            if($insert_query) {
            echo '<script>alert("' . $message . '");</script>';   
            echo '<script>window.location="index.php"</script>';
            }else {
        $errors['db-error'] = "There Was A Problem Inserting Data!";
            }
        }
    }
    mysqli_close($con);
}
     
///if user want to track his order
if(isset($_POST["track"]))
{
            $order_id=$_POST['id'];
            $sql="SELECT * FROM orders Where order_id='$order_id'";
            $result=mysqli_query($con,$sql);
    
            if(mysqli_num_rows($result) > 0)
            {
                    $msg="Your Order Status Is : ";
                    $res= mysqli_fetch_assoc($result);
                    echo '<script>alert("' . $msg . ' ' . $res['status'] . '");</script>';
            }
            else
            {
                echo '<script>alert("the order id you searched for doesnt exist")</script>';
            }
}
?>