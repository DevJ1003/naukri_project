<?php include "includes/header.php"; ?>

<h1 class="text-center" style="text-align: center;">REGISTRATION</h1>

<!-- login form starts -->
<form class="text-center" style="text-align: center;" method="post">

    <?php register_user(); ?>

    <div class="form-group"><label for="username">
            <span class="glyphicon glyphicon-lock"></span><input type="text" name="username" class="form-control" placeholder="Enter your Username" required data-validation-required-message="Please enter Username"></label>
    </div>
    <div class="form-group"><label for="email">
            <span class="glyphicon glyphicon-lock"></span><input type="text" name="email" class="form-control" placeholder="Enter your Email_Id" required data-validation-required-message="Please enter Email"></label>
    </div>
    <div class="form-group"><label for="password">
            <span class="glyphicon glyphicon-lock"></span><input type="password" name="password" class="form-control" placeholder="Enter your Password" required data-validation-required-message="Please enter Password"></label>
    </div>
    <!-- User Type -->
    <div class="form-group">
        <label for="user-type">
            <select name="user_type" id="" required data-validation-required-message="Please select">
                <option value="">Select User Type</option>
                <option value="0">Candidate</option>
                <option value="1">Company</option>
            </select>
        </label>
    </div>
    <div class="form-group">
        <button name="register" type="submit" class="btn head-btn2">Register <span class="glyphicon glyphicon-log-in"></span></button>
    </div>

</form>

<?php include "includes/footer.php"; ?>