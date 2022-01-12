<?php
include "../config.php";

if (isset($_POST["username"]) && (!empty($_POST["username"]))) {
    $username = $_POST["username"];
    $sel_query = "SELECT * FROM users WHERE username='" . $username . "'";
    $result = mysqli_query($con, $sel_query);
    $numRow = mysqli_num_rows($result);
    if ($numRow < 1) {
        // tell the template page to do something
        echo "<div style='color:red; font-weight:bold; text-align:center;'>That username doesn't exist.</div>";
        include "template.php";
    } else {
        echo "<div style='color:green; font-weight:bold; text-align:center;'>Please check your email.</div>";
        $expFormat = mktime(
            date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y")
        );
        $expDate = date("Y-m-d H:i:s", $expFormat);
        $key = md5(2418 * 2 + $username);
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = $key . $addKey;
        while ($row = mysqli_fetch_array($result)) {
            $email = $row["email"];
        }
// Insert Temp Table
        mysqli_query($con,
            "INSERT INTO `password_reset_temp` (`username`, `key`, `expDate`)
VALUES ('" . $username . "', '" . $key . "', '" . $expDate . "');");

        $to = $email; // Send email to our user
        $subject = 'Forgot Password - Yesterweb Ring'; // Give the email a subject
        $message = '

    Please click on the following link to reset your password.

    https://miau.sadgrl.online/yesterweb-ring/forgot-password/reset-password/index.php?
key=' . $key . '&username=' . $username . '&action=reset

    The link will expire after 1 day for security reasons.

If you did not request this forgotten password email, no action
is needed, your password will not be reset. However, you may want to log into
your account and change your security password as someone may have guessed it.

    '; // Our message above including the link

        $headers = 'From:noreply@sadgrl.leprd.space' . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers); // Send our email
        include "template.php";
    }
} else {
    include "template.php";
}
