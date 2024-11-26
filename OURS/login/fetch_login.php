<?php
include("logincon.php");
error_reporting(0);

$query="SELECT * FROM form";
$data=mysqli_query($conn, $query);

$total=mysqli_num_rows($data);


// echo $result['fname']." ";
// echo $result['gender']." ";
// echo $result['dob']." ";
// echo $result['phnumber']." ";
// echo $result['email']." ";
// echo $total;

if($total!=0)
{
    $result=mysqli_fetch_assoc($data);
}
else
{
     echo"no rec";
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Details</title>
    
    <style>
    /* General Styles */
      body {
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      /* Container */
      .container {
        width: 60%;
        max-width: 800px;
        background-color: #fff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
      }

      /* Title */
      h1 {
        color: #333;
        margin-bottom: 20px;
      }

      /* Details Styling */
      .details {
        text-align: left;
        margin-top: 20px;
      }

      .detail-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
      }

      .detail-item strong {
        color: #333;
        font-size: 16px;
      }

      .detail-item span {
        color: #555;
        font-size: 16px;
        text-align: right;
      }

      /* Button Styling */
      .btn {
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        background-color: #40aa54;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
      }

      .btn:hover {
        background-color: #35a04b;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Profile Details</h1>
      <div class="details">
        <div class="detail-item">
          <strong>Name:</strong>
          <span id="display-name"><?php echo $result['fname'];?></span>
        </div>
        <div class="detail-item">
          <strong>Phone Number:</strong>
          <span id="display-phone"><?php echo $result['phnumber']?></span>
        </div>
        <div class="detail-item">
          <strong>Email:</strong>
          <span id="display-email"><?php echo $result['email']?></span>
        </div>
        <div class="detail-item">
          <strong>Date of Birth:</strong>
          <span id="display-dob"><?php echo $result['dob']?></span>
        </div>
        <div class="detail-item">
          <strong>Gender:</strong>
          <span id="display-gender"><?php echo $result['gender']?></span>
        </div>
        <div class="detail-item">
          <strong>Address:</strong>
          <span id="display-address"><?php echo $result['address']?></span>
        </div>
        <div class="detail-item">
          <strong>Zip Code:</strong>
          <span id="display-zip"><?php echo $result['zipcode']?></span>
        </div>
      </div>
      <button class="btn" onclick="goBack()">Home Page</button>
    </div>
    <script>
      // Function to navigate back to the profile page for editing -->
    function goBack() { -->
        window.location.href = "#"
    } 
     </script>
  </body>
</html>
