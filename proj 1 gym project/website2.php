<?php
session_start();
require 'db.php';
?>
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