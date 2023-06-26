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

    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    if ($row) {
        session_start();
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    header('Location: index.php');
        echo "Hello " . $row['name'] . "<br/>"."email: ".$row["email"]."<br/>"."password: ".$row["password"];
    } 

    mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <style>
      body {
        font-family: Arial;
        background-color: #f4f4f4;
      }

      .container {
        width: fit-content;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #ff1744;
      }

      input[type="text"],
      input[type="password"] {
        width: 300px;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        display: block;
      }

      button{
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
        text-align:center;
      }
      a{
        text-decoration:none;
      }
      p{
        text-align:center;
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
    <div class="container">
      <h2>Login</h2>
      <form method="post" action="<?php $_PHP_SELF?> ">
        <label for="email">Email:</label>
        <input type="text" id='email' name="email" required />
        <label for="password">Password:</label>
        <input type="password" id='password' name="password" required />
        <button type="submit">LogIn</button>
        <p>or</p>
        <a href="register_form.php" ><button type='button'>Signup</button></a>
      </form>
    </div>
    
  </body>
</html>
