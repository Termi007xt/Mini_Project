<?php
session_start();
if (!isset($_SESSION["user_email"])) {
    header("Location: login.php");
    exit();
}

require_once "database.php";

$email = $_SESSION["user_email"];

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">User Profile</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: <?php echo htmlspecialchars($user["full_name"]); ?></h5>
                <p class="card-text">Email: <?php echo htmlspecialchars($user["email"]); ?></p>
                <p class="card-text">Address: <?php echo htmlspecialchars($user["address"]); ?></p>
                <!-- Add other user fields as needed -->
            </div>
        </div>
        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
</body>
</html>
