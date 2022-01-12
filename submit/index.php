<!DOCTYPE html>
<html>

<script>
    // to-do:
    // - handle duplicate submissions
    // - add checkbox to confirm have read the rules
    // - maybe have it redirect to a different page?
</script>

<head>
    <meta charset="UTF-8">
    <title>Submit Your Site</title>
    <link rel="stylesheet" href="../css/style.css" media="all">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <h1>Submit Your Website</h1>
            <div class="wrapper">
                    <p>Please review the <a href="https://yesterweb.org/webring/" target="_blank">rules</a> before submitting. Thank you!</p>
                    <div id="submitForm">
                        <form name="submitSite" action="submitForm.php" method="POST">
                            <!-- honeypot time -->
			                <input name="kittycat" type="text" id="kittycat" class="hide-robot">
                            <label for="siteName">Website Title</label><br>
                            <input type="text" name="siteName" id="siteName" placeholder="A very cool website" required><br><br>
                            <label for="url">URL</label><br>
                            <input type="url" name="url" id="url" placeholder="https://yourwebsite.com" required><br><br>
                            <label for="owner">Site Owner</label><br>
                            <input type="text" name="owner" id="owner" placeholder="your name or alias here" required><br><br>
                            <label for="contact">Email</label><br><sup>You will be notified of your application status by email.</sup><br>
                            <input type="email" name="contact" id="contact" placeholder="myemail@mail.com" required><br><br>
                            <label for="desc">How would you describe your website?</label><br>
                            <textarea name="desc" id="desc" required></textarea><br><br>
                            <input name="submitSite" name="submit" value="Submit my Website" id="submit_btn" type="submit">
                        </form>
                    </div>
                </body>
            </div>
        </div>
        <style>
        /* lol, suck it bots! */
        .wrapper {
            padding: 20px !important;

        }
        .hide-robot {
            display:none;
        }
        label {
            font-weight:bold;
        }
        .desc {
            width:200px;
        }
        </style>

        <script>
        $("form").on("submit", function(e) {
                    var dataString = $(this).serialize();;
        });
        </script>
        </body>
    </div>
    </html>
