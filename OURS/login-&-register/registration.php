<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: ../HOMEPAGE.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/register.css">

</head>
<body>
    <img src="../images/logo.png">
    <div class="card">
        <div class="bg">
            <div class="container">
                <form action="registration.php" method="post">
                    <?php
                    if (isset($_POST["submit"])) {
                       $fullName = $_POST["fullname"];
                       $email = $_POST["email"];
                       $phno= $_POST["phno"];
                       $password = $_POST["password"];
                       $passwordRepeat = $_POST["repeat_password"];
                    
                       $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                       $address=$_POST["address"];
                    
                       $errors = array();
                    
                       if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat) OR empty($address)) {
                        array_push($errors,"All fields are required");
                       }
                       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        array_push($errors, "Email is not valid");
                       }
                       if (strlen($password)<8) {
                        array_push($errors,"Password must be at least 8 charactes long");
                       }
                       if ($password!==$passwordRepeat) {
                        array_push($errors,"Password does not match");
                       }
                       require_once "database.php";
                       $sql = "SELECT * FROM users WHERE email = '$email'";
                       $result = mysqli_query($conn, $sql);
                       $rowCount = mysqli_num_rows($result);
                       if ($rowCount>0) {
                        array_push($errors,"Email already exists!");
                       }
                       if (count($errors)>0) {
                        foreach ($errors as  $error) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                       }else{
                        $sql = "INSERT INTO users (full_name, email, phno, password, address) VALUES ( ?, ?, ?, ?, ? )";
                        $stmt = mysqli_stmt_init($conn);
                        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                        if ($prepareStmt) {
                            mysqli_stmt_bind_param($stmt,"ssss",$fullName, $email, $passwordHash, $address);
                            mysqli_stmt_execute($stmt);
                            echo "<div class='alert alert-success'>You are registered successfully.</div>";
                        }else{
                            die("Something went wrong");
                        }
                       }
                   
                   
                    }
                    ?>
                    <h5>Join our family today!</h5>
                    <div class="form-group">
                        <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
                    </div>
                    <div class="form-group">
                        <input type="emamil" class="form-control" name="email" placeholder="Email:">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password:">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
                    </div>
                    <div class="form-group">
                        <input type="address" class="form-address" name="address" placeholder="Address:">
                    </div>
                    <div class="form-btn">
                        <input type="submit" class="btn btn-primary" value="Register" name="submit">
                    </div>
                </form>
                <div>
                    <p class="optext">Already Registered? <a href="login.php">Login Here</a></p>
                </div>
                <div class="copyright"> 
                    <p>&copy; Smart Groceries</p> 
                </div>
            </div>
        </div>
        <div class="blob"></div>
    </div>
</body>
</html>
