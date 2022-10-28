<?php

session_start();
@include 'config.php';

if(isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $subject = $_POST['subject'];
   $message = $_POST['message'];
   $query = $_POST['query'];

   $_SESSION['nameVal'] = $_POST['name'];
   $_SESSION['emailVal'] = $_POST['email'];

   if(!isset($_POST['name'])) {
      $error[] = 'Name is required!';
   } elseif(!isset($_POST['email'])) {
      $error[] = 'Email is required!';
   } elseif(!isset($_POST['message'])) {
      $error[] = 'Message field can\'t be empty';
   } else {
      $insert = "INSERT INTO form(name, email, subject, message, query) VALUES('$name','$email','$subject','$message','$query')";
      mysqli_query($conn, $insert);

      header('location:user_page.php');  
   }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="user_page.php" method="post">
      <h3>contact us</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" placeholder="enter your full name">
      <input type="email" name="email" placeholder="enter your email">
      <input type="text" name="subject" id="" placeholder="subject">
      <textarea name="message" id="" placeholder="type your message here"></textarea>
      <textarea name="query" id="" placeholder="type your query here if any"></textarea>
      <input type="submit" name="submit" value="Submit Query" class="form-btn">
   </form>

</div>

</body>
</html>