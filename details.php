<?php

if(!isset($_SESSION))
{
    session_start();
}

include_once("connections/connection.php");

$con = connection();

$lrn = $_GET['ID'];

$sql = "SELECT * FROM students_data WHERE LRN = '$lrn'";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

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
    <h1>Student Management System</h1>
    <div class="student-info">
            <h2>
              <?php echo $row['last_name'];?>, <?php echo $row['first_name'];?> <?php echo $row['middle_name'];?>
            </h2>
            <label for="Name">Name</label>
            <p>
              <?php echo $row['LRN'];?>
            </p>
            <label for="Name">LRN</label>
            <p>
              <?php echo $row['birth_date'];?>
            </p>
            <label for="Name">Date of Birth</label>
            <p>
              <?php echo $row['birth_place'];?>
            </p>
            <label for="Name">Address</label>
            <p>
              <?php echo $row['age'];?>
            </p>
            <label for="Name">Age</label>
            <p>
              <?php echo $row['gender'];?>
            </p>
            <label for="Name">Gender</label>
            <p>
              <?php echo $row['contact_no'];?>
            </p>
            <label for="Name">Contact No</label>
            <p>
              <?php echo $row['previous_school'];?>
            </p>
            <label for="Name">Previous School</label>
          </div>
  </body>
</html>