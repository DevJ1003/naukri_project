<?php include "includes/header.php"; ?>

<!-- Page Content -->
<div class="text-center">


    <h3><i class="fa fa-user fa-4x"></i></h3>
    <h1>LOGIN</h1>


    <!-- login form starts -->
    <form role="form" class="form" method="post">
        <!--autocomplete="off" in form-->


        <?php login_user(); ?>

        <div class="form-group">
            <label for="username"><span class="glyphicon glyphicon-lock"></span>
                Username <input type="text" name="username" class="form-control" placeholder="Enter your Username">
            </label>
        </div>

        <div class="form-group">
            <label for="password"><span class="glyphicon glyphicon-lock"></span>
                Password <input type="password" name="password" class="form-control" placeholder="Enter your Password">
            </label>
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn head-btn2">Log-In <span class="glyphicon glyphicon-log-in"></span></button>
        </div>

    </form>

    <div class="form-group">
        <a href="forgot.php">Forgot Password ?</a>
    </div>

</div>

<?php include "includes/footer.php"; ?>