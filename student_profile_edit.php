<?php

include_once("connections/connection.php");

$con = connection();
$lrn = $_GET['ID'];

$sql = "SELECT * FROM students_data WHERE LRN = '$lrn'";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit']))
{
    $lrn = $_POST['lrn'];
    $lname = $_POST['lastname'];
    $fname = $_POST['firstname'];
    $mname = $_POST['middlename'];
    $bdate = $_POST['birthdate'];
    $bplace = $_POST['birthplace'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contactno'];
    $pschool = $_POST['previousschool'];

    $sql = "UPDATE students_data SET last_name = '$lname', first_name = '$fname', middle_name = '$mname', birth_date = '$bdate', birth_place = '$bplace', age = '$age', age = '$age', gender = '$gender', age = '$age', contact_no = '$contact', previous_school = '$pschool' WHERE LRN = '$lrn'";
    $con->query($sql) or die ($con->error);

    echo header("Location: details.php?ID=".$lrn);

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
            <li><a href="details.php">Back</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <h1>Add new student</h1>
    <form action="" method="post">
    <label for="lrn">LRN</label>
        <input type="text" name="lrn" id="lrn" value="<?php echo $row['LRN']?>">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name']?>">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name']?>">
        <label for="middlename">Middle Name</label>
        <input type="text" name="middlename" id="middlename" value="<?php echo $row['middle_name']?>">

        <label for="birthdate">Birtdate</label>
        <input type="date" name="birthdate" id="birthdate" value="<?php echo $row['birth_date']?>">
        <label for="birthplace">Birthplace</label>
        <input type="text" name="birthplace" id="birthplace" value="<?php echo $row['birth_place']?>">
        <label for="age">Age</label>
        <input type="text" name="age" id="age" value="<?php echo $row['age']?>">
        <label for="gender">Gender</label>
        <select name="" id="">
          <option value="Male" <?php echo ($row['gender'] == "Male")? 'selected' : '';?>>Male</option>
          <option value="Female" <?php echo ($row['gender'] == "Female")? 'selected' : '';?>>Female</option>
        </select>
        <label for="contactno">Contact No</label>
        <input type="text" name="contactno" id="contactno" value="<?php echo $row['contact_no']?>">
        <label for="previousschool">Previous School</label>
        <input type="text" name="previousschool" id="previousschool" value="<?php echo $row['previous_school']?>">

        <button type="submit" name="submit">Done</button>
    </form>
  </body>
</html>