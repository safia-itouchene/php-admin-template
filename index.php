<?php
          session_start();
         if(isset($_SESSION['id_user'])){ 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Home</title>
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.css">


    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("inc/navtop.php");?>
<div class="contanier">
      <?php 
         include("inc/aside.php");
         include("inc/main.php");
         include("inc/rightpage.php");
       ?>
</div>
</body>


<script type="text/javascript" src="script.js"></script>
</html>
<?php }else{
     header('location:login.php');
}?>