<?php
include("process.php");
session_start();
ob_start();
$formnumber=2;
if(!isset($_SERVER['HTTP_REFERER']))
{
    header("location:index.php");
}
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
    background-image: linear-gradient(to right,#EBDEF0,#D2B4DE );
           
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
.passwordinner{
  color:blue;
  width:100%;
  margin:auto;
  border:1px solid black;
  text-align:center;
  background-color:#ffffff;
  opacity:0;
  border-radius:5px;
  box-shadow:2px 2px 2px 2px grey;
}
.passwordinner form{
  text-align:center;
  margin:auto;
  width:100%;
  margin:auto;

}
.passwordinner input{
  max-width:100px;

}
i{
  cursor:pointer;
}
.container{
    box-shadow:2px 3px 1px grey;
    height:100%;
    width:100%;
    margin:50px auto;
    background-color:#25c0f8;
   border-radius:10px;
   display:block;
}

.inside form{
    margin-top:10px;
    
}
div.first{
  top: 0;
  background-color:#A569BD ;
  padding: 50px;
  height:200px;
  font-size: 20px;
  border-radius:10px;

  
}
/* The switch - the box around the slider */
/* Start Of slide Button */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
/* End of slide button */

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
  border-bottom:4px solid green;
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
.lds-ellipsis {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ellipsis div {
  position: absolute;
  top: 33px;
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background: #fff;
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 8px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 8px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 32px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 56px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(24px, 0);
  }
}

#loader1{
  display:flex;
  align-items:center;
  justify-content:center;
  width:100%;
  margin:auto;
  background-color:green;
  height:100%;
  z-index:2;
  position:absolute;
  top:0;
}
</style>
<script>
  $(window).on("load",function(){
$(".load1").fadeOut(1000);

  });
</script>
<body>
<div id="loader1" class="load1"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>

<div class="text-center prompt"  id='main'>
<form action="" method="post" id="prompt">
<h3>Create Your Password</h3>
<input type="tel"  placeholder='Only Numbers' name="pass" required/>
<button name="validate" class="btn btn-primary btn-small">Create</button>
</form>  

</div>

<div class="container" id='show'>
  <div class='text-right'><a href='profile.php?email=<?php echo $_SESSION['email']?>'><i style='color:red;' class='fa fa-times'></i></a></div>
  <input type="text" value="http://localhost:8080/forms/sch1.php?i=<?= $id ?>" id="myInput" style='opacity:0;'>
           <div class="row first " id='first'>
           <div class="col-12 text-center tab">
                      <a class="tablinks active" onclick="openCity(event,'Questions')">Questions</a> 
                      <a class="tablinks" onclick="openCity(event,'Responses')">Responses</a> 
                 </div>
             <div class='col-6 text-left mt-4' onclick="copy()"><button class='btn btn-info' onclick="myFunction()">Send</button></div>
             <div class='col-6 text-right mt-4' onclick="showpassword()"><button class='btn btn-info'>Password</button></div>
             <div class="text-right passwordinner text-right" id='passwordinner' >
             <i style='color:red; text-align:right;' onclick="nonepassword()" class='fa fa-times '></i>
              <?php
               $sk="select * from password where uid='$id' and uemail='".$_SESSION['email']."' and fnumber='$formnumber'";
               $resultsk=mysqli_query($conn,$sk) or die($conn);
               if(mysqli_num_rows($resultsk)>0)
               {  
                 while($row=mysqli_fetch_array($resultsk))
                {
                 ?>
                 <form action='' method="post">
                    Existing Password:<input type='password' style="border:1px solid black;border-radius:4px" placeholder="only numbers" name='innerpassword' id='innerpassword' value='<?= $row['upassword']?>'>
                 <i onclick="pass()" id='i' class='fa fa-eye-slash' ></i></br>
                   <button class='btn btn-primary btn-sm' name='update'>update</button>
                  </form>
               <?php
                }
                    
               }
               else
               {

               }
               ?>
             </div>            
 


             
             
                   
             </div>
             <hr style='background-color:red;'>
             <p class='ml-2' style="font-family: 'Pangolin', cursive;font-size:1.8rem;">Education Info</p>

            <div class="row text-center">

                 <div id="Questions" class="col-12 tabcontent" style="display:block;">
              <hr >

                 <form id='inputs'>
                 <label >Primary<sup style='color:red;'>*</sup></label>
                 <input id="name" type='text' name="primary" required><br/>
                 <label >Higher Primary<sup style='color:red;' >*</sup></label>

                 <input type='text' name="higher" required><br/>
                 <label >Puc or Diploma<sup style='color:red;' >*</sup></label>

                 <input type='text' name="puc" required><br/>
                 <label >UG<sup style='color:red;' >*</sup></label>

                 <input type='text' name="ug" required><br/>
                 
                 </form>
                </div>

                <div id="Responses" class="tabcontent col-12">
                 <?php
                 $sls="select * from education where formno='$formnumber' and ssemail='".$_SESSION['email']."' order by time desc";
                 $res=mysqli_query($conn,$sls) or die(mysqli_error($conn));
                 if(mysqli_num_rows($res)>0)
                 { $count=mysqli_num_rows($res);  
                   echo "<div class='text-right' style='font-size:18px;color:green;font-weight:800;'>".$count."</div>";
                    while($row=mysqli_fetch_array($res))
                 {
                     ?>
                     <div class='row retrived'>
                     <div class='col-12 col-sm-6'>Primary:<?php echo $row['primary1'];?></div>
                     <div class='col-12 col-sm-6'>Higher primary:<?php echo $row['higherprimary1'];?></div>

                     </div>
                     
                     <div class='row retrived'>
                     <div class='col-12 col-sm-6'>Undergraduation:<?php echo $row['undergraduation'];?></div>
                     <div class='col-12 col-sm-6'>Puc or Diploma:<?php echo $row['puc'];?></div>
                     </div>
                     <div class='row retrived'>
                     <div class='col-12 col-sm-12'>Time:<?php echo $row['time'];?></div>
                     </div>

                     <hr>
                     <?php
                 }
                 }
                 else
                 {
                  ?>
                  <div class='alert alert-primary'  role='alert'>
                  No Responses
                  </div>
                  <?php
                 }
                  ?>
               </div>
              
        </div>
   </div>


   <script>
   function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
   
    function nonepassword(){
     var pass1=document.getElementById("passwordinner");
     pass1.style.cssText="opacity:0;transition:0.45s ease-out";
     var firsr=document.getElementById("first");
     first.style.cssText="height:200px;transition:0.45s ease-out";


   }
   function showpassword(){
     var pass=document.getElementById("passwordinner");
     pass.style.cssText="opacity:3;transition:0.45s ease-in-out";
     var firsr=document.getElementById("first");
     first.style.cssText="height:400px;transition:0.45s ease-out";
   }
   function pass()
   {
     var pass=document.getElementById('innerpassword');
     var i=document.getElementById("i");
     if(pass.type=="password")
     {
       pass.type="text";
       i.className=i.className.replace("fa fa-eye-slash","fa fa-eye fa-0.9x");

     }
     else
     if(pass.type=="text")
     {
       pass.type="password";
       i.className=i.className.replace("fa fa-eye fa-0.9x","fa fa-eye-slash");

     }
   }
function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
   </script>
   <?php

  //  check Existing Password
  $sdd="select * from password where uid='$id' and uemail='".$_SESSION['email']."' and fnumber='$formnumber'";
  $resultsdd=mysqli_query($conn,$sdd) or die(mysqli_error($conn));
  if(mysqli_num_rows($resultsdd)==1)
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
 document.getElementById("main").style.display="block";
   document.getElementById("show").style.display="none";

    </script>
  <?php
 }


//  Enter New Password
if(isset($_POST['validate']))
{
  $pass=$_POST['pass'];
$sl1="insert into password(uid,uemail,fnumber,upassword) values('$id','".$_SESSION['email']."','$formnumber','$pass') ";
$result1=mysqli_query($conn,$sl1) or die(mysqli_error($conn));
if($result1)
{
  ?>
  <script>

  window.location.href='sch.php?i=<?= $id?>';
 

    </script>
  <?php
}
else
{
  ?>
     <script>
      swal({
        title:"Error",
        type:"Password Not Set",
        icon:"warning"
      });
     </script>
 
  <?php
}
}
if(isset($_POST['update']))
{
  $passwordinner=$_POST['innerpassword'];
  $sg="update password set upassword='$passwordinner' where uid='$id' and uemail='".$_SESSION['email']."' and fnumber='$formnumber'";
  $result=mysqli_query($conn,$sg) or die(mysqli_error($conn));
  if($result)
  {
     ?>
      <script>
      swal({
        title:"Success",
        text:"Successfully Updated",
        icon:"success"
      }).then(okay=>{
        if(okay)
         window.location.href="sch.php?i=<?php echo $id?>";
      });
       </script>
     <?php   
  }
  else
  {

  }
}
?>
<body>
</html>
