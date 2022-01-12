<?php
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
    ?>