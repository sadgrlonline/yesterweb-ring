<?php
        $email = "webring@mail.yesterweb.org";
        $to = $email; // Send email to our user
        $subject = 'New Yesterweb Ring Application'; // Give the email a subject
        $message = '

        Someone has recently submitted an application to join the webring. To view pending applications, click <a href="https://yesterweb.org/webring/dashboard/approve/">here</a>.
        
        ';

        $headers = 'From:noreply@mail.yesterweb.org' . "\r\n"; // Set from headers
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($to, $subject, $message, $headers);
?>
