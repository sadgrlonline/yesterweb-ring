<?php
include "../../config.php";

if (isset($_GET["key"]) && isset($_GET["username"]) && isset($_GET["action"])
    && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
    $key = $_GET["key"];
    $username = $_GET["username"];
    $curDate = date("Y-m-d H:i:s");
    $query = mysqli_query($con,
        "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `username`='" . $username . "';"
    );
    $row = mysqli_num_rows($query);
    if ($row == "") {
        include "invalid.php";
    } else {
        $row = mysqli_fetch_assoc($query);
        $expDate = $row['expDate'];
        if ($expDate >= $curDate) {
            include "index.php";
        } else {
            include "expired.php";
        }
    }
    if ($error != "") {
        echo "<div class='error'>" . $error . "</div><br />";
    }
} // isset email key validate end

if (isset($_POST["username"]) && isset($_POST["action"]) &&
    ($_POST["action"] == "update")) {
    $error = "";
    $pass1 = mysqli_real_escape_string($con, $_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($con, $_POST["pass2"]);
    $username = $_POST["username"];
    $curDate = date("Y-m-d H:i:s");
    if ($pass1 != $pass2) {
        echo "<div style='color:red; font-weight:bold; text-align:center;'>Error: Passwords must match.</div>";
        include "template.php";
    } else {
        $hashed_pass = password_hash($pass1, PASSWORD_DEFAULT);
        mysqli_query($con, "UPDATE `users` SET `password`='" . $hashed_pass . "' WHERE `username`='" . $username . "';");

        mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `username`='" . $username . "';");

        echo "<div style='color:green; font-weight:bold; text-align:center;'>Success! Please wait while you are being redirected.</div>";
        include "template.php";
        echo "<meta http-equiv='refresh' content='2; URL=/login-demo/login/' />";
    }
}
