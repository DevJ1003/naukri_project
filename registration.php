<?php include "includes/header.php"; ?>


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
        <!-- User Type -->
        <div class="form-group">
                <label for="user-type">User Type</label>
                <select name="user_type" id="" class="form-control">
                        <option value="">Select Category</option>
                        <option value="0">Candidate</option>
                        <option value="1">Company</option>
                </select>
        </div>
        <br>
        <div class="form-group">
                <button name="register" type="submit" class="btn btn-primary">Register <span class="glyphicon glyphicon-log-in"></span></button>
        </div>

</form>

<?php include "includes/footer.php"; ?>