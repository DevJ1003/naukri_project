<?php include "includes/db.php";

include "includes/functions.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
</head>

<body>

    <div class="text-center" style="text-align: center;">
        <h1>Reset Password</h1>
        <small>You can reset your password here !</small>
    </div>
    <br>

    <!-- login form starts -->
    <form class="text-center" style="text-align: center;" method="post">


        <div class="form-group"><label for="password">
                <span class="glyphicon glyphicon-eye-open"></span><input type="text" name="password" class="form-control" placeholder="Enter new password"></label>
        </div>
        <br>
        <div class="form-group"><label for="confirm_password">
                <span class="glyphicon glyphicon-eye-close"></span><input type="password" name="password" class="form-control" placeholder="Confirm new password"></label>
        </div>
        <br>
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Reset Password <span class="glyphicon glyphicon-ok"></span></button>
        </div>


    </form>


</body>

</html>