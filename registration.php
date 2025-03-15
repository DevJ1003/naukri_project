<?php include "includes/header.php"; ?>

<h3 class="text-center"><i class="fa fa-user-plus" style="font-size: 120px;"></i></h3>
<h1 class="text-center">REGISTRATION</h1>

<!-- login form starts -->
<form class="text-center" style="text-align: center;" method="post" enctype="multipart/form-data">

    <?php register_user(); ?>

    <div class="form-group"><label for="username">
            <span class="glyphicon glyphicon-lock"></span><input type="text" name="username" class="form-control" placeholder="Enter your Username" required data-validation-required-message="Please enter Username"></label>
    </div>
    <div class="form-group"><label for="email">
            <span class="glyphicon glyphicon-lock"></span><input type="text" name="email" class="form-control" placeholder="Enter your Email_Id" required data-validation-required-message="Please enter Email"></label>
    </div>
    <div class="form-group"><label for="passcode">
            <span class="glyphicon glyphicon-lock"></span><input type="text" name="passcode" class="form-control" placeholder="6 digit passcode" required data-validation-required-message="Please enter Passcode"></label>
    </div>
    <div class="form-group"><label for="password">
            <span class="glyphicon glyphicon-lock"></span><input type="password" name="password" class="form-control" placeholder="Enter your Password" required data-validation-required-message="Please enter Password"></label>
    </div>

    <!-- image upload here -->
    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file" name="file">
    </div>

    <!-- User Type -->
    <div class="form-group">
        <label for="user-type">
            <select name="user_type" id="" required data-validation-required-message="Please select">
                <option value="">Select User Type</option>
                <option value="0">Candidate</option>
                <option value="1">Company</option>
                <option value="2">naukri.com - Admin</option>
            </select>
        </label>
    </div>
    <div class="form-group">
        <button name="register" type="submit" class="btn head-btn2">Register <span class="glyphicon glyphicon-log-in"></span></button>
    </div>

    <p>* User must remember it's CODE , passcode entered once cannot be changed !</p>

</form>

<?php include "includes/footer.php"; ?>