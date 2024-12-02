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
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <h2>User Profile</h2>
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5><b><?php echo htmlspecialchars($user["full_name"]); ?></b></h5>
              <p>Customer</p>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Contact Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?php echo htmlspecialchars($user["email"]); ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted"><?php echo htmlspecialchars($user["phno"]); ?></p>
                  </div>
                </div>
                <h6>Personal Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Address</h6>
                    <p class="text-muted"><?php echo htmlspecialchars($user["address"]); ?> </p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Delivery Instructions:</h6>
                    <p class="text-muted">Leave the package at the front door.</p>
                  </div>
                </div>
                <a href="update.php" class="btn btn-success mt-3">Update</a>
                <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
