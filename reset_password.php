<?php include "includes/header.php"; ?>

<!-- Page Content -->
<br>
<div class="text-center">

    <h3><i class="fa fa-lock fa-4x" style="font-size: 120px;"></i></h3>
    <h2 class="text-center">Reset Password !</h2>

    <!-- PASSWORD RESET LINK FORM -->
    <form role="form" autocomplete="off" class="form" method="post">
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
            <button name="reset_password" type="submit" class="btn head-btn2" value="Reset Password">Reset Password !</button>
        </div>
    </form>

</div>

<?php include "includes/footer.php"; ?>