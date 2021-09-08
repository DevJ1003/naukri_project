<?php include "includes/header.php"; ?>

<!-- Page Content -->
<div class="text-center">

    <h3><i class="fa fa-user" style="font-size: 120px;"></i></h3>
    <h1>LOGIN</h1>
    <h4 class="text-center bg-info"><?php display_message(); ?></h4>

    <!-- login form starts -->
    <form role="form" class="form" method="post">
        <!--autocomplete="off" in form-->

        <?php login_user(); ?>

        <div class="form-group">
            <label for="username"><span class="glyphicon glyphicon-lock"></span><i class="fa fa-user"></i>
                Username <input type="text" name="username" class="form-control" placeholder="Enter your Username">
            </label>
        </div>

        <div class="form-group">
            <label for="password"><span class="glyphicon glyphicon-lock"></span><i class="fa fa-key"></i>
                Password <input type="password" name="password" class="form-control" placeholder="Enter your Password">
            </label>
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn head-btn2">Log-In <span class="glyphicon glyphicon-log-in"></span></button>
        </div>

    </form>

    <div class="text-center">
        <div class="header-btn d-none f-center d-lg-block">
            <p><a href="forgot.php" class="btn border-btn head-btn1">Forgot Password ?</a></p>
        </div>
    </div>

</div>

<?php include "includes/footer.php"; ?>