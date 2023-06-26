<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard Page</title>
    <style>
      body {
        font-family: Arial;
        background-color: #f4f4f4;
        margin:0;
      }

      .container {
        width: fit-content;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

   .container   h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #ff1744;
      }
.container
      input[type="text"],
      input[type="password"] {
        width: 300px;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        display: block;
      }

  .container    button {
        display: block;
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #ff1744;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        border-radius: 5px;
      }
      .header{
        display: flex;
        align-items:center;
        justify-content:space-between;
        padding:20px;
        background:white;
        box-shadow:0 2px 5px rgba(0,0,0,0.2)

      }
      .header h2{
        color:#0e6bf7;
        display: inline;
      }
      .header button{
        float:right;
        margin:0 10px;
        border:none;
        border-radius:5px;
        background: #0e6bf7;
        padding:10px;
        color:white;
        
      }
      #attr{
        color:ff1744;
        text-align:center;
        position: absolute;
        bottom:0px;
        right:0%;
        left:0%;


      }
    </style>
  </head>
  <body>
    <div class="header">
    <div>    
    <h2>Practical-8</h2>
    </div>
        <div>
<?php

error_reporting(E_ALL ^ E_WARNING);
$db_hostname = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name = "login_pr7";

    $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
    if (!$conn) {
        echo "Connection failed: " . mysqli_connect_error();
        exit;
    }
    session_start();

    if(isset($_SESSION['email'])){
    
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];

    

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    

    
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            
        } 
      ?>
      <form method="post" action="<?php $_PHP_SELF ?>"> 
        <button type="submit" name="logout" value='logout' >Logout</button>
    </form>
        <?php
        if($_POST['logout'] and $_SERVER['REQUEST_METHOD'] == "POST"){
    
            session_destroy();
            header("Refresh:0");
        }
    }else {
?>


      
<form method="post" action="<?php $_PHP_SELF ?>"> 
    <button type="submit" name="signup" value='signup'>SignUp</button> 
    <button type="submit" name="login" value='login' >Login</button> 
    </form>
<?php  

if($_POST['signup'] and $_SERVER['REQUEST_METHOD'] == "POST"){
    header('Location: register_form.php');

}
if($_POST['login'] and $_SERVER['REQUEST_METHOD'] == "POST"){
    
    header('Location: login_form.php');
}


}
?>
</div>
        

    </div>
    
    <div class="container">
      <h2>Dashboard</h2>

      <p><?php 
      if(isset($_SESSION['email'])){
      echo "Hello " . $row['name'] . "<br/>"."email: ".$row["email"]."<br/>"."gender: ".$row['gender']."<br>"."password: ".$row["password"]; }?></p>
    </div>


    
  </body>
</html>
