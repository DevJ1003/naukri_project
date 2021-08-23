<?php include "includes/db.php";

include "includes/functions.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
</head>

<body>

    <div class="text-center" style="text-align: center;">
        <h1>Forgot Password ?</h1>
        <small>You can reset your password here !</small>
    </div>
    <br>

    <!-- login form starts -->
    <form class="text-center" style="text-align: center;" method="post">


        <div class="form-group"><label for="email">
                EMAIL <span class="glyphicon glyphicon-envelope"></span><input type="text" name="email" class="form-control" placeholder="Type your email address"></label>
        </div>
        <br>
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Reset Password <span class="glyphicon glyphicon-send"></span></button>
        </div>


    </form>


</body>

</html>