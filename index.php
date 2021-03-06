<?php
include("process.php");
ob_start();
session_start();
header("Cache-Control: no cache,must-revalidate,max-age=0");
session_cache_limiter("private_no_expire");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Forms</title>
    <link rel="icon" href="icon.svg" type="image/svg" sizes="192x192">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <link rel="icon" href="adminfavicon.png">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.9.1/sweetalert2.min.js"  type="text/javascript">
</head>
<style>
    .container{
        background-color:#E0FFFF;
        box-shadow:2px 2px 2px 2px #ADD8E6;
       border-radius:8px;
    }
  
.left img{
    height:500px;
    width:100%;
    max-width:700px;
    margin:auto;
    animation:0.5s fadeInUp;
}
.right span{
    font-family: 'Inconsolata', monospace;
    text-align:center;
    font-size:2rem;
    font-weight:bold;
    color:#3829dc;
    
}

.innerform{
    position:relative;
}
.innerform label{
    position:absolute;
    left:0px;
    font-family: 'Itim', cursive;
    font-weight:bold;
    font-size:1.5rem;
    color:#7B68EE;
}
.innerform form{
    margin-top:30px;
}
.innerform form input{
    border:none;
    outline:none;
    border-bottom:2px solid black;
    width:100%;
    font-family: 'IBM Plex Serif', serif;
    font-weight:bold;
    font-size:1.5rem;
    background:transparent;
}
.innerform form label{
    transition:0.5s ease-out;
    pointer-events:none;
}
.innerform input[type=password]:focus ~ label,.innerform input[type=password]:valid ~ label{
    font-size:1rem;
    top:75px;
    font-weight:500;

}
.innerform input[type=text]:focus ~ #lemail,.innerform input[type=text]:valid ~ #lemail{
    top:-30px;
    font-size:1rem;
    font-weight:500;


}
.right button{
    padding:5px;
    margin-top:20px;
    font-size:1rem;
    font-weight:800;
    font-family: 'IBM Plex Serif', serif;
    background-color:#25c0f8;
    border:none;
    box-shadow:2px 2px 2px grey;
    color:#ffffff;
}
.right button:hover{
    transform:scale(1.1);
}
.right{
    position:relative;
}
.registration{
    position:absolute;
    top:50px;
    width:100%;
    max-width:490px;
    height:500px;
    margin:auto;
    border:1px solid black;
    transform:scale(1.0);
    border-radius:5px;
    box-shadow:2px 2px 3px grey;
    display:none;
   background-color:#E0FFFF;

}
@media only screen and (max-width:768px)
{    .left img
    {
        width:83%;
        height:90%;
        text-align:center;
    }
  
}
@media only screen and (max-width:995px)
{ 
.registration{
    max-width:320px;
   margin:auto;
   background-color:#E0FFFF;
        height:60%;
        top:60px;
        position:absolute;
   }
   
}
#registration h3{
    font-family: 'Big Shoulders Stencil Text', cursive;
    color:#3829dc;

}
#registration .inside{
    text-align:center;
    margin:20px auto;   
    width:100%;
    max-width:300px;
}
#registration input{
    padding:10px 20px;
    margin-top:10px;
    border-radius:5px;
    width:100%;
    margin-left:auto;
}
#registration input:focus{
    transition:0.35s ease-out;
    outline-color:blue;
}
#registration form ::placeholder{
    font-size:1.2rem;
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
  z-index:2;
  height:100%;
  position:absolute;
  top:0;
}
</style>
<script>
   function show(){
       document.getElementById("registration").style.cssText="width:100%;display:block;transition:0.95s ease-in";
       document.getElementById("first").style.cssText="filter:blur(2px)";

   }
   function closing(){
       document.getElementById("registration").style.cssText="display:none;transition:0.25s ease-out";
       document.getElementById("first").style.cssText="filter:blur(0px)";

   }

  function validate()
{
    var pass=document.forms['myform']['password'].value;
    var pass1=document.forms['myform']['cpassword'].value;
    if(pass==pass1)
    {  
    document.getElementById("error").style.display="none";
password
        return true;
    }
   else if(pass!==pass1)
   {
       document.getElementById("error").style.display="block";
       
    return false;
    }
   
}









  $(document).ready(function(){
        $("#name").keyup(function(){
            var name=$(this).val();
            if(name!='')
               {
                   $.ajax({
                       url:"searchname1.php",
                       method:"post",
                       data:{name:name},
                       dataType:"text",
                       success:function(response){
                           $("#display").html(response);
                       }
                   });
               }
               else
               {

               }
        });
        $("#email1").keyup(function(){
            var email=$(this).val();
            if(email!='')
               {
                   $.ajax({
                       url:"searchname1.php",
                       method:"post",
                       data:{email:email},
                       dataType:"text",
                       success:function(response){
                           $("#display1").html(response);
                       }
                   });
               }
               else
               {

               }
        });

  });
  $(window).on("load",function(){
$(".load1").fadeOut(1000);
  });
</script>
<body>
<div id="loader1" class="load1"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>

 <div class="container mt-5 ">
     <div class="row first" id="first">
         <div class="col-12 col-sm-6 left">
               <img src="right image.png" alt="Simple Image">
         </div>
         <div class="col-12 col-sm-6 right pl-5 ">
         <span class="text-center " >SIGN IN</span>

               <div class="innerform text-center mt-5 " style="height:50%">

                   <form action="" method="post">
                       <input type="text" id="email" name="email1" required autofocus="1"><label for="email" id="lemail">Email</label></br></br></br></br>
                       <input type="password" id="password"  name="password1" required><label for="password">password</label></br>
                       <button title="login" name="login"> 
                           LOGIN
                       </button>
                   </form>
                   <p style="color:red;font-weight:100;font-size:15px;user-select:none;">Not Registered? <span onclick="show()" style="color:green;font-weight:100;font-size:15px;cursor:pointer">Sign up Here</span></p>
               </div>
         </div>
     </div>
    <!-- For Registration -->
            <div class="registration row" id="registration">
                <button style="float:right;color:red;background-color:#ffffff;border-radius:6px;" onclick="closing()"><i class="fa fa-times"></i></button>
                <h3 class="text-center">Register Here</h3>
                <div class="col-sm-6 inside">
                     <form action="" name="myform" method="post" onsubmit="return validate()">

                       <input id="name" type="name" name="name" placeholder="Name"  required autofocus="1"> 
                     <div id="display"></div>
                                           
                       <input id="email1" type="email" name="email" placeholder="Email"  required >
                     <div id="display1" style="text-align:left;"></div>

                       <input id="password1" type="password"  name="password" placeholder="Password"   required>
                       <input id="password2" type="password"  name="cpassword" placeholder="Confirm-Password"   required>
                       <div id="error" style="display:none;color:red;text-align:left">Password's are Not Matching</div>
                       </br></br>
                       <button title="Sign Up"  name="regist" class="btn btn-primary"> 
                           SIGN UP
                       </button>
            
                   </form>
                </div>
            </div>
 </div>
<!-- for login -->
<?php
  if(isset($_POST['login']))
{ 
    $email1=mysqli_real_escape_string($conn,$_POST['email1']);
    $password1=mysqli_real_escape_string($conn,$_POST['password1']);
   if(!empty($email1) && !empty($password1))
   {
        $sl="select * from users where email='$email1' && password='$password1'";
        $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($result)>0)
        {
            $row=mysqli_fetch_array($result);
        while($row['email']==$email1 && $row['password']==$password1)
        {  
            $_SESSION['email']=$row['email'];
            $_SESSION['id']=$row['id'];

            header("location:profile.php?email={$row['email']}");
        }
    }
    else
    {
        ?>
        <script>
         swal({
             title:"Error Message",
             text:"Usernam/Password Incorrect",
             icon:"error",
         });
       </script>
        <?php
    }
   }
   else
   {
       ?>
        <script>
         swal({
             title:"Error Message",
             text:"Enter All The Field's",
             icon:"warning",
         });
        </script>
       <?php
   }
}
?>

 <!-- for registration -->
 <?php
 if(isset($_POST['regist']))
 {
 $name=mysqli_real_escape_string($conn,$_POST['name']);
 $email=mysqli_real_escape_string($conn,$_POST['email']);
 $password=mysqli_real_escape_string($conn,$_POST['password']);
 $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);
 if(!empty($name) && !empty($email) && !empty($password) && !empty($cpassword))
 {
  if($password!=$cpassword)
  {
         echo "Passowrd's are Not matching";
  }
  else
  {
      $sl="insert into users(name,email,password) value('$name','$email','$password')";
      $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
      if($result)
      {
          ?>
          <script>
          swal({
              icon:"success",
              title:"Registration Success",
              text:"Successfully Registered",
          });


            </script>
          <?php
      }
  }
 }
 else{
    echo "Enter All The Details Properly";

 }
 }


 ?>
</body>
</html>


