<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="../../css/style.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="login-container">
                <h1>Reset Password</h1>
<div>
<form method="post" action="" name="update">
    <input type="hidden" name="action" value="update" />
    <label><strong>Enter New Password:</strong></label><br />
    <input type="password" name="pass1" maxlength="15" required /><br>
    <label><strong>Re-Enter New Password:</strong></label><br />
    <input type="password" name="pass2" maxlength="15" required />
    <input type="hidden" name="username" value="<?php echo $username; ?>" /><br><br>
    <input type="submit" value="Reset" />
    </div>
</form>
</div>
</body>
</html>