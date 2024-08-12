
<?php
if(isset($_GET['appointmentId']))
{
   
    require("Db.php");
   $id = $_GET['appointmentId'];
        $sql="DELETE FROM appointment WHERE id='$id'";
        $query=mysqli_query($con,$sql);
        if($query){
      echo '<script>alert("The Appointment Has Been Canceled Successfully")</script>';
      echo '<script>window.location="customer_appointment.php"</script>';
    }
}
?>