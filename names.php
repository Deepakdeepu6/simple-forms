<?php
include("process.php");
session_start();
ob_start();
$formnumber=1;

$id=$_GET['i'];
header("Cache-Control: no cache,must-revalidate,max-age=0");
session_cache_limiter("private_no_expire");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Simple Forms</title>
    <link rel="icon" href="icon.svg" type="image/svg" sizes="192x192">

</head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body{
    background-image: linear-gradient(to right, #9fff80,#c6ffb3);
           
}

.prompt{
    display:block;
    border:1px solid black;
    width:100%;
    max-width:500px;
    margin:30px auto;
    height:170px;
    border-radius:10px;
    box-shadow:2px 3px 3px grey;
    color:#000000;
    background-color:#ffffff;
}
#prompt h3{
    font-family: 'Tangerine', serif;
    color:#0E6655 ;
}
#prompt input{
    margin-top:36px;
    border-radius:7px;
    border:none;
    outline:none;
    padding:5px;
    font-size:1.3rem;
    font-weight:450;
    color:#ffffff;
    background-color:#1F618D ;
}
#prompt input[type=tel]{
    outline:blue;
    padding-left:20px;
    height:45px;
    border-radius:5px;
    font-family: 'Montserrat', sans-serif;
}
#prompt button{
    padding-top:10px;

}
i{
  cursor:pointer;
}
.container{
    box-shadow:2px 3px 3px grey;
    height:100%;
    width:100%;
    margin:50px auto;
    background-color:#25c0f8;
   border-radius:10px;
   box-shadow:2px 3px 2px 3px grey;
   display:none;
}

.inside form{
    margin-top:10px;
    
}
div.first{
  top: 0;
  background-color:	 #39e600;
  padding: 50px;
  font-size: 20px;
  border-radius:10px;

  
}

.tab a{
    cursor:pointer;
   transition:0.2s ease-in-out;
   font-family: 'Open Sans Condensed', sans-serif;
   font-size:1.7rem;
   margin:auto;
   color:	#0000ff;
}
.tab a:hover{
   color:#ffffff;
}
.tab a.active{
  color:#ffffff;
}
.tab{
  display:flex;
  flex-direction:row;
  flex-wrap:wrap;
}
.tab a:after{
  content:"";
  display:block;
  border-bottom:4px solid blue;
  width:100%;
  transform:scaleX(0);
  margin:auto;
  transition:transform 250ms ease-in;
}
.tab a:hover:after{
  transform:scaleX(1);

}
/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.retrived{
  font-family: 'Ubuntu', sans-serif;
  font-size:1.9rem;
  font-weight:500;
  color:#ffffff;
}
#inputs{
  display:flex;
  flex-direction:column;
}
#inputs label{
  text-align:left;
  font-family: 'Pangolin', cursive;
  font-size:1.4rem;
  font-weight:bold;
  color:#EBDEF0 ;


}
#inputs input{
  border:none;
    outline:none;
    width:100%;
  border-bottom:0.6px dotted black;
    color:#ffffff;
    font-family: 'IBM Plex Serif', serif;
    font-weight:bold;
    font-size:1.5rem;
    background-color:inherit;
}
#inputs input:focus{
  border-bottom:2px solid white;
}

</style>

<body>
<div class="text-center prompt"  id='main'>
<form action="" method="post" id="prompt">
<h3>Enter the Required Password</h3>
<input type="tel" name="pass" required autofocus='1'/>
<button name="validate" class="btn btn-primary btn-small">Validate</button>
</form>  

</div>
<div class="container" id='show'>
           <div class="row first ">
              <div class="col-12 text-center tab">
                      <a class="tablinks active" onclick="openCity(event,'Questions')">Questions</a> 
                 </div>                  
             </div>
             <hr style='background-color:red;'>
            <div class="row text-center">
              <p class='ml-2' style="font-family: 'Pangolin', cursive;font-size:1.8rem;">Contact Information</p>

                 <div id="Questions" class="col-12 tabcontent" style="display:block;">
              <hr >

                 <form id='inputs' action="" method="post">
                 <label > name<sup style='color:red;'>*</sup></label>
                 <input id="name" type='text' name="name" required><br/>
                 <label >Number<sup style='color:red;' >*</sup></label>

                 <input type='tel' name="number" required><br/>
                 <label >Email<sup style='color:red;' >*</sup></label>

                 <input type='email' name="email" required><br/>
                 <label >Address<sup style='color:red;' >*</sup></label>

                 <input type='email' name="address" required><br/>
                 <button name="send" class='btn btn-warning'>Send</button>
                 
                 </form>
                </div>
              
        </div>
   </div>
   <?php

if(isset($_GET['i']))
{
    $id=$_GET['i'];
}
if(isset($_POST['validate']))
{
$pass=$_POST['pass'];
$sl="select * from users where id='$id'";
$result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_array($result))
{
    $email=$row['email'];
    $_SESSION['sessionemail']=$row['email'];
   $search="select * from password where uid='$id' and uemail='$email' and fnumber='$formnumber' and upassword='$pass'";
   $resultsearch=mysqli_query($conn,$search) or die(mysqli_error($search));
   if(mysqli_num_rows($resultsearch)==1)
   {
    ?>
    <script>
    document.getElementById("main").style.display="none";
     document.getElementById("show").style.display="block";
   

      </script>
    <?php
   }
   else
   {
    ?>     
    <script>
 document.getElementById("main").style.cssText="display:block";
 document.getElementById("show").style.display="none";
 swal({
     title:"Password Incorrect",
     text:"Enter the Password Properly",
     icon:"error"
 });
  </script>
<?php
   }

}
}
  
}

if(isset($_POST['send']))
{
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $number=mysqli_real_escape_string($conn,$_POST['number']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);

    if(!empty($name) && !empty($number))
    {
    $sd="insert into contact(cname,cnumber,sid,semail,formnumber,cemail,caddress) values('$name','$number','$id','".$_SESSION['sessionemail']."','$formnumber','$email','$address')";
    $result=mysqli_query($conn,$sd) or die(mysqli_error($sd));
    if($result)
    {
        ?>
           <script>
           alert("success");
           </script>
        <?php
    }
    else   if($result)
    {
        ?>
           <script>
           alert("Not Submitted");
           </script>
        <?php
    }
}
else{
    ?>
    <script>
    alert("Enter all the fields Properly");
    </script>
 <?php
}
}


 ?>
<body>
</html>
