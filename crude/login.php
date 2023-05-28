<?php
require_once "config.php";

if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE fname='$usernameemail' OR email='$usernameemail'");
    echo "hello";
    
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["user_id"];
            header("Location: index.php");
            exit();
        }
    }

    echo "<script>alert('Invalid username/email or password');</script>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post" autocomplete="off">
        <label for="usernameemail">Username or Email:</label>
        <input type="text" name="usernameemail" id="usernameemail" value="" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="" required><br>
        <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="registration.php">Registration</a>
</body>
</html>
