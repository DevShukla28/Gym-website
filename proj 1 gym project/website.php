<?php
session_start();
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Golden Fitness</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header class="header">
      <div class="left">
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQN8s4ozmX5g0RpQjiNZhiGZAqbEjOtq5_cQfPVJWvNIjEpk3-HHzBMicYvO_SG7QczmQM&usqp=CAU"
          alt=""
        />
        <!-- <div>Golden Fitness</div> -->
      </div>
      <div class="mid">
        <ul class="navbar">
          <li><a href="home.html">Home</a></li>
          <li><a href="about.html">About us</a></li>
          <li><a href="fitness calculator.html">Fitness calculator</a></li>
          <li><a href="contact.html">Blog</a></li>
        </ul>
      </div>
      <div class="right">
        <button class="btn">Call us Now</button>
        <button class="btn">Email Us</button>
      </div>
    </header>
    <div class="container" id="banner">
      <div class="left-cont">
        <h1 style="margin-bottom:30px">Join the best Gym of Delhi Now</h1>
        <form action="" method="POST">
          <div class="form-group">
            <input type="text" name="cname" placeholder="Enter your Name"  class="text-box" required/>
          </div>
          <div class="form-group">
            <input type="number" name="age" placeholder="Enter your age" class="text-box" required/>
          </div>
          <div class="form-group">
            <label for="gender_m" class="gender-label">Male:</label><input id="gender_m" type="radio" name="gender" value="Male" required/>
          </div>
          <div class="form-group">
            <label for="gender_f" class="gender-label">Female:</label><input id="gender_f" type="radio" name="gender" value="Female" required/>
          </div>
          <div class="form-group">
            <input type="text" name="address" placeholder="Enter your locality" class="text-box" required/>
          </div>
          <div class="form-group">
            <input type="text" name="occupation" placeholder="Enter your occupation" class="text-box" required/>
          </div>
          <button type="submit" name="submit" class="btn">Submit</button>
        </form>
      </div>
      <div class="right-cont">
    <?php  
    if (isset($_SESSION['AddSuccessMsg'])) {
    echo $_SESSION['AddSuccessMsg'];
    unset($_SESSION['AddSuccessMsg']);
    }?>
      </div>
    </div>
  </body>
</html>


<?php
 if (isset($_POST['submit'])) {
    $name1 = stripslashes($_REQUEST['cname']);
    $name = mysqli_real_escape_string($conn, $name1);
    $age1 = stripslashes($_REQUEST['age']);
    $age = mysqli_real_escape_string($conn, $age1);
    $gender1 = stripslashes($_REQUEST['gender']);
    $gender = mysqli_real_escape_string($conn, $gender1);
    $address1 = stripslashes($_REQUEST['address']);
    $address = mysqli_real_escape_string($conn, $address1);
    $occupation1 = stripslashes($_REQUEST['occupation']);
    $occupation = mysqli_real_escape_string($conn, $occupation1);

    $result = mysqli_query($conn,"insert into Customer_Details values(NULL,'$name','$age','$gender','$address','$occupation')");
    if($result){
        $_SESSION['AddSuccessMsg'] = '<h3>You registerd Successfully.</h3>';
        header("location: website.php");
        die();
    } else {
        $_SESSION['AddSuccessMsg'] = '<h3>Something went wrong! Please try again after sometime.</h3>';
        header("location: website.php");
        die();
    }
    

 }
?>