<?php

$conn=mysqli_connect("localhost","root","","forms");
if($conn)
  echo "";
else
echo mysqli_error($conn);

?>
