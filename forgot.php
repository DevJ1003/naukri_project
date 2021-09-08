<?php include "includes/header.php";


/* SENDING RESET PASSWORD PAGE LINK TO USER */
if (isset($_POST['submit'])) {

    $to = $_POST['email'];
    $subject = wordwrap($_POST['subject'], 70);
    // $body = $_POST['message'];
    $from = "devtestphpmail.com";
    $header = "From" . $from;

    $message = mail($to, $from, "$subject", $header);

    if (!$message) {

        set_message("Sorry , we Could not send your message !");
        redirect("contact.php");
    } else {

        set_message("Message sent sucessfully !");
        redirect("contact.php");
    }
}

?>

<!-- Page Content -->
<br>
<div class="text-center">

    <h3><i class="fa fa-lock fa-4x" style="font-size: 120px;"></i></h3>
    <h2 class="text-center">Forgot Password?</h2>
    <h4 class="text-center bg-info"><?php display_message(); ?></h4>

    <!-- PASSWORD RESET LINK FORM -->
    <form role="form" autocomplete="off" class="form" method="post">
        <div class="form-group">
            <label for="email"><i class="fa fa-envelope"></i>
                Email Id <input type="text" name="email" class="form-control" placeholder="Enter your email address">
            </label>
        </div>

        <div class="form-group">
            <button name="recover_password" type="submit" class="btn head-btn2" value="Reset Password">Send Link !</button>
        </div>
    </form>

</div>

<?php include "includes/footer.php"; ?>