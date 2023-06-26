<?php



    $db_hostname="127.0.0.1";
    $db_username="root";
    $db_password="";
    $db_name="login_pr7";

    $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);


    if(!$conn){
        echo "connection failed: ".mysqli_connect_error();
        exit;
    }

    // if($_SERVER['REQUEST_METHOD'=='POST']){

    if(isset($_POST['name']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender =$_POST['gender'];
    
    

    $query="CREATE TABLE users(id int not null AUTO_INCREMENT,name varchar(50) NOT NULL,email varchar(50) not null,gender varchar(20) not null,password varchar(50) not null,primary key (id))";
    if ($conn->query($query)) {

    }else{
    
    }

    $sql = "INSERT into users (name,email,gender,password) values('$name','$email','$gender','$password')";
    $result=mysqli_query($conn,$sql);
    
    if(!$result){
        echo "error: ".mysqli_error($conn);
        exit;
    }
    session_start();
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    header('Location: index.php');
    echo "account created successfully";


    echo $name . "<br/>";
    echo $email . "<br/>";
    echo $password . "<br/>";
    echo $gender . "<br/>";
}

//}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register Form</title>
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

      button {
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
      p{
        text-align:center;
      }
      a{
        text-decoration:none;
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
      <h2>Register Yourself</h2>
      <form method="post" action="<?php $_PHP_SELF ?>">
        Name: <input type="text" name="name" required/>
        Email: <input type="text" name="email" required/>
        Password: <input type="password" name="password" required/>
        Gender: <br/><br>
        &emsp;&emsp;
        <label for="male">Male</label>
        <input type="radio" id="male" value="Male" name="gender" required/>&emsp;
        <label for="female">Female</label>
        <input type="radio" id="female" value="Female" name="gender" required/><br><br>
        <button type="submit">Regester</button>
        <p>or</p>
        <a href="login_form.php" ><button type='button'>Login</button></a>
    </form>
    </div>
  
  </body>
</html>
