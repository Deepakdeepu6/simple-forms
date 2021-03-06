<?php
include("process.php");
if(isset($_POST['name']))
$name=mysqli_real_escape_string($conn,$_POST['name']);
else if(isset($_POST['email']))
$email=mysqli_real_escape_string($conn,$_POST['email']);

if(!empty($name))
{
$sl="select * from users where name='$name'";
$result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
$count=mysqli_num_rows($result);
if($count>0)
 {
     echo "<div class='display' style='font-size:1rem;color:red;position:absolute;left:15px;top:-14px;'><sup>*</sup>This Name Already Taken</div>";
 }
else
echo "<div class='display' style='font-size:1rem;color:green;position:absolute;left:15px;top:-14px;'><sup>*</sup>Keep Going</div>";
}
if(!empty($email))
{
    $sl="select * from users where email='$email'";
$result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
$count=mysqli_num_rows($result);
if($count>0)
 {
     echo "<div class='display1' style='font-size:1rem;color:red;'><sup>*</sup>This Email Is Already Exists</div>";
 }
else
echo "<div class='display1' style='font-size:1rem;color:green;'><sup>*</sup>Keep Going</div>";
}
?>