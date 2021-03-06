<?php
include("process.php");
session_start();
if(!isset($_SERVER['HTTP_REFERER']))
{
  header("location:index.php");
   exit();
}
else if(!isset($_SESSION['email']))
{
  header("location:index.php");
  exit();
}
header("Cache-Control: no cache,must-revalidate,max-age=0");
session_cache_limiter("private_no_expire");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Simple forms">
    <title>Simple Forms</title>
    <link rel="icon" href="icon.svg" type="image/svg" sizes="192x192">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <link rel="icon" href="adminfavicon.png">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<style>
  *{
    margin:0px;
    padding:0px;
    box-sizing: border-box;
  }
 
  .header{
    background-color:#93cee4;
    height:60px;
    width:100%;
    position:relative;
  }
  .heading {
display:flex;
flex-direction: row;
flex-wrap:wrap;
 margin: auto;
width:50%;
  }
  .header img{
    height:40px;
width:40px;
transform:scale(0.8);
text-align: center;
  }
  .header p{
  font-weight:800;
  font-size:1.8rem;
  text-align: center;
  color: #ffffff;

  font-family: 'Times New Roman', Times, serif;
  }
  .insidespan{
   position: absolute;
   margin-top:18px;
   cursor:pointer;

 }
  .insidespan span{
    display:block;
    margin:2px 40px;
    height:5px;
    background-color:#000000;
  border-radius: 5%;
   width:30px;
  }
  
 .sidebar{
   position:absolute;
   height:100%;
   width:250px;
   background-color:#ffffff;
   box-sizing: border-box;
   left:-250px; 
   box-shadow:2px 2px 2px 1px grey;
   border-right:0.7px solid #000000;
 }
 
 .sidebar h3{
   padding-left:20px;
   line-height: 60px;
   font-size: 1.7rem;
  font-family: 'Times New Roman', Times, serif;
 }
 .sidebar span{
   color:#5ccbf3;
 }
 .insidesidebar  {
  display: flex;
   flex-direction: column;
   flex-wrap: wrap;
   overflow-x: hidden;
   overflow-y: auto;
   font-size:1.5rem;
   height:80%;

 }
 .insidesidebar a{
  position: relative;
  left:30px;
  text-decoration: none;
  color:#000000;
  margin-top:20px;
  height: 30px;
  font-size: 16px;
  padding-left:5px;
  font-weight:500;
 }
 .insidesidebar a:hover {
   color:none;
   background-color: #79d1f1;
   border-radius: 18px;
   transition: 0.20s ease-out;
   height:35px;
   padding-left:  18px;
 }
 .privacy{
   width:100%;
   margin-bottom:auto;
   display:flex;
   flex-direction: row;
   flex-wrap: wrap;
 }
.privacy a{
  text-decoration: none;
  font-weight: bold;
}
.sidebar.active{
    left:0px;
    transition: 0.50s ease-in-out;
 }
 .sidebar.go{
  left:-250px;
    transition: 0.50s ease-in-out;
 }
 .sidebar img{
   width:30px;
   height:30px;
   right:0px;
   position:absolute;
 }
 
@media only screen and (max-width:560px)
{
  .sidebar{
    width:100%;
    max-width:200px;

  }
  .insidesidebar{
    height:70%;
    
  }
  .sidebar h3{
   padding-left:20px;
   line-height: 60px;
   font-size: 1.4rem;
  font-family: 'Times New Roman', Times, serif;
 }
 .heading p,.heading img{
   font-size:20px;
   margin:10px auto;
   font-weight:bold;
  
 }
}
.main{
  display:flex;
  flex-direction:row;
  flex-wrap:wrap;
  justify-content:space-around;
  align-items:center;
}
.images img{
  width:100%;
  max-width:250px;
  box-shadow:2px 2px 2px 1px grey;
  cursor:pointer;
  border-radius:8px;

}
.images p{
  font-family: 'Pangolin', cursive;
  font-size:1rem;
  font-weight:bold;
  border-bottom:1px solid black;
  width:100%;
  max-width:250px;
  cursor:pointer;
}
img{
  cursor:pointer;

}
.images:hover img{
 border:3px solid blue;
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
  function show1(){
   let el=document.getElementById("sidebar").style.cssText="left:-250px:transition: 0.50s ease-in-out";
  }
  function show(){
    document.getElementById("sidebar").style.cssText="left:0px;transition: 0.50s ease-in-out;"
  }
  $(window).on("load",function(){
$(".load1").fadeOut("slow");

  });
</script>
<body>
<div id="loader1" class="load1"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>


   <div class="header">
    <div class="insidespan" title="Find More" id="insidespan" onclick="show()">
      <span></span>
     <span></span>
     <span></span>
    </div> 
   <div class="heading">
    <img src="logo.svg" alt="Logo" title="Website Logo">
    <p class="text-center">Simple Forms</p>
  </div> 
  
   </div>
    <!-- Side navigation bar -->
    <div class="sidebar" id="sidebar" >
      <h3 ><span>Simple</span> Forms <img onclick="show1()" src='back.svg' alt='Dont Show' title="Go back"></h3>
         <hr style="background-color:#ba55d3">

      <div class="insidesidebar">
        
            <a href=""> Contact</a>
            <a href="">About Us</a>
            <a href="">My Work</a>
        
              
            
      </div>
      <div style="margin-left:12px;" class="privacy">
        <a href="" class="text-center">Privacy.</a>
        <a href=""  class="text-center">Terms and Condition</a></div>
      </div>
     
    </div>

  <div class="container main mt-2" >
  
    <div class='images'> 
    <a href="names0.php?i=<?php echo $_SESSION['id']?>"><img src='cont.png'></a></br>
    <p>Contact Information</p>
    </div>
    <div class='images'> 
    <a href="sch.php?i=<?php echo $_SESSION['id']?>"><img src='sch.png'></a></br>
    <p>Education Information</p>
    </div>
    <div class='images'> 
    <a href="names0.php?i=<?php echo $_SESSION['id']?>"><img src='contact.png'></a></br>
    <p>For Demo</p>
    </div>
    <div class='images'> 
    <a href="names0.php?i=<?php echo $_SESSION['id']?>"><img src='contact.png'></a></br>
    <p>For Demo</p>
    </div>
  </div>
  
</body>
<script>

</script>
</html>