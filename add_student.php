<?php

include_once("connections/connection.php");

$con = connection();

if(isset($_POST['submit']))
{
    $lrn = $_POST['lrn'];
    $lname = $_POST['lastname'];
    $fname = $_POST['firstname'];
    $mname = $_POST['middlename'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `students_data`(`LRN`, `first_name`, `last_name`, `middle_name`, `username`, `password`) VALUES ('$lrn', '$fname', '$lname', '$mname', '$username', '$password')";
    $con->query($sql) or die ($con->error);

    echo header("Location: admin_dashboard.php");

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <title>Random School System</title>

  </head>
  <body>
    <header>
      <div class="container">
        <nav>
          <h1>
            Admin
          </h1>
          <ul>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <h1>Add new student</h1>
    <form action="" method="post">
    <label for="lrn">LRN</label>
        <input type="text" name="lrn" id="lrn">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname">
        <label for="middlename">Middle Name</label>
        <input type="text" name="middlename" id="middlename">
        <label for="username">Username</label>
        <input type="username" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button type="submit" name="submit">Add Student</button>
    </form>
  </body>
</html>