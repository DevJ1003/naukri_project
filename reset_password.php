<?php include "includes/header.php";


// if (isset($_POST['submit'])) {

//     // var_dump($user_id);
//     // die;

//     if (isset($_GET['id'])) {

//         // $user_id = 2;


//         var_dump($_GET['id']);
//         die;



//         if ($_POST['password'] && $_POST['confirm_password']) {
//             if ($_POST['password'] == $_POST['confirm_password']) {

//                 $password = $_POST['password'];
//                 $new_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

//                 $reset_query = "UPDATE users SET password = '{$new_password}' ";
//                 $reset_query .= "WHERE user_id = '{$user_id}' ";
//                 $query = query($reset_query);
//                 confirm($query);

//                 if ($query) {

//                     set_message("Password changed sucessfully !");
//                     redirect("login.php");
//                 } else {

//                     set_message("Password not changed !");
//                     redirect("reset_password.php");
//                 }
//             }
//         }
//     }
// }


?>


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