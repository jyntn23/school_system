<?php

if(!isset($_SESSION))
{
    session_start();
}

include_once("connections/connection.php");

$con = connection();

if(isset($_SESSION['UserLogin']) && isset($_SESSION['Access']) && isset($_SESSION["lrn"]))
{
    $LRN = $_SESSION["lrn"];

    $sql = "SELECT * FROM students_data WHERE LRN ='$LRN'";
    $students = $con->query($sql) or die ($con->error);
    $row = $students->fetch_assoc();
    $total = $students->num_rows;
}

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
            Student
          </h1>
          <ul>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <section class="profile-section">
        <div class="container">
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
        </div>
    </section>
    <section class="profile-option">
    <a href="student_profile_edit.php?LRN=<?php echo $row['LRN'];?>">Edit</a>
    </section>
  </body>
</html>
