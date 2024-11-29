<?php
session_start();

// If the user is already logged in, redirect to the homepage
if (isset($_SESSION["user"])) {
    header("Location: ../HOMEPAGE.php");
    die();
}

// Handle the login process only if $_SESSION["user"] is not set
if ($user) {
    $_SESSION["user"] = "yes";
    $_SESSION["user_id"] = $user["id"]; // Ensure 'id' is the unique identifier in your database
    header("Location: ../HOMEPAGE.php");
    die();
} else {
    echo "<div class='alert alert-danger'>Invalid Email, Please register!</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $_SESSION["user_email"] = $user["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: ../HOMEPAGE.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Incorrect Password!</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Invalid Email, Please register!</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p class="optext">Not registered yet? <a href="registration.php">Register Here</a></p></div>
     <div class="copyright"> <p>©️ Smart Groceries</p> </div>
    </div>
</body>
</html>

<!-- 
require_once "database.php";

$email = $_SESSION["user_email"];
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (!$user) {
    echo "User not found.";
    exit();
}
?>
