<?php include "includes/header.php"; ?>


<h1 class="text-center" style="text-align: center;">LOGIN</h1>

<!-- login form starts -->
<form class="text-center" style="text-align: center;" method="post">
    <?php login_user(); ?>

    <div class="form-group"><label for="username">
            USERNAME <span class="glyphicon glyphicon-lock"></span><input type="text" name="username" class="form-control"></label>
    </div>
    <br>
    <div class="form-group"><label for="password">
            PASSWORD <span class="glyphicon glyphicon-lock"></span><input type="password" name="password" class="form-control"></label>
    </div>
    <br>
    <div class="form-group">
        <button name="submit" type="submit" class="btn btn-primary">Log-In <span class="glyphicon glyphicon-log-in"></span></button>
    </div>

    <br>

    <a href="forgot.php">Forgot Password ?</a>

</form>


<?php include "includes/footer.php"; ?>