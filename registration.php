<?php include "includes/db.php";

include "includes/functions.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
</head>

<body>


    <h1 class="text-center" style="text-align: center;">REGISTRATION</h1>

    <!-- login form starts -->
    <form class="text-center" style="text-align: center;" method="post">

        <?php register_user(); ?>

        <div class="form-group"><label for="username">
                USERNAME <span class="glyphicon glyphicon-lock"></span><input type="text" name="username" class="form-control" placeholder="Enter your Username"></label>
        </div>
        <br>
        <div class="form-group"><label for="email">
                EMAIL <span class="glyphicon glyphicon-lock"></span><input type="text" name="email" class="form-control" placeholder="Enter you Email_Id"></label>
        </div>
        <br>
        <div class="form-group"><label for="password">
                PASSWORD <span class="glyphicon glyphicon-lock"></span><input type="password" name="password" class="form-control" placeholder="Enter you Password"></label>
        </div>
        <br>
        <div class="form-group">
            <button name="register" type="submit" class="btn btn-primary">Register <span class="glyphicon glyphicon-log-in"></span></button>
        </div>

    </form>


</body>

</html>