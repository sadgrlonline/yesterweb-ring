<?php 
include_once 'logIn.php';


?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/style.css" media="all">
</head>
<div class="login-container">

    <div class="form">
        <form method="post" action="">
                <h1>Login</h1>

                <div class="form-group">
                    <div class="form-group">
                        <input type="text" class="textbox" id="username" name="username" placeholder="Username" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="textbox" id="password" name="password" placeholder="Password" />
                    </div>
                    <p><a href="../forgot-password/">Forgot password?</a><br></p>

                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                    </div>
                </div>
        </form>
    </div>
</div>
</body>

</html>