<?php
include '../login-&-register/database.php'; // Include the database connection

// Initialize a message variable
$message = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $dname = mysqli_real_escape_string($conn, $_POST['dname']);
    $dtime = mysqli_real_escape_string($conn, $_POST['dtime']);
    $wname = mysqli_real_escape_string($conn, $_POST['wname']);
    $wday = mysqli_real_escape_string($conn, $_POST['wday']);
    $wtime = mysqli_real_escape_string($conn, $_POST['wtime']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $mdate = mysqli_real_escape_string($conn, $_POST['mdate']);
    $mtime = mysqli_real_escape_string($conn, $_POST['mtime']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO smartcart (dname, dtime, wname, wday, wtime, mname, mdate, mtime)
            VALUES ('$dname', '$dtime', '$wname', '$wday', '$wtime', '$mname', '$mdate', '$mtime')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        $message = "Subscription saved successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="../css/smartcart.css" />
    

</head>
<body>
<div class="container">
    <h1>Smart Cart Subscriptions</h1>
    
    <!-- Display Success/Error Message -->
    <?php if (!empty($message)): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <form action="" method="post">
        <!-- Daily Subscription -->
        <div class="subscription-list">
            <h2>Daily Subscription</h2>
            <label for="daily-name">Item Name:</label>
            <input type="text" name="dname" id="daily-name" required />
            <label for="daily-time">Select Delivery Time:</label>
            <input type="time" name="dtime" id="daily-time" required />
        </div>

        <!-- Weekly Subscription -->
        <div class="subscription-list">
            <h2>Weekly Subscription</h2>
            <label for="weekly-name">Item Name:</label>
            <input type="text" name="wname" id="weekly-name" required />
            <label for="weekly-day">Select Delivery Day:</label>
            <select name="wday" id="weekly-day" required>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
            <label for="weekly-time">Select Delivery Time:</label>
            <input type="time" name="wtime" id="weekly-time" required />
        </div>

        <!-- Monthly Subscription -->
        <div class="subscription-list">
            <h2>Monthly Subscription</h2>
            <label for="monthly-name">Item Name:</label>
            <input type="text" name="mname" id="monthly-name" required />
            <label for="monthly-day">Select Delivery Day:</label>
            <select name="mdate" id="monthly-day" required>
                <?php for ($day = 1; $day <= 31; $day++): ?>
                    <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                <?php endfor; ?>
            </select>
            <label for="monthly-time">Select Delivery Time:</label>
            <input type="time" name="mtime" id="monthly-time" required />
        </div>

        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
