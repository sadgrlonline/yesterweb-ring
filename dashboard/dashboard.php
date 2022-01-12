<?php
session_start();
include "../auth-session.php";
if (!isset($_SESSION["username"])) {
    header("/yesterweb-ring/login/");
    exit();
} else {
// includes
include "../config.php";


$sql = "SELECT COUNT(*) FROM webring WHERE pending = 0";
$qry = mysqli_query($con, $sql);
$siteCount = mysqli_fetch_assoc($qry)['COUNT(*)'];

// template MUST be included AFTER the variable is defined
$qry->close();

$sql = "SELECT COUNT(*) FROM webring WHERE pending = 1";
$qry = mysqli_query($con, $sql);
$pendingCount = mysqli_fetch_assoc($qry)['COUNT(*)'];

// template MUST be included AFTER the variable is defined
$qry->close();
}