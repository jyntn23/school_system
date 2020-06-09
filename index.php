<?php

include_once("connections/connection.php");

$con = connection();

$sql = "SELECT * FROM students_data";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();


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
            <li><a href="student_login.php">Login</a></li>
          </ul>
        </nav>
      </div>
    </header>
  </body>
</html>
