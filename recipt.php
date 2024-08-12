
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/recipt.css">
</head>
<?php include("HomeNav.php"); ?>
<br><br>
<body style="margin: 0 !important; padding: 0 !important;" bgcolor="#eeeeee">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">             
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Thank You For Your Order! </h2>
                                        <hr>
    <?php
                                                          if(!empty($_SESSION["shopping_cart"])) {
                                                            $sql1="SELECT MAX(count) AS BigCount FROM orders";   
                                                        $query1=mysqli_query($con,$sql1);
                                                        while($row=mysqli_fetch_array($query1))
                                                        {
                                                            $BigCount = $row['BigCount'];
                                                        }
                                                        $sql2="SELECT * FROM orders WHERE count='$BigCount' AND user_email='$_SESSION[email]'";   
                                                        $query2=mysqli_query($con,$sql2);
                                                        if(mysqli_num_rows($query2) > 0)
                                                        {
                                                            $fetch_order = mysqli_fetch_assoc($query2);
                                                            $confirm = $fetch_order['order_id'];
                                                        }
                                                            
                                        ?>
                                        <h4 style="font-weight:600;">
                                        Printed : 
                                    <?php echo $time=date("j F, Y, g:i a"); ?>
                                       </h4>
                                       <b>
                                       <h5>
                                        Order ID : <?php echo $confirm; ?>
                                       </h5>
                                       </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Product Name </td>
                                                <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">  Quantity </td>
                                                <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">  Price </td>
                                                <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Total </td>
                                            </tr>
                                            <?php  
                                          

                                            $total = 0;
                                            $i=1;
                                            foreach($_SESSION["shopping_cart"] as $keys => $values)
                                            {
                                                if($values['user_email'] == $_SESSION['email']) {
                                            //         $sql1="SELECT MAX(count) AS BigCount FROM orders ";   
                                            //         $query1=mysqli_query($con,$sql1);
                                            //         while($row=mysqli_fetch_array($query1))
                                            //         {
                                            //            $sql2="update orders set order_id=$confirm where count=".$row['BigCount']."";
                                            //            $query2=mysqli_query($con,$sql2);
                                            //     if($query2)
                                            //     {
                                            //         echo "<script>alert('ok');</script>";
                                            //     }else {
                                            //         echo "<script>alert('not ok');</script>";
                                            //     }
                                            // }                                      
                                                                                       ?>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> <?php echo $values['item_name']; ?> </td>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> <?php echo $values['item_quantity']; ?> </td>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> <?php echo $values['item_price']; ?> </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> ₪ <?php echo $tot=$values['item_price'] * $values['item_quantity'] ?> </td>
                                            </tr>
                                            <?php 
                                            $total += $tot;
                                            }
                                        }
                                            ?>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Shipping + Handling </td>
                                                <td></td>
                                                <td></td>
                                        
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> ₪ <?php   echo $shipping = 20;?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> TOTAL Price </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">  ₪&nbsp; <?php echo $total + $shipping;?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                
                    <tr>
                        <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                                <tr>
                                    <td align="center" valign="top" style="font-size:0;">
                                        <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                            &ensp;&ensp;&ensp;&ensp;
                                                <tr>
                                                    <td align="center" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                    <?php 
                                                    
                                                     $sql2="SELECT MAX(id) AS BigId FROM purchases";   
                                                     $res=mysqli_query($con,$sql2);
                                                     while($row=mysqli_fetch_array($res))
                                                     {
                                                        $bigID = $row['BigId'];

                                                     }
                                                     $sql3="SELECT * FROM purchases WHERE id='$bigID' AND email='$_SESSION[email]'";   
                                                     $res2=mysqli_query($con,$sql3);
                                                     while($row=mysqli_fetch_array($res2)) 
                                                     {
                                                    ?>
                                                    <p style="font-weight: 800;">Delivery Address</p>
                                                        <b><p><?php echo $row['address']; ?><br><?php echo $row['city']; ?><br><?php echo $row['phone']; ?> </p></b>
                                                        <?php
                                                        // break;
                                                     }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                <tr>
                                                    <td align="center" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Estimated Delivery Date</p>
                                                        <p style="font-weight:700;"> <?php 
                                                        $d=strtotime("+5 Days");
                                                        echo date("j F, Y", $d);
                                                        ?> </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                   
                </table>
            </td>
        </tr>
    </table>
    <?php 
                }
           ?>
           <?php
            
            if(isset($_SESSION["shopping_cart"])) 
           {
                      foreach($_SESSION["shopping_cart"] as $keys => $values)
               {
                   if($values["user_email"] == $_SESSION["email"])
                     {
                        $from = "From: mthome034@gmail.com";
                        $sbj = "MT Assistance";
                        $report = "Thank You For Your Shopping From Us." . "\n" . "The Purchase Proccess Went Successfully." . "\n" . "Your Order Id Is : ". $confirm . "." . "\n" ."Thank You , " . "\n" . "MT Assistance.";
                        
                            if(mail($email,$sbj,$report,$from)) 
                             {
                                // echo '<script>alert("fuck yes")</script>';
                                   unset($_SESSION["shopping_cart"]);
                                 exit();
                            } else {
                                     echo "<script> alert('sorry there is a problem with sending mail') </script>";
                                 } 
                       
                
                  }
            }
         } ?>
<?php include("foter.php"); ?>
        </body>
        </html>

