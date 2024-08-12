<?php
include("HomeNav.php");
require "Db.php";
if(isset($_GET['date'])){
require "Db.php";
    $date = $_GET['date'];
 $mysqli = new mysqli('localhost', 'root', '', 'mt3');
    $stmt = "SELECT * FROM appointment WHERE date='$date'";
    // $stmt = $mysqli->prepare("select * from appointment where date = ?");
    // $stmt->bind_param('s', $date);
    $stmt_query = mysqli_query($con,$stmt);
    $bookings = array();
    if(mysqli_num_rows($stmt_query) > 0) {
        while($row=mysqli_fetch_array($stmt_query)){
            $bookings[] = $row['timeslot'];
        }
        mysqli_close($con);
    }
    // if($stmt->execute()){
    //     $result = $stmt->get_result();
    //     if($result->num_rows>0){
    //         while($row = $result->fetch_assoc()){
    //             $bookings[] = $row['timeslot'];
    //         }
            
    //         $stmt->close();
    //     }
    // }
}

if(isset($_POST['submit'])){
    require "Db.php";
    $date = $_GET['date'];
    $name = $_POST['name'];
    $email = $_SESSION['email'];
    $timeslot=$_POST['timeslot'];
    $treatment=$_POST['scheduleday'];
    $phone=$_POST['phone'];
    $stmt = "SELECT * FROM appointment WHERE date='$date' AND timeslot='$timeslot'";
    // $stmt = $mysqli->prepare("select * from appointment where date = ? AND timeslot=?");
    // $stmt->bind_param('ss', $date, $timeslot);
    $stmt_query = mysqli_query($con,$stmt);
    if(mysqli_num_rows($stmt_query) > 0){
        $msg = "<div class='alert alert-danger'>Already Booked</div>";
    }else {
        $stmt2 = "INSERT INTO appointment(name,email,date,timeslot,treatment,phone) VALUES('$name','$email','$date','$timeslot','$treatment','$phone')";
        $stmt2_query= mysqli_query($con,$stmt2);
        if($stmt2_query) {
            $msg = "<div class='alert alert-success'>The Appointment has been Booked successfully</div>";
            $bookings[] = $timeslot;
        } else {
            $msg = "<div class='alert alert-danger'>There was a problem inserting Appointment</div>";
        }
        // mysqli_close($con);
    }
    // if($stmt->execute()){
    //     $result = $stmt->get_result();
    //     if($result->num_rows>0){
    //         $msg = "<div class='alert alert-danger'>Already Booked</div>";
    //     }else{
    //         $stmt = $mysqli->prepare("INSERT INTO appointment (name,email,date,timeslot,treatment,phone) VALUES (?,?,?,?,?,?)");
    //         $stmt->bind_param('ssssss', $name, $email,$date,$timeslot,$treatment,$phone);
    //         $stmt->execute();
    //         $msg = "<div class='alert alert-success'>The Appointment has been Booked successfully</div>";
    //         $bookings[] = $timeslot;
    //         $stmt->close();
    //         $mysqli->close();
    //     }
    // }
}
$duration = 45;
$cleanup = 0;
$start = "09:00";
$end = "18:00";

 
function timeslots($duration, $cleanup, $start, $end,$currentDate){
    $date = $_GET['date'];
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();
    $currentTime = new DateTime();
    if ($currentDate == $currentTime->format('Y-m-d'))
        {
            $errors = array();
            for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
                $endPeriod = clone $intStart;
                $endPeriod->add($interval);
               
                if ($intStart < $currentTime) {
                    continue;
                }
               
                 else {
                $slots[] = $intStart->format("H:i")." - ". $endPeriod->format("H:i");
            }
            }
                if($end < $currentTime) {
                    $message = "Unfortunately, you cannot book any appointment for today because it is past the closing time of 18:00.!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
                } else {
            for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
                $endPeriod = clone $intStart;
                $endPeriod->add($interval);
                $slots[] = $intStart->format("H:i")." - ". $endPeriod->format("H:i");
            }
        }
   
    
    return $slots;
}


?>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
  <body>
 
    <br><br><br><br>
    <div class="container" style="margin-top:58px;">
        <h1 class="text-center text-bold">Making An Appointment For : <?php echo date('Y-m-d', strtotime($date)); ?></h1>
        <hr style="background:plum;">
        <div class="row">
<div class="col-md-12">
   <?php echo(isset($msg))?$msg:""; ?>
</div>
<?php
$currentDate = $_GET['date']; 
$timeslots = timeslots($duration, $cleanup, $start, $end,$currentDate); 
    foreach($timeslots as $ts){
?>
<div class="col-md-3">
    <div class="form-group">
    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
    <br><br>
       <?php if(!in_array($ts, $bookings)){ ?>
       <button class="btn btn book" style="background-color:plum;color:#12222c;font-weight:600;font-size:20px;" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
       <?php } ?>
    </div>
</div>
<?php } ?>
</div>
    </div>

    <div id="myModal" class="modal fade" role="dialog" style="margin-top:100px;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> An Appointment For : <span id="slot"></span> </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post"  id="Form" onsubmit="return form(Form)" autocomplete='off'>
                               <div class="form-group">
                                    <label for="">Time</label>
                                    <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                </div>
                                <div class="form-group">
                                    <label for="">Your Name</label>
                                    <input required type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input  type="email" class="form-control" name="email" value="<?php echo $_SESSION['email'];?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="">Please specify your need</label>
                                    <select class="select form-control" id="scheduleday" name="scheduleday" required>
                                    <option selected disabled>--Select--</option>

                                    <option value="Personal" required>
                                    Personal consultation
                                    </option>
                                    <option value="Hair" required>
                                        Hair Treatment
                                    </option>
                                    <option value="Face" required>
                                        Face Treatment
                                    </option>
                                   </select>
                                   </div>
                                    <div class="form-group">
                                    <label for="">Phone</label>
                                    <input required type="tel" class="form-control" name="phone">
                                    </div>
 

                                <div class="form-group pull-right">
                                    <button name="submit" type="submit" style="background-color:plum;color:#12222c;font-weight:600;" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <script type="text/javascript" src="JS/book.js"></script>

  <script>
$(".book").click(function(){
    var timeslot = $(this).attr('data-timeslot');
    $("#slot").html(timeslot);
    $("#timeslot").val(timeslot);
    $("#myModal").modal("show");
});
</script> 
<br><br><br><br><br>
<?php include("foter.php"); ?>

</body>

</html>