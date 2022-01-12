
<?php
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
    $reason = $_POST['reason'];

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

// this denies an entry and deletes it from the database
if (isset($_POST['denyid'])) {
    $id = $_POST['denyid'];
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
        $subject = 'Yesterweb Ring - Your Website submission has been denied.'; // Give the email a subject
        $message = '

        <p>We are very sorry to inform you that your webring application has been denied.</p>
        <p>Here is a brief explanation of why your site was denied: </p>' . $rsn . ' 
        <p>Please review the rules on <a href="https://yesterweb.org/webring/" target="_blank">our website</a>
        <p>Once your website meets the requirements, feel free to resubmit!</p>
        
        ';

        $headers = 'From:noreply@sadgrl.leprd.space' . "\r\n"; // Set from headers
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($to, $subject, $message, $headers);
        $stmt->close();

    // this actually deletes the user
    $stmt = $con->prepare("DELETE FROM webring WHERE id = ? AND pending = 1");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->close();
}



// this approves an entry and sets updates the entry
if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    //echo $id;
    $stmt = $con->prepare("UPDATE webring SET pending = 0 WHERE id = ?");
    if (false === $stmt) {
        die('prepare() failed:' . htmlspecialchars($stmt->error));
        exit();
    }
    $stmt->bind_param("s", $id);
    if (false === $stmt) {
        die('bind_params() failed:' . htmlspecialchars($stmt->error));
        exit();
    }
    // REMEMBER TO UNCOMMENT THIS LATER
    $stmt->execute();
    if (false === $stmt) {
        die('execute() failed:' . htmlspecialchars($stmt->error));
        exit();
    }
    $stmt->close();
    
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
        $subject = 'Yesterweb Ring - Your Website has been Approved!'; // Give the email a subject
        $message = '

        <p>Hello! Your website has been accepted onto the Yesterweb Ring. Welcome!!</p>
        <p>Please be sure to add the <a href="https://yesterweb.org/webring/">webring badge</a> to your website.</p>
        <p>If you have any questions, you can reach out to the admin at <a href="mailto:sadness@sadgrl.online">sadness@sadgrl.online</a></p>
        
        ';

        $headers = 'From:noreply@sadgrl.leprd.space' . "\r\n"; // Set from headers
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($to, $subject, $message, $headers);
        $stmt->close();
}
if (isset($_GET['approve'])) {    
$rows = array();

$sql = "SELECT name, url, owner FROM webring WHERE pending = 0";
mysqli_set_charset($con, 'utf8');
if ($result = mysqli_query($con, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        // moving html
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    $f = fopen('../../webring.json', 'w');
    // REMEMBER TO UNCOMMENT THIS LATER
    fwrite($f, json_encode($rows));
    }
    //echo json_encode($rows);
}
} else {


//$sql = "SELECT * FROM websites ";
$sql = "SELECT * FROM webring WHERE pending = 1";

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
