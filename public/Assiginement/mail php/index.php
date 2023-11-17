<?php
$error="";$successmessage="";

if($_POST){
  
  if(!$_POST["email"]){
    $error .="An Email address is required.<br>";
  }
  if(!$_POST["Subject"]){
    $error .="A Subject is required.<br>";
  }
  if(!$_POST["content"]){
    $error .="An content is required.<br>";
  }
  if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)===false) {
    
    $error .="An Email is invalid.<br>";
  }
  if($error !=""){
    $error='<div class="alert alert-danger " role="alert"><use xlink:href="#exclamation-triangle-fill"/></svg> '. $error .' </div>';
  }else{
    $emailto="hlo@gmail.com";
    $subject=$_POST['Subject'];
    $content=$_POST["content"];
    $headers="from:".$_POST['email'];

    if(mail($emailto,$subject,$content,$headers)){
      $successmessage='<div class="alert alert-success " role="alert">Your message send successfully</div>';
    }else{
      $error='<div class="alert alert-danger " role="alert">Your message could\'t send</div>';
    }
  }




}


?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Mail</title>
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->

<div class="container p-4">
    <div id="error"><?php echo $error.$successmessage;?></div>
<form method="post">
  <div class="mb-3 ">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="Subject" class="form-label">Subject</label>
    <input type="Subject" class="form-control" id="Subject" name="Subject">
  </div>
  <div class="mb-3">
  <label for="content" class="form-label"> What would you to ask!   </label>
  <textarea class="form-control" id="content" name="content" rows="3"></textarea>
</div>
  <button type="submit" id="submit"  class="btn btn-primary">Submit</button>
</form>
</div>








<script src="./js/jquery.js"></script>


 <script type="text/javascript">
//     $("form").submit(function(e){
//         e.preventDefault();
    

//     var error="";
    

//     if($("#email").val()==""){
//     error+="<p>The email field is required!</p><br>";
//     if($("#Subject").val()==""){
//     error+="<p>The subject field is required!</p><br>";
//     if($("#content").val()==""){
//     error+="<p>The content field is required!</p>";
//     }
// }}
// if(error!=""){

//     $("#error").html('<div class="alert alert-danger " role="alert"><use xlink:href="#exclamation-triangle-fill"/></svg> '+ error +' </div>');
// }else{
//   $("form").off('submit').Submit();
// }
// }); 
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  </body> 
</html>

<!-- <?php
include ("include.php");

echo file_get_contents("https://www.w3school.com");
?> -->