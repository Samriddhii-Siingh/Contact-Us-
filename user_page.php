<?php

session_start();
@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h1>thank you <span><?php echo $_SESSION['nameVal'];; ?></span></h1>
      <p>here's your response</p>

      <?php

      if(isset($_POST['submit'])){
         
         $select = " SELECT * FROM form WHERE name = '{$_SESSION['nameVal']}' && email = '{$_SESSION['emailVal']}' ";

         $result = mysqli_query($conn, $select);

         if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
              echo "Name: " . $row["name"]. "<br/>Email : " . $row["email"]. "<br/>Subject : " . $row["subject"]. "<br/>Message: " . $row["message"] . "<br/>Query (if any): " . $row["query"] ;
            }
          } else {
            echo "0 results";
          }
      };
      ?>
   </div>

</div>

</body>
</html>