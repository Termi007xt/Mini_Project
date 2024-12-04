<?php
session_start();
if (!isset($_SESSION["user_email"])) {
    header("Location: login.php");
    exit();
}

require_once "database.php";

$email = $_SESSION["user_email"];

// Fetch user details
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (!$user) {
        echo "Error: User not found.";
        exit();
    }
} else {
    echo "Database query failed.";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = $_POST["full_name"];
    $phno = $_POST["phno"];
    $address = $_POST["address"];

    $update_sql = "UPDATE users SET full_name = ?, phno = ?, address = ? WHERE email = ?";
    $update_stmt = mysqli_prepare($conn, $update_sql);
    if ($update_stmt) {
        mysqli_stmt_bind_param($update_stmt, "ssss", $full_name, $phno, $address, $email);
        if (mysqli_stmt_execute($update_stmt)) {
            header("Location: profile.php");
            exit();
        } else {
            echo "Error updating profile.";
        }
    } else {
        echo "Database update failed.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

        body {
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            background-color: #e5e5f7;
            opacity: 0.8;
            background-image:  repeating-radial-gradient( circle at 0 0, transparent 0, #e5e5f7 18px ), repeating-linear-gradient( #7ed95755, #7ed957 );
        }

        .container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 90%;
            max-width: 600px;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
            color: #333;
        }

        .form-label {
            font-weight: 500;
            color: #555;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #7ed957;
            box-shadow: 0 0 5px rgba(126, 217, 87, 0.5);
        }

        textarea.form-control {
            resize: none;
        }

        .btn-primary {
            background-color: #7ed957;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #66c547;
        }

        .btn-secondary {
            background-color: #ddd;
            color: #333;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #ccc;
        }

        .form-btn {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Update Profile</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" 
                   value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="phno" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phno" name="phno" 
                   value="<?php echo htmlspecialchars($user['phno']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" required>
                <?php echo htmlspecialchars($user['address']); ?>
            </textarea>
        </div>
        <div class="form-btn">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="profile.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
