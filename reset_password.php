<?php include "includes/header.php"; ?>


<!-- Page Content -->
<br>
<div class="text-center">

    <h3><i class="fa fa-lock fa-4x" style="font-size: 120px;"></i></h3>
    <h2 class="text-center">Reset Password !</h2>
    <h4 class="text-center bg-info"><?php display_message(); ?></h4>

    <!-- PASSWORD RESET LINK FORM -->
    <form id="register-form" class="form" autocomplete="off" method="post" enctype="multipart/form-data">
        <?php reset_password();
        ?>

        <div class="form-group">
            <label for="username"><i class="fa fa-user"></i>
                Username <input type="text" name="username" class="form-control" placeholder="Enter your username">
            </label>
        </div>

        <div class="form-group">
            <label for="passcode"><i class="fa fa-list"></i>
                Passcode <input type="password" name="passcode" class="form-control" placeholder="6 DIGIT PASSCODE">
            </label>
        </div>

        <div class="form-group">
            <label for="password"><i class="fa fa-key"></i>
                Password <input type="text" name="password" class="form-control" placeholder="Enter new password">
            </label>
        </div>

        <div class="form-group">
            <label for="confirm_password"><i class="fa fa-key"></i><i class="fa fa-key"></i>
                Confirm Password <input type="password" name="confirm_password" class="form-control" placeholder="Confirm new password">
            </label>
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn head-btn2">Reset Password !</button>
        </div>
    </form>

</div>

<?php include "includes/footer.php"; ?>