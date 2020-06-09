<?php

if(!isset($_SESSION))
{
    session_start();
}

include_once("connections/connection.php");

$con = connection();

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $LRN = $_POST['LRN'];

    $sql = "SELECT * FROM students_data WHERE username = '$username' AND LRN = '$LRN' AND password = '$password'";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0)
    {
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['lrn'] = $row['LRN'];

        echo header("Location: student_profile.php"); 
    }
    else
    {
      echo "No User Found";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="">
    <title>Random School System</title>
  </head>
  <body>
    <header>
      <div class="container">
        <nav>
          <h1>
            Random High School System
          </h1>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Application</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Login</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <section id="login-section">
        <div class="container">
            <div class="login-form">
            <h2>Login</h2>
            <form action="" method="post">
            
            <input type="text" name="username" id="username" placeholder="Username">
            <label for="username">Username</label>
            
            <input type="text" name="LRN" id="LRN" placeholder="LRN">
            <label for="LRN">LRN</label>
            
            <input type="password" name="password" id="password" placeholder="Password">
            <label for="password">Password</label>
            <button type="submit" name="login">Login</button>
            </form>
            </div>
        </div>
    </section>
  </body>
</html>
