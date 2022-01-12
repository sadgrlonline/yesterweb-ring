<?php

// include
include "../config.php";

// set time zone
date_default_timezone_set("US/Eastern");
$datetime = date("Y-m-d H:i:s");
echo $datetime;

// Register user
if (isset($_POST['btnsignup'])) {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['confirmpassword']);
    $hash = md5(rand(0, 1000)); // Generate random 32 character hash and assign it to a local variable.
    // Example output: f4552671f8909587cf485ea990207f3b
    $hashedpass = password_hash($password, PASSWORD_DEFAULT);
    echo $hashedpass;
    
    $insertSQL = "INSERT INTO users(datetime,email,username,name,password,hash ) values(?,?,?,?,?,?)";
    $stmt = $con->prepare($insertSQL);
    $stmt->bind_param("ssssss", $datetime, $email, $username, $name, $hashedpass, $hash);
    $stmt->execute();
    $stmt->close();
    // email rules
    $to = $email; // Send email to our user
    $subject = 'Yesterweb Ring Login Verification'; // Give the email a subject
    $message = '

    Your account has been created, you can log in with the following credentials after you have activated your account by pressing the url below.

    ------------------------
    Username: ' . $username . '
    ------------------------

    Please click this link to activate your account:
    https://webring.yesterweb.org/verify/?email=' . $email . '&hash=' . $hash . '

    '; // Our message above including the link

    $headers = 'From:noreply@sadgrl.leprd.space' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email
    header('Location: success.php');
}
