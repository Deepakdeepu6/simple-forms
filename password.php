<?php
include("process.php");
session_start();
$now=$_POST['add'];
$id=$_SESSION['id'];
$sl="select * from users where id='$id'";
$result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_array($result))
{
    $email=$row['email'];
}
}
 if($email==$now)
  echo "show";
 else
 echo "no";






?>