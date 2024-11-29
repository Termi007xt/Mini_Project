<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: ../HOMEPAGE.php");
   exit();
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
            $password = $_POST["password"];

            // Include the database connection
            require_once "database.php";

            // Query to fetch the user by email
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                // Bind email parameter
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);

                // Get the result and fetch user details
                $result = mysqli_stmt_get_result($stmt);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if ($user) {
                    // Verify the password
                    if (password_verify($password, $user["password"])) {
                        // Start session and store user info
                        session_start();
                        $_SESSION["user"] = "yes";
                        $_SESSION["user_email"] = $email; // Store user email in session
                        header("Location: ../HOMEPAGE.php");
                        die();
                    } else {
                        echo "<div class='alert alert-danger'>Incorrect Password!</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Invalid Email, Please register!</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Database query failed!</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control" required>
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
