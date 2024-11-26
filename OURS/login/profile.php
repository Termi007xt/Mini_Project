<?php include("logincon.php"); ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Page</title>
    <link rel="stylesheet" href="../css/profile.css" />
  </head>
  <body>
    <div class="profile-container">
      <h1>🛒 Personal Information</h1>
      <form action="#" method="POST" class="profile-form">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required />
        </div>
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" required />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth</label>
          <input type="date" id="dob" name="dob" required />
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <select id="gender" name="gender" required>
            <option value="Not selected" disabled selected>Select your gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="Insane">Mentally-Disabled</option>
            <option value="Insane">Bolta Ja</option>
          </select>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea id="address" name="address" rows="4" required></textarea>
        </div>
        <div class="form-group">
          <label for="zip">Zip Code</label>
          <input type="text" id="zip" name="zip" required />
        </div>
        <div class="btn">
        <input type="submit"  value="Register" class="btn" onclick="goback()", name="Update">
        <!-- <a href="../login/fetch_login.php"> -->
        </div>
      </form>
    </div>
  </body>
</html>

<?php
  if($_POST['Update'])
  {
    $first_name=$_POST['name'];
    $phone_num=$_POST['phone'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $add=$_POST['address'];
    $zip=$_POST['zip'];

    $query="INSERT INTO FORM VALUES(
      '$first_name',
      '$phone_num',
      '$email',
      '$dob',
      '$gender',
      '$add',
      '$zip'
    )";
    
    $data=mysqli_query($conn,$query);
    
    if($data)
    {
      header("Location:fetch_login.php");
      exit();
    }
    else{
      echo "Insert failed";
    }

  }
?>