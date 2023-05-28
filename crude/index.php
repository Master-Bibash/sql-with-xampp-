<?php

// Require the configuration file.
require 'config.php';


// Check if the user is logged in. If so, get the user's ID and fetch their information from the database.
if (!empty($_SESSION["id"])) {
    // Get the user's ID from the session.
    $id = $_SESSION["id"];

    // Query the database for the user's information.
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id = $id");

    // Fetch the user's information from the database.
    $row = mysqli_fetch_assoc($result);
}

// Display the user's name on the page.
// echo "<h1>Welcome, " . $row["Fname"] . "</h1>";

// // Provide a link to the logout page.
// echo "<a href='logout.php'>Logout</a>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <h1>Welcome <?php   echo $row["Fname"];?></h1>
     <a href="logout.php">LoGout</a>

     
</body>
</html>