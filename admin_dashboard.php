<?php

if(!isset($_SESSION))
{
    session_start();
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
            <li><a href="add_student.php">Add Student</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <h1>Student Management System</h1>
    <table>
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
        </tr>
      </thead>
      <tbody>
        <?php do{?>
        <tr>
          <td><a href="details.php?ID=<?php echo $row["LRN"];?>">View</a></td>
          <td><?php echo $row["last_name"];?></td>
          <td><?php echo $row["first_name"];?></td>
        </tr>
         <?php }while($row = $students->fetch_assoc()) ?>
      </tbody>
    </table>
  </body>
</html>