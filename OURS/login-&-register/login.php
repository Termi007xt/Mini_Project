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
    <link rel="stylesheet" href="../css/login.css">
</head>
    <body>
        <div class="card">
            <div class="bg">
                <form action="login.php" method="post" class="form">
                    <?php
                    if (isset($_POST["login"])) {
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                    
                        // callin the db
                        require_once "database.php";
                    
                        $sql = "SELECT * FROM users WHERE email = ?";
                        $stmt = mysqli_prepare($conn, $sql);

                        if ($stmt) {
                            // Binin the email
                            mysqli_stmt_bind_param($stmt, "s", $email);
                            mysqli_stmt_execute($stmt);
                        
                            $result = mysqli_stmt_get_result($stmt);
                            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        
                            if ($user) {
                                if (password_verify($password, $user["password"])) {
                                    session_start();
                                    $_SESSION["user"] = "yes";
                                    $_SESSION["user_email"] = $email; 
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
                
                    <h6>Welcome to Smart Groceries!</h6>
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
                <div>
                    <p class="optext">Not registered yet? <a href="registration.php">Create account</a></p>
                </div>
                <div class="copyright">
                    <p>&copy; Smart Groceries</p>
                </div>
            </div>
            <div class="blob"></div>
        </div>
    </body>
</html>

