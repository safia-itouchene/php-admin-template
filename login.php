<?php
   include("inc/db.php");
   session_start();
   try{
    if(isset($_POST['login'])){
         if(empty($_POST['email'])&& empty($_POST['password'])){
                  $message="<p>monque des information</p>";
         }else{
          $email=$_POST['email'];
          $password=$_POST['password'];

          $check="select * from tb_admin where email='$email' and password='$password'";
          $result = mysqli_query($con,  $check);
          $row=mysqli_fetch_assoc($result);
          $count=mysqli_num_rows($result);
         
          
          if($count==1){
               $_SESSION["id_user"]=$row['id'];
               $_SESSION["email"]=$_POST["email"];
               header('location:index.php?main');
              $message="<p>Error</p>".$row['user_image']."";
          }else{
            $message="<p>Error</p>".$count."";
          }
         }
    }
}
catch(PDOException $error){
  $message=$error->getMessage();
}
?>
<style>
    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
           
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f0f2f5;
    color: #1c1e21;
}

main {
    height: 90vh;
    width: 100vw;
    position: relative;
    margin: 0 auto;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="row">
            <div class="colm-form">
                <div class="form-container">
                    <h1>SPACE<span>ADMIN</span></h1>
                <form method="post">
                    <input type="email" name='email' placeholder="Email address or phone number">
                    <input type="password" name='password' placeholder="Password">
                    <button name='login' class="btn-login">Login</button>
                <form>
                </div>
            </div>
        </div>
    </main>
  
</body>
</html>