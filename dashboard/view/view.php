<?php
session_start();
include "../../auth-session.php";
if (!isset($_SESSION["username"])) {
    header("/yesterweb-ring/login/");
    exit();
} else {
// includes
include "../../config.php";

if (isset($_GET['flagged'])) {
    $id = $_GET['flagged'];

       $stmt = $con->prepare("UPDATE webring SET flagged = 0, flaggedReason = '' WHERE id = ?");
    if (false === $stmt) {
        die('prepare() failed:' . htmlspecialchars($stmt->error));
        exit();
    }
    $stmt->bind_param("s", $id);
    if (false === $stmt) {
        die('bind_params() failed:' . htmlspecialchars($stmt->error));
        exit();
    }
    $stmt->execute();
    if (false === $stmt) {
        die('execute() failed:' . htmlspecialchars($stmt->error));
        exit();
    }
    $stmt->close();
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

       $stmt = $con->prepare("UPDATE webring SET flagged = 1, flaggedReason = ? WHERE id = ?");
    if (false === $stmt) {
        die('prepare() failed:' . htmlspecialchars($stmt->error));
        exit();
    }
    $stmt->bind_param("ss", $reason, $id);
    if (false === $stmt) {
        die('bind_params() failed:' . htmlspecialchars($stmt->error));
        exit();
    }
    $stmt->execute();
    if (false === $stmt) {
        die('execute() failed:' . htmlspecialchars($stmt->error));
        exit();
    }
    $stmt->close();
}
//if ($_SESSION["username"] = "sadness") {    
if (isset($_POST['delid'])) {
    $id = $_POST['delid'];
    $rsn = $_POST['reason'];

    $contact = '';
    $stmt = $con->prepare("SELECT contact FROM webring WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
        $contact = trim($row['contact']);
        }

        $email = $contact;
        $to = $email; // Send email to our user
        $subject = 'Yesterweb Ring - Your website has been removed from the ring.'; // Give the email a subject
        $message = '

        <p>This is an automated notification that you have been removed from the Yesterweb Webring.</p>
        <p>Here is a brief explanation of why your site was removed: </p>' . $rsn . ' 
        <p>Please review the rules on <a href="https://yesterweb.org/webring/" target="_blank">our website</a>
        <p>Once your website meets the requirements, feel free to resubmit!</p>
        
        ';

        $headers = 'From:noreply@sadgrl.leprd.space' . "\r\n"; // Set from headers
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($to, $subject, $message, $headers);
        $stmt->close();



    // deletes from database permanently
    $stmt = $con->prepare("DELETE FROM webring WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->close();


    $sql = "SELECT name, url, owner FROM webring WHERE pending = 0";
    mysqli_set_charset($con, 'utf8');
    if ($result = mysqli_query($con, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            // moving html
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        $f = fopen('../../webring.json', 'w');
        fwrite($f, json_encode($rows));
        }
        echo json_encode($rows);
    }
    
}

$sql = "SELECT * FROM webring WHERE pending = 0";

if ($result = mysqli_query($con, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        // moving html
        while ($row = mysqli_fetch_array($result)) {
            include "buildTable.php";
        }
    }
    echo "</table>";
}
}
//}