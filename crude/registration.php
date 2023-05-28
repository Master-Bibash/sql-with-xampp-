<?php
// session_start();
require 'config.php';

if (!empty($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["submit"])) {
    // $user_id=mysqli_real_escape_string($conn,$_POST[""]);
    $fname = mysqli_real_escape_string($conn, $_POST["Fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["Lname"]);
    $mname = mysqli_real_escape_string($conn, $_POST["Mname"]);
    $country = mysqli_real_escape_string($conn, $_POST["Country"]);
    $state = mysqli_real_escape_string($conn, $_POST["State"]);
    $district = mysqli_real_escape_string($conn, $_POST["District"]);
    $dob = mysqli_real_escape_string($conn, $_POST["DOB"]);
    $age = mysqli_real_escape_string($conn, $_POST["age"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);

    // Validate form inputs (e.g., check for required fields, validate email format)

    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE fname='$fname' OR email='$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or Email has already been taken.');</script>";
    } else {
        if ($password === $confirmpassword) {
            $query = "CALL put_usertable('$fname','$lname','$mname','$country','$state','$district','$dob','$age','$gender','$email','$password','$confirmpassword')";
            mysqli_query($conn, $query);
            echo "<script>alert('Registration success');</script>";
            
        } else {
            echo "<script>alert('Passwords do not match');</script>";
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form action="" method="post" autocomplete="off">
        <label for="Fname">FName</label>
        <input type="text" name="Fname" id="Fname" required><br>

        <label for="Lname">Last Name</label>
        <input type="text" name="Lname" id="Lname" required><br>

        <label for="Mname">Mid Name</label>
          <input type="text" name="Mname" id="Mname" required><br>

          <label for="Country">Country</label>
          <input type="text" name="Country" id="Country" required><br>

          <label for="state">State</label>
          <input type="text" name="State" id="State" required><br>

          <label for="District">District</label>
          <input type="text" name="District" id="District" required><br>

          <label for="DOB">Date of Birth</label>
          <input type="datetime-local" name="DOB" id="DOB" required><br>

          <label for="age">Age</label>
          <input type="text" name="age" id="age" required><br>

          <label for="gender">Gender</label>
          <input type="text" name="gender" id="gender" required><br>

          <label for="email">Email</label>
          <input type="email" name="email" id="email" required><br>

          <label for="password">Password</label>
          <input type="password" name="password" id="password" required><br>
          
          <label for="confirmpassword">Confirm Password</label>
          <input type="password" name="confirmpassword" id="confirmpassword" required><br>
          <button type="submit" name="submit">Register</button>
     </form>
     <br>
     <a href="login.php">Login</a>
</body>