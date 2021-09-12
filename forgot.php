<?php include "includes/header.php"; ?>

<!-- Page Content -->
<br>
<div class="text-center">

    <h3><i class="fa fa-lock fa-4x" style="font-size: 120px;"></i></h3>
    <h2 class="text-center">Forgot Password?</h2>
    <h4 class="text-center bg-info"><?php display_message(); ?></h4>

    <!-- PASSWORD RESET LINK FORM -->
    <form role="form" autocomplete="off" class="form" method="post" id="contact" action="">
        <?php reset_link_via_forgot(); ?>


        <div class="form-group">
            <label for="email"><i class="fa fa-user"></i>
                Username <input type="text" name="name" class="form-control" placeholder="Enter your username" required data-validation-required-message="Please enter your email">
            </label>
        </div>

        <div class="form-group">
            <label for="email"><i class="fa fa-envelope"></i>
                Email Id <input type="email" name="email" class="form-control" placeholder="Enter your email address" required data-validation-required-message="Please enter your email">
            </label>
        </div>

        <!-- User Type -->
        <div class="form-group">
            <label for="user-type">
                <select name="user_type" id="" required data-validation-required-message="Please select">
                    <option value="">Select User Type</option>
                    <option value="0">Candidate</option>
                    <option value="1">Company</option>
                    <option value="2">nAukri.com - Admin</option>
                </select>
            </label>
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn head-btn2">Submit !</button>
        </div>
    </form>

</div>

<?php include "includes/footer.php"; ?>