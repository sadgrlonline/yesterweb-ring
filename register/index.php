
<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" href="../css/style.css" media="all">
</head>

<body>
    <div class="login-container">

        <div class="form">
            <form method="post" action="register.php" name="btnsignup">
                    <h1>Register for an Account</h1>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" id="email" required="required"
                                maxlength="80">
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" required="required"
                                maxlength="80">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" id="username" required="required"
                                maxlength="80">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password"
                                required="required" maxlength="80">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Confirm Password:</label>
                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"
                                onkeyup='' required="required" maxlength="80">
                        </div>

                        <input id="submit" type="submit" name="btnsignup" value="Register"></input>
            </form>
        </div>
    </div>
    </div>
    </div>
<style>
    label {
        display:block;
        margin-top:20px;
    }
    #submit {
        margin-top:10px;
    }
    </style>
    <script>
        // I need to add the following:
        // - check password fields to ensure they match
        // - check username to see if exists
        // Low priority bc registrations are rare
    </script>

</body>

</html>
