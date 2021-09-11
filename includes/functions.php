<?php

/*********************************************** HELPER FUNCTIONS *************************************/


function set_message($msg)
{

    if (!empty($msg)) {

        $_SESSION['message'] = $msg;
    } else {

        $msg = "";
    }
}



function display_message()
{

    if (isset($_SESSION['message'])) {

        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}



function redirect($location)
{

    header("Location: $location");
}


function query($sql)
{

    global $connection;

    return mysqli_query($connection, $sql);
}


function confirm($result)
{

    global $connection;

    if (!$result) {

        die("QUERY FAILED" . mysqli_error($connection));
    }
}


function escape_string($string)
{

    global $connection;

    return mysqli_real_escape_string($connection, $string);
}


function fetch_array($result)
{

    return mysqli_fetch_array($result);
}




function IsLoggedIn()
{
    if (isset($_SESSION['username'])) {

        return true;
    } else {

        return false;
    }
}





function get_user_name()
{
    if (isset($_SESSION['username'])) {

        return $_SESSION['username'];
    }
}




function get_user_id()
{
    if (isset($_SESSION['user_id'])) {

        return $_SESSION['user_id'];
    }
}




/***************************************** END HELPER FUNCTIONS ******************************************/










/***************************************** REGISTER-LOGIN FUCNTION ****************************************/




function register_user()
{

    if (isset($_POST['register'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $code = $_POST['passcode'];
        $code = $_POST['passcode'];
        $hashed_passcode = password_hash($code, PASSWORD_BCRYPT, array('cost' => 6));


        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

        $user_type = $_POST['user_type'];

        $image = $_FILES['file']['name'];
        $temp_image = $_FILES['file']['tmp_name'];

        move_uploaded_file($temp_image, "images/$image");


        $generated_query = "INSERT INTO users(username, password , type , email , image , code) VALUES('{$username}'  , '{$hashed_password}' , '{$user_type}' , '{$email}', '{$image}' , '{$hashed_passcode}') ";
        $query = query($generated_query);
        confirm($query);


        if ($user_type == 0) {

            $candidate_query = "INSERT INTO candidate ( name ) VALUES ( '{$username}' ) ";
            $query = query($candidate_query);
            confirm($candidate_query);
        }

        redirect("login.php");
        set_message("User Registered !!");
    }
}




function login_user()
{

    global $connection;

    if (isset($_POST['submit'])) {

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);


        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);


        $login_query = "SELECT * FROM users WHERE username = '{$username}'";
        $query = query($login_query);
        confirm($query);

        while ($row = mysqli_fetch_array($query)) {

            $db_userid   = $row['user_id'];
            $db_username = $row['username'];
            $db_password = $row['password'];
            $db_usertype = $row['type'];
            $db_status   = $row['status'];


            if ($db_usertype == 0 && $db_status == 0 && password_verify($password, $db_password)) {

                if (mysqli_num_rows($query) == 0) {

                    set_message("Your Username or Password is wrong !");
                    redirect("login.php");
                } else {
                    $_SESSION['user_id']  = $db_userid;
                    $_SESSION['username'] = $db_username;
                    $_SESSION['type']     = $db_usertype;
                    redirect("admin/candidate_index.php");
                }
            } elseif ($db_usertype == 1 && $db_status == 0 && password_verify($password, $db_password)) {

                if (mysqli_num_rows($query) == 0) {

                    set_message("Your Username or Password is wrong !");
                    redirect("login.php");
                } else {

                    $_SESSION['user_id']  = $db_userid;
                    $_SESSION['username'] = $db_username;
                    $_SESSION['type']     = $db_usertype;
                    redirect("admin/company_index.php");
                }
            } elseif ($db_usertype == 2 && $db_status == 0 && password_verify($password, $db_password)) {

                if (mysqli_num_rows($query) == 0) {

                    set_message("Your Username or Password is wrong !");
                    redirect("login.php");
                } else {

                    $_SESSION['user_id']  = $db_userid;
                    $_SESSION['username'] = $db_username;
                    $_SESSION['type']     = $db_usertype;
                    redirect("admin/admin_index.php");
                }
            }
        }
    }
}







/*************************************** END OF REGISTER-LOGIN FUCNTION *************************************/














/****************************** ADMIN REGISTRATION , LOGIN , LOGOUT BUTTON ********************************/







function admin_link_user_type_home()
{

    if (IsLoggedIn()) {

        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];

        $admin_usertype_query = query("SELECT type FROM users WHERE username = '{$username}' ");
        confirm($admin_usertype_query);

        while ($row = mysqli_fetch_array($admin_usertype_query)) {

            $usertype = $row['type'];
        }


        if ($usertype == 0) {

            $candidate_admin = <<<DELIMETER
                <li><a href="job_listing.php"><i class="fas fa-briefcase"></i> Find a Job</a></li>
                <li><a href="admin/candidate_index.php"><i class="fas fa-user"></i> Admin</a></li>
                <li><a href="candidate_applications.php"><i class="fas fa-bell"></i> Applications</a></li>
            DELIMETER;
            echo $candidate_admin;
        } elseif ($usertype == 1) {

            $company_admin = <<<DELIMETER
                <li><a href="admin/company_index.php"><i class="fas fa-user"></i> Admin</a></li>
                <li><a href="company_applications.php"><i class="fas fa-bell"></i> Applications</a></li>
            DELIMETER;
            echo $company_admin;
        } else {

            $admin = <<<DELIMETER
                <li><a href="admin/admin_index.php"><i class="fas fa-user"></i> Admin</a></li>
                <li><a href="admin_jobs.php"><i class="fas fa-briefcase"></i> Jobs</a></li>
                <li><a href="admin_companies.php"><i class="fas fa-building"></i> Companies</a></li>
                <li><a href="admin_candidates.php"><i class="fas fa-address-card"></i> Candidates</a></li>
            DELIMETER;
            echo $admin;
        }
    } else {

        $find_job_button = <<<DELIMETER
            <li><a href="job_listing.php"><i class="fas fa-briefcase"></i> Find a Job</a></li>

        DELIMETER;
        echo $find_job_button;
    }
}







function admin_link_user_type_admin()
{

    if (IsLoggedIn()) {


        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];

        $admin_usertype_query = query("SELECT type FROM users WHERE username = '{$username}' ");
        confirm($admin_usertype_query);

        while ($row = mysqli_fetch_array($admin_usertype_query)) {

            $usertype = $row['type'];
        }


        if ($usertype == 0) {

            $candidate_admin = <<<DELIMETER
                <li><a href="../job_listing.php"><i class="fas fa-briefcase"></i> Find a Job</a></li>
                <li><a href="candidate_index.php"><i class="fas fa-user"></i> Admin</a></li>
                <li><a href="../candidate_applications.php"><i class="fas fa-bell"></i> Applications</a></li>
            DELIMETER;

            echo $candidate_admin;
        } elseif ($usertype == 1) {

            $company_admin = <<<DELIMETER
                <li><a href="company_index.php"><i class="fas fa-user"></i> Admin</a></li>
                <li><a href="../company_applications.php"><i class="fas fa-bell"></i> Applications</a></li>
            DELIMETER;
            echo $company_admin;
        } else {

            $admin = <<<DELIMETER

                <li><a href="admin_index.php"><i class="fas fa-user"></i> Admin</a></li>
                <li><a href="../admin_jobs.php"><i class="fas fa-briefcase"></i> Jobs</a></li>
                <li><a href="../admin_companies.php"><i class="fas fa-building"></i> Companies</a></li>
                <li><a href="../admin_candidates.php"><i class="fas fa-address-card"></i> Candidates</a></li>

            DELIMETER;
            echo $admin;
        }
    } else {

        $find_job_button = <<<DELIMETER

        <li><a href="job_listing.php"><i class="fas fa-briefcase"></i> Find a Job</a></li>

DELIMETER;

        echo $find_job_button;
    }
}










function profile_link_homepage()
{

    if (IsLoggedIn()) {


        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];

        $admin_usertype_query = query("SELECT type FROM users WHERE username = '{$username}' ");
        confirm($admin_usertype_query);

        while ($row = mysqli_fetch_array($admin_usertype_query)) {

            $usertype = $row['type'];
        }


        if ($usertype == 0) {

            $candidate_profile = <<<DELIMETER
            <li><a href="candidate_profile.php?id={$user_id}"><i class="far fa-address-book"></i> Profile</a></li>
        DELIMETER;

            echo $candidate_profile;
        } elseif ($usertype == 1) {

            $company_profile = <<<DELIMETER
            <li><a href="company_profile.php?id={$user_id}"><i class="far fa-address-book"></i> Profile</a></li>
        DELIMETER;

            echo $company_profile;
        }
    }
}












function profile_link_admin()
{

    if (IsLoggedIn()) {


        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];

        $admin_usertype_query = query("SELECT type FROM users WHERE username = '{$username}' ");
        confirm($admin_usertype_query);

        while ($row = mysqli_fetch_array($admin_usertype_query)) {

            $usertype = $row['type'];
        }


        if ($usertype == 0) {

            $candidate_profile = <<<DELIMETER
            <li><a href="../candidate_profile.php?id={$user_id}"><i class="far fa-address-book"></i> Profile</a></li>
        DELIMETER;

            echo $candidate_profile;
        } elseif ($usertype == 1) {

            $company_profile = <<<DELIMETER
            <li><a href="../company_profile.php?id={$user_id}"><i class="far fa-address-book"></i> Profile</a></li>
        DELIMETER;

            echo $company_profile;
        }
    }
}










function show_admin_link()
{


    if (IsLoggedIn()) {

        $admin = <<<DELIMETER

        <li><a href="">Admin</a></li>

        DELIMETER;

        echo $admin;
    }
}











function login_find_add_job_link()
{


    if (IsLoggedIn()) {

        $username = $_SESSION['username'];

        $query = query("SELECT type FROM users WHERE username = '{$username}' ");
        confirm($query);

        while ($row = mysqli_fetch_array($query)) {

            $usertype = $row['type'];
        }


        if ($usertype == 0) {

            $candidate_homepage = <<<DELIMETER
                <a href="job_listing.php" class="btn head-btn1">Apply for new jobs !</a>
            DELIMETER;

            echo $candidate_homepage;
        } elseif ($usertype == 1) {

            $company_homepage = <<<DELIMETER
                <a href="admin/add_jobs.php" class="btn head-btn1">Post a new job !</a>
            DELIMETER;

            echo $company_homepage;
        } else {

            $admin_homepage = <<<DELIMETER
                <a href="admin/admin_index.php" class="btn head-btn1">View all jobs !</a>
            DELIMETER;

            echo $admin_homepage;
        }
    } else {

        $login_button = <<<DELIMETER

    <a href="login.php" class="btn head-btn1">Login to Apply !</a>

DELIMETER;

        echo $login_button;
    }
}











function browse_sector_link()
{


    if (IsLoggedIn()) {

        $username = $_SESSION['username'];

        $query = query("SELECT type FROM users WHERE username = '{$username}' ");
        confirm($query);

        while ($row = mysqli_fetch_array($query)) {

            $usertype = $row['type'];
        }


        if ($usertype == 0) {

            $browse_sector_link_candidate = <<<DELIMETER
                <a href="job_listing.php" class="border-btn2">Browse All Sectors !</a>
                DELIMETER;

            echo $browse_sector_link_candidate;
        } elseif ($usertype == 1) {

            $browse_sector_link_company = <<<DELIMETER
                <a href="admin/company_index.php" class="border-btn2">Browse All Jobs !</a>
                DELIMETER;

            echo $browse_sector_link_company;
        } else {

            $browse_sector_link_admin = <<<DELIMETER
                <a href="admin/admin_index.php" class="border-btn2">Browse All Data !</a>
                DELIMETER;

            echo $browse_sector_link_admin;
        }
    } else {

        $browse_sector = <<<DELIMETER
    
            <a href="job_listing.php" class="border-btn2">Browse All Sectors !</a>
    
    DELIMETER;

        echo $browse_sector;
    }
}












function show_login_logout_link_homepage()
{


    if (IsLoggedIn()) {
    } else {

        $login = <<<DELIMETER

    <a href="registration.php" class="btn head-btn1">Register</a>
    <a href="login.php" class="btn head-btn1">Login</a>


    DELIMETER;

        echo $login;
    }
}









function show_login_logout_link()
{


    if (IsLoggedIn()) {

        $logout = <<<DELIMETER

    <a href="../includes/logout.php" class="btn head-btn1"><i class="fas fa-power-off"></i> Log Out</a>


    DELIMETER;

        echo $logout;
    } else {

        $login = <<<DELIMETER

    <a href="registration.php" class="btn head-btn1">Register</a>
    <a href="login.php" class="btn head-btn1">Login</a>


    DELIMETER;

        echo $login;
    }
}








/*********************************** END ADMIN REGISTRATION , LOGIN , LOGOUT BUTTON **********************************/









/********************************************* MESSAGE FUCNTION ******************************************/



function send_message()
{



    if (isset($_POST['submit'])) {



        $to = "devtestphpmail.com";
        $subject = wordwrap($_POST['subject'], 70);
        $body = $_POST['message'];
        $from = $_POST['email'];
        $header = "From" . $from;


        $message = mail($to, $from, "$subject", $body, $header);

        if (!$message) {

            set_message("Sorry , we Could not send your message !");
            redirect("contact.php");
        } else {

            set_message("Message sent sucessfully !");
            redirect("contact.php");
        }
    }
}










function send_message_candidate()
{



    if (isset($_POST['submit'])) {



        $to = $_POST['email'];
        $subject = wordwrap($_POST['subject'], 70);
        $body = $_POST['message'];
        $from = "devtestphpmail.com";
        $header = "From" . $from;


        $message = mail($to, $from, "$subject", $body, $header);

        if (!$message) {

            set_message("Sorry , we Could not send your message !");
            redirect("candidate_message.php");
        } else {

            set_message("Message sent sucessfully !");
            redirect("candidate_message.php");
        }
    }
}











function forgot_mail()
{

    /* SENDING RESET PASSWORD PAGE LINK TO USER */
    if (isset($_POST['submit'])) {

        $to = $_POST['email'];
        $subject = $_POST['email'];
        // $body = $_POST['message'];
        $from = "devtestphpmail.com";
        // $header = "From" . $from;
        $message = mail($to, $from, "$subject");

        if (!$message) {

            set_message("Sorry , we Could not send your link !");
            redirect("forgot.php");
        } else {

            set_message("Reset password link sent sucessfully !");
            redirect("login.php");
        }
    }
}








function reset_link_via_forgot()
{

    if (isset($_POST['submit'])) {


        $username = $_POST['name'];
        $user_email = $_POST['email'];
        $user_type = $_POST['user_type'];

        $select_user = query("SELECT * FROM users WHERE username = '{$username}' ");
        confirm($select_user);

        while ($row = fetch_array($select_user)) {

            $user_id = $row['user_id'];
            $email = $row['email'];
            $type = $row['type'];

            if ($user_email == $email && $user_type == $type) {

                set_message("Set your new password here !");
                redirect("reset_password.php");
            } else {

                set_message("Incorrect Credentials !");
                redirect("forgot.php");
            }
        }
    }
}












function reset_password()
{

    global $connection;

    if (isset($_POST['submit'])) {


        $passcode = trim($_POST['passcode']);
        $passcode = mysqli_real_escape_string($connection, $passcode);


        $code_query = query("SELECT * FROM users WHERE code = '{$passcode}' ");
        $query = query($code_query);
        confirm($query);

        while ($row = mysqli_fetch_array($query)) {

            $user_id   = $row['user_id'];
            $user_code   = $row['code'];

            var_dump($user_id);
            die;



            if (password_verify($passcode, $user_code)) {


                $code_query = "SELECT * FROM users WHERE code = '{$passcode}' ";
                $query = query($code_query);
                confirm($query);

                while ($row = mysqli_fetch_array($query)) {
                    $user_id   = $row['user_id'];
                    $username   = $row['username'];
                }
            }
        }


        if ($_POST['password'] && $_POST['confirm_password']) {
            if ($_POST['password'] == $_POST['confirm_password']) {

                $password = $_POST['password'];
                $new_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

                $reset_query = "UPDATE users SET password = '{$new_password}' ";
                $reset_query .= "WHERE user_id = '{$_GET['id']}' ";
                $query = query($reset_query);
                confirm($query);

                if ($query) {

                    set_message("Password changed sucessfully !");
                    redirect("login.php");
                } else {

                    set_message("Password not changed !");
                    redirect("reset_password.php");
                }
            }
        }
    }
}













/********************************************* END MESSAGE FUCNTION ******************************************/



















/**************************************** FRONT DATA FUCNTIONS ***********************************************/






function count_jobs()
{

    $query = query("SELECT id FROM jobs");
    confirm($query);

    $jobs_count = mysqli_num_rows($query);

    echo $jobs_count;
}








function count_candidates()
{


    $query = query("SELECT user_id FROM users WHERE type = 0");
    confirm($query);

    $candidate_count = mysqli_num_rows($query);

    echo $candidate_count;
}








function count_companies()
{


    $query = query("SELECT user_id FROM users WHERE type = 1");
    confirm($query);

    $company_count = mysqli_num_rows($query);

    echo $company_count;
}








function get_jobs()
{

    $query = query("SELECT * FROM jobs WHERE status = '0' ");
    confirm($query);

    while ($row = fetch_array($query)) {

        $user_admin_job = <<<DELIMETER

<tr>
    <td>{$row['id']}</td>
    <td>{$row['title']}</td>
    <td>{$row['company_name']}</td>
    <td>{$row['description']}</td>
    <td>&#8377;{$row['salary']}</td>
    <td>{$row['location']}</td>
    <td>{$row['created_at']}</td>
    <td>
        <div class="header-btn d-none f-right d-lg-block">
            <a href="job_details.php?id={$row['id']}" class="btn border-btn head-btn1">View</a>
        </div>
    </td>
</tr>

DELIMETER;

        echo $user_admin_job;
    }
}











function get_jobs_site_admin()
{

    $query = query("SELECT * FROM jobs");
    confirm($query);

    while ($row = fetch_array($query)) {

        $admin_all_job = <<<DELIMETER

<tr>
    <td>{$row['id']}</td>
    <td>{$row['title']}</td>
    <td>{$row['description']}</td>
    <td>{$row['company_name']}</td>
    <td>
        <div class="send-activate activate_job">
            <a href="admin/activate_job.php?id={$row['id']}"><button name="activate_job" type="activate-job" class="btn head-btn1">Activate !</button></a>
        </div>
        <br>
        <div class="send-deactivate deactivate_job">
            <a href="admin/deactivate_job.php?id={$row['id']}"><button name="deactivate_job" type="deactivate-job" class="btn head-btn1">Deactivate !</button></a>
        </div>
    </td>
    <td>
        <div class="header-btn d-none d-lg-block">
            <a href="job_details.php?id={$row['id']}" class="btn border-btn head-btn1">View</a>
        </div>
    </td>
    <td>
        <div class="header-btn d-none d-lg-block job_delete">
            <a href="admin/admin_delete_jobs.php?id={$row['id']}" class="btn border-btn head-btn1">Delete</a>
        </div>
    </td>
</tr>

DELIMETER;

        echo $admin_all_job;
    }
}















function get_featured_jobs()
{

    $query = query("SELECT * FROM jobs WHERE status = '0' LIMIT 3");
    confirm($query);

    while ($row = fetch_array($query)) {

        $company_id = $row['company_id'];
        $job_company_name = $row['company_name'];
        $job_id = $row['id'];
        $job_title = $row['title'];
        $job_location = $row['salary'];
        $job_salary = $row['location'];
        $job_nature = $row['nature'];
        $job_created_at = $row['created_at'];

        $image_query = query("SELECT image FROM users WHERE user_id = '{$company_id}' ");
        confirm($image_query);

        while ($row = fetch_array($image_query)) {
            $company_image = $row['image'];

            $featured_job = <<<DELIMETER
                <div class="single-job-items mb-30">
                    <div class="job-items">
                        <div class="company-img">
                            <a href="job_details.php?id={$job_id}"><img width="100" src="images/{$company_image}" alt=""></a>
                        </div>
                        <div class="job-tittle">
                            <a href="job_details.php?id={$job_id}">
                                <h4>{$job_title}</h4>
                            </a>
                            <ul>
                                <li>{$job_company_name}</li>
                                <li><i class="fas fa-map-marker-alt"></i>{$job_location}</li>
                                <li>&#8377; {$job_salary}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="items-link f-right">
                        <a href="job_details.php?id={$job_id}">{$job_nature}</a>
                        <span>{$job_created_at}</span>
                    </div>
                </div>
        DELIMETER;

            echo $featured_job;
        }
    }
}













function get_all_companies()
{


    $query = query("SELECT * FROM users WHERE type = 1 ");
    confirm($query);

    while ($row = fetch_array($query)) {

        $company_id = $row['user_id'];

        $admin_all_companies = <<<DELIMETER

<tr>
    <td>
        <img width="100" src="images/{$row['image']}" alt="">
    </td>
    <td>{$row['username']}</td>
    <td>{$row['email']}</td>
    <td>{$row['description']}</td>
    <td>
        <div class="send-activate activate_company">
            <a href="admin/activate_company.php?id={$company_id}"><button name="activate_company" type="activate-company" class="btn head-btn1">Activate !</button></a>
        </div>
        <br>
        <div class="send-deactivate deactivate_company">
            <a href="admin/deactivate_company.php?id={$company_id}"><button name="deactivate_company" type="deactivate-company" class="btn head-btn1">Deactivate !</button></a>
        </div>
    </td>
    <td>
        <div class="header-btn d-none d-lg-block">
            <a href="admin_company_profile.php?id={$company_id}" class="btn border-btn head-btn1">Update</a>
        </div>
    </td>
    <td>
        <div class="header-btn d-none d-lg-block">
            <a href="company_details.php?id={$company_id}" class="btn border-btn head-btn1">View</a>
        </div>
    </td>
    <td>
        <div class="header-btn d-none d-lg-block company_delete">
            <a href="admin/delete_company.php?id={$company_id}" class="btn border-btn head-btn1">Delete</a>
        </div>
    </td>
</tr>

DELIMETER;

        echo $admin_all_companies;
    }
}










function get_all_candidates()
{


    $query = query("SELECT * FROM users WHERE type = 0 ");
    confirm($query);

    while ($row = fetch_array($query)) {

        $candidate_id = $row['user_id'];
        $candidate_name = $row['username'];
        $candidate_email = $row['email'];
        // $candidate_status = $row['status'];



        $candidate_query = query("SELECT * FROM candidate WHERE name = '{$candidate_name}' ");
        confirm($candidate_query);


        while ($row = fetch_array($candidate_query)) {



            $admin_all_candidates = <<<DELIMETER

<tr>
    <td>
        <img width="100" src="images/{$row['image']}" alt="">
    </td>
    <td>{$candidate_name}</td>
    <td>{$candidate_email}</td>
    <td>{$row['description']}</td>
    <td>
        <div class="send-activate activate_candidate">
            <a href="admin/activate_candidate.php?id={$candidate_id}"><button name="activate_candidate" type="activate-candidate" class="btn head-btn1">Activate !</button></a>
        </div>
        <br>
        <div class="send-deactivate deactivate_candidate">
            <a href="admin/deactivate_candidate.php?id={$candidate_id}"><button name="deactivate_candidate" type="deactivate-candidate" class="btn head-btn1">Deactivate !</button></a>
        </div>
    </td>
    <td>
        <div class="header-btn d-none d-lg-block">
            <a href="admin_candidate_profile.php?id={$candidate_id}" class="btn border-btn head-btn1">Update</a>
        </div>
    </td>
    <td>
        <div class="header-btn d-none d-lg-block">
            <a href="candidate_details.php?id={$candidate_id}" class="btn border-btn head-btn1">View</a>
        </div>
    </td>
    <td>
        <div class="header-btn d-none d-lg-block candidate_delete">
            <a href="admin/delete_candidate.php?id={$candidate_id}" class="btn border-btn head-btn1">Delete</a>
        </div>
    </td>
</tr>

DELIMETER;

            echo $admin_all_candidates;
        }
    }
}











function apply_button_in_job_details()
{

    if (IsLoggedIn()) {


        $username = $_SESSION['username'];

        $user_query = query("SELECT type FROM users WHERE username = '{$username}' ");
        confirm($user_query);

        while ($row = fetch_array($user_query)) {

            $usertype = $row['type'];
        }

        $job_query = query("SELECT id FROM jobs WHERE id =" . escape_string($_GET['id']));
        confirm($job_query);


        if ($usertype == 0) {


            $candidate_button = <<<DELIMETER

            <div class="apply-btn2 job_apply">
                <a href="apply_job.php?id={$_GET['id']}"><button name="apply" type="submit" class="btn head-btn1">Apply Now !</button></a>
            </div>

        DELIMETER;

            echo $candidate_button;
        }
    } else {

        $apply_login_button = <<<DELIMETER

        <div class="apply-btn2">
            <a href="login.php"><button name="apply" type="submit" class="btn head-btn1">Apply Now !</button></a>
        </div>

    DELIMETER;

        echo $apply_login_button;
    }
}











function apply_button_retrieve_button()
{

    if (IsLoggedIn()) {

        $username = $_SESSION['username'];

        $user_query = query("SELECT type FROM users WHERE username = '{$username}' ");
        confirm($user_query);

        while ($row = fetch_array($user_query)) {

            $usertype = $row['type'];
        }

        $job_query = query("SELECT id FROM jobs WHERE id =" . escape_string($_GET['id']));
        confirm($job_query);


        if ($usertype == 0) {

            $retrieve_button = <<<DELIMETER

            <div class="retrieve-btn2 job_retrieve">
                <a href="retrieve_job.php?id={$_GET['id']}"><button name="retrieve" type="submit" class="btn head-btn1">Retrieve Job!</button></a>
            </div>

    DELIMETER;

            echo $retrieve_button;
        }
    }
}











function view_button_job_details()
{

    if (IsLoggedIn()) {


        $username = $_SESSION['username'];

        $user_query = query("SELECT type FROM users WHERE username = '{$username}' ");
        confirm($user_query);

        while ($row = fetch_array($user_query)) {
            $usertype = $row['type'];
        }

        $job_query = query("SELECT company_id FROM jobs WHERE id =" . escape_string($_GET['id']));
        confirm($job_query);

        while ($row = fetch_array($job_query)) {
            $company_id = $row['company_id'];
        }

        if ($usertype == 0) {
            $candidate_button = <<<DELIMETER
                <div class="company-details">
                    <a href="company_details.php?id=$company_id"><button name="company_details" type="submit" class="btn head-btn1">View Details !</button></a>
                </div>
            DELIMETER;

            echo $candidate_button;
        }
    } else {

        $apply_login_button = <<<DELIMETER
                <div class="company-details">
                    <a href="login.php"><button name="company_details" type="submit" class="btn head-btn1">View Details !</button></a>
                </div>
    DELIMETER;

        echo $apply_login_button;
    }
}











function job_detail_page_link()
{

    if (IsLoggedIn()) {

        $usertype = $_SESSION['type'];
    }


    if (isset($_GET['id'])) {

        $user_query = query("SELECT * FROM users WHERE user_id =" . escape_string($_GET['id']));
        confirm($user_query);

        while ($row = fetch_array($user_query)) {
            $candidate_id = $row['user_id'];
            $candidate_name = $row['username'];


            $query = query("SELECT cv FROM candidate WHERE name = '{$candidate_name}' ");
            confirm($query);

            while ($row = fetch_array($query)) {

                $candidate_cv = $row['cv'];
            }


            if ($usertype == 1) {

                $company_link = <<<DELIMETER

                    <div class="candidate-details">
                        <a href="candidate_cv/$candidate_cv"><button name="candidate_details" type="submit" class="btn head-btn1">View CV</button></a>
                    </div>
                    <br>
                    <div class="send-accept">
                        <a href="accept_application.php?id=$candidate_id"><button name="accept_application" type="accept-application" class="btn head-btn1">Accept Application !</button></a>
                    </div>
                    <br>
                    <div class="send-reject">
                        <a href="reject_application.php?id=$candidate_id"><button name="reject_application" type="reject-application" class="btn head-btn1">Reject Application !</button></a>
                    </div>
                    <br>
                    <div class="send-message">
                        <a href="candidate_message.php?id=$candidate_id"><button name="message_candidate" type="message_candidate" class="btn head-btn1">Message Candidate !</button></a>
                    </div>

                DELIMETER;
                echo $company_link;
            } elseif ($usertype == 2) {

                $admin_link = <<<DELIMETER

                    <div class="candidate-details">
                        <a href="candidate_cv/$candidate_cv"><button name="candidate_details" type="submit" class="btn head-btn1">View CV</button></a>
                    </div>
                    <br>
                    <div class="send-message">
                        <a href="candidate_message.php?id=$candidate_id"><button name="message_candidate" type="message_candidate" class="btn head-btn1">Message Candidate !</button></a>
                    </div>

                DELIMETER;
                echo $admin_link;
            }
        }
    }
}










// function reset_password()
// {

//     if (isset($_POST['submit'])) {

//         if (isset($_GET['id'])) {

//             $user_id = $_GET['id'];

//             var_dump($user_id);
//             die;

//             if ($_POST['password'] && $_POST['confirm_password']) {
//                 if ($_POST['password'] == $_POST['confirm_password']) {

//                     $password = $_POST['password'];
//                     $new_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

//                     $reset_query = "UPDATE users SET password = '{$new_password}' ";
//                     $reset_query .= "WHERE user_id = '{$user_id}' ";
//                     $query = query($reset_query);
//                     confirm($query);

//                     if ($query) {

//                         set_message("Password changed sucessfully !");
//                         redirect("login.php");
//                     } else {

//                         set_message("Password not changed !");
//                         redirect("reset.php");
//                     }
//                 }
//             }
//         }
//     }
// }











/************************************* END FRONT DATA FUCNTIONS *****************************/


















/******************************************** ADMIN DATA FUCNTIONS *****************************/











function add_jobs()
{


    if (isset($_POST['submit'])) {


        $company_id = $_SESSION['user_id'];
        $company_name = $_SESSION['username'];
        $title = $_POST['job_title'];
        $description = $_POST['job_description'];
        $vacancy = $_POST['job_vacancy'];
        $nature = $_POST['job_nature'];
        $knowledge = $_POST['job_knowledge'];
        $skills = $_POST['job_skills'];
        $education = $_POST['job_education'];
        $experience = $_POST['job_experience'];
        $salary = $_POST['job_salary'];
        $location = $_POST['job_location'];


        $query = query("INSERT INTO jobs( title , company_id , company_name , description , vacancy , nature , knowledge , skills , education , experience , salary , location) VALUES( '{$title}' , '{$company_id}' , '{$company_name}' ,  '{$description}' , '{$vacancy}' , '{$nature}' , '{$knowledge}' , '{$skills}' , '{$education}' , '{$experience}' , '{$salary}' , '{$location}') ");
        confirm($query);

        set_message("New job created !");
        redirect("company_index.php");
    }
}








function update_jobs()
{


    if (isset($_POST['update'])) {

        $title = $_POST['job_title'];
        $description = $_POST['job_description'];
        $salary = $_POST['job_salary'];
        $location = $_POST['job_location'];


        $query  = "UPDATE jobs SET title = '{$title}' , description = '{$description}' , salary = '{$salary}' , location = '{$location}' ";
        $query .= "WHERE id =" . escape_string($_GET['id']);
        $update_job_query = query($query);
        confirm($update_job_query);

        set_message("Job has been Updated !");
        redirect("company_index.php");
    }
}











function update_profile_company()
{


    if (isset($_POST['update'])) {

        $image        = $_FILES['file']['name'];
        $temp_image   = $_FILES['file']['tmp_name'];

        $description = $_POST['company_description'];
        $capacity    = $_POST['company_employees'];
        $location    = $_POST['company_location'];

        move_uploaded_file($temp_image, "images/$image");


        if (empty($image)) {

            $username = $_SESSION['username'];
            $query = query("SELECT * FROM users WHERE username = '{$username}' ");

            while ($row = fetch_array($query)) {

                $image = $row['image'];
            }
        }

        $query = "UPDATE users SET description = '{$description}' , capacity = '{$capacity}' , image = '{$image}' , location = '{$location}' ";
        $query .= "WHERE username = '{$_SESSION['username']}' ";
        $update_profile_query = query($query);
        confirm($update_profile_query);

        set_message("Your profile has been updated !");
        redirect("admin/company_index.php");
    }
}











function update_profile_company_admin()
{


    if (isset($_POST['update'])) {

        $company_id = $_GET['id'];

        $image        = $_FILES['file']['name'];
        $temp_image   = $_FILES['file']['tmp_name'];

        $description = $_POST['company_description'];
        $capacity    = $_POST['company_employees'];
        $location    = $_POST['company_location'];

        move_uploaded_file($temp_image, "images/$image");


        if (empty($image)) {

            $query = query("SELECT * FROM users WHERE user_id = '{$company_id}' ");
            while ($row = fetch_array($query)) {
                $image = $row['image'];
            }
        }

        $query = query("SELECT * FROM users WHERE user_id = '{$company_id}' ");
        while ($row = fetch_array($query)) {
            $company_name = $row['username'];
        }

        $query = "UPDATE users SET description = '{$description}' , capacity = '{$capacity}' , image = '{$image}' , location = '{$location}' ";
        $query .= "WHERE username = '{$company_name}' ";
        $update_profile_query = query($query);
        confirm($update_profile_query);

        set_message("Company profile has been updated !");
        redirect("admin_companies.php");
    }
}











function update_candidate_profile()
{


    if (isset($_POST['update'])) {

        $username = $_SESSION['username'];


        $description = $_POST['candidate_description'];

        $cv        = $_FILES['file1']['name'];
        $temp_cv   = $_FILES['file1']['tmp_name'];

        $knowledge   = $_POST['candidate_knowledge'];
        $skills      = $_POST['candidate_skills'];
        $education   = $_POST['candidate_education'];
        $experience  = $_POST['candidate_experience'];

        $image        = $_FILES['file2']['name'];
        $temp_image   = $_FILES['file2']['tmp_name'];


        move_uploaded_file($temp_cv, "candidate_cv/$cv");
        move_uploaded_file($temp_image, "images/$image");


        if (empty($image)) {

            $username = $_SESSION['username'];
            $query = query("SELECT * FROM users WHERE username = '{$username}' ");

            while ($row = fetch_array($query)) {

                $image = $row['image'];
            }
        }


        /* QUERY */
        $profile_query = "UPDATE candidate SET description = '{$description}' , cv = '{$cv}' , knowledge = '{$knowledge}' , skills = '{$skills}' , education = '{$education}' , experience = '{$experience}' , image = '{$image}' ";
        $profile_query .= "WHERE name = '{$username}' ";
        $query = query($profile_query);
        confirm($query);


        set_message("Your profile has been updated !");
        redirect("admin/candidate_index.php");
    }
}













function update_candidate_profile_admin()
{


    if (isset($_POST['update'])) {

        $candidate_id = $_GET['id'];
        $description = $_POST['candidate_description'];

        $cv        = $_FILES['file1']['name'];
        $temp_cv   = $_FILES['file1']['tmp_name'];

        $knowledge   = $_POST['candidate_knowledge'];
        $skills      = $_POST['candidate_skills'];
        $education   = $_POST['candidate_education'];
        $experience  = $_POST['candidate_experience'];

        $image        = $_FILES['file2']['name'];
        $temp_image   = $_FILES['file2']['tmp_name'];


        move_uploaded_file($temp_cv, "candidate_cv/$cv");
        move_uploaded_file($temp_image, "images/$image");


        if (empty($image)) {

            $query = query("SELECT * FROM users WHERE user_id = '{$candidate_id}' ");
            while ($row = fetch_array($query)) {
                $image = $row['image'];
            }
        }


        $query = query("SELECT * FROM users WHERE user_id = '{$candidate_id}' ");
        while ($row = fetch_array($query)) {
            $candidate_name = $row['username'];
        }

        /* QUERY */
        $profile_query = "UPDATE candidate SET description = '{$description}' , cv = '{$cv}' , knowledge = '{$knowledge}' , skills = '{$skills}' , education = '{$education}' , experience = '{$experience}' , image = '{$image}' ";
        $profile_query .= "WHERE name = '{$candidate_name}' ";
        $query = query($profile_query);
        confirm($query);


        set_message("Profile has been updated !");
        redirect("admin_candidates.php");
    }
}













function job_company_details()
{

    $job_company_query = query("SELECT title FROM jobs WHERE company_id =" . escape_string($_GET['id']));
    confirm($job_company_query);

    while ($row = fetch_array($job_company_query)) {

        $company_job = $row['title'];


        $company_all_job = <<<DELIMETER
            <li>{$company_job}</li>
        DELIMETER;
        echo $company_all_job;
    }
}











function get_jobs_company_admin()
{

    $username = $_SESSION['username'];

    $query = query("SELECT * FROM jobs WHERE company_name = '{$username}' AND status = '0' ");
    confirm($query);

    while ($row = fetch_array($query)) {

        $user_admin_job = <<<DELIMETER

<tr>
<td>{$row['id']}</td>
<td>{$row['title']}</td>
<td>{$row['company_name']}</td>
<td>{$row['description']}</td>
<td>&#8377;{$row['salary']}</td>
<td>{$row['location']}</td>
<td>{$row['created_at']}</td>
<td>
    <div class="header-btn d-none d-lg-block">
        <a href="../job_details.php?id={$row['id']}" class="btn border-btn head-btn1">View</a>
    </div>
</td>
<td>
    <div class="header-btn d-none d-lg-block">
        <a href="edit_jobs.php?id={$row['id']}" class="btn border-btn head-btn1">Update</a>
    </div>
</td>
<td>
    <div class="header-btn d-none d-lg-block job_delete">
        <a href="delete_jobs.php?id={$row['id']}" class="btn border-btn head-btn1">Delete</a>
    </div>
</td>

</tr>

DELIMETER;

        echo $user_admin_job;
    }
}










function get_jobs_candidate_admin()
{


    $job_id_query = query("SELECT job_id FROM applications WHERE user_id = '{$_SESSION['user_id']}' ");

    while ($row = fetch_array($job_id_query)) {

        $job_id = $row['job_id'];


        $query = query("SELECT * FROM jobs WHERE id = '{$job_id}' AND status = '0' ");
        confirm($query);

        while ($row = fetch_array($query)) {

            $candidate_selected_job = <<<DELIMETER


<tr>
<td>{$row['id']}</td>
<td>{$row['title']}</td>
<td>{$row['company_name']}</td>
<td>{$row['description']}</td>
<td>&#8377;{$row['salary']}</td>
<td>{$row['location']}</td>
<td>{$row['created_at']}</td>
<td>
    <div class="header-btn d-none d-lg-block">
        <a href="../job_details.php?id={$row['id']}" class="btn border-btn head-btn1">View</a>
    </div>
</td>
</tr>

DELIMETER;

            echo $candidate_selected_job;
        }
    }
}












function get_applied_jobs_company_admin()
{


    $company_id = $_SESSION['user_id'];



    /* APPLICATIONS TABLE QUERY */
    $company_id_query = query("SELECT * FROM applications WHERE company_id = '{$company_id}' ");
    confirm($company_id_query);

    while ($row = fetch_array($company_id_query)) {

        $job_id = $row['job_id'];
        $user_id = $row['user_id'];
        $applied_at = $row['created_at'];



        /* JOB TABLE QUERY */
        $select_job_query = query("SELECT * FROM jobs WHERE id = '{$job_id}' AND status = '0' ");
        confirm($select_job_query);

        while ($row = fetch_array($select_job_query)) {

            $applied_job_id = $row['id'];
            $applied_job_title = $row['title'];
            $applied_job_descriptipon = $row['description'];
            $applied_job_salary = $row['salary'];
            $applied_job_location = $row['location'];



            /* USERS TABLE QUERY */
            $select_user_query = query("SELECT * FROM users WHERE user_id = '{$user_id}' ");
            confirm($select_user_query);


            while ($row = fetch_array($select_user_query)) {

                $applied_job_username = $row['username'];


                /* APPLICATIONS RECEIVED TABLE DATA */
                $show_applied_job_details = <<<DELIMETER

                    <tr>
                        <td>{$applied_job_id}</td>
                        <td>{$applied_job_title}</td>
                        <td>{$applied_job_descriptipon}</td>
                        <td>&#8377;{$applied_job_salary}</td>
                        <td>{$applied_job_location}</td>
                        <td>{$applied_at}</td>
                        <td>
                            <div class="header-btn d-none d-lg-block">
                                <a href="candidate_details.php?id={$user_id}" class="btn border-btn head-btn1">{$applied_job_username}</a>
                            </div>
                        </td>
                        <td>
                            <div class="header-btn d-none d-lg-block">
                                <a href="job_details.php?id={$job_id}" class="btn border-btn head-btn1">View</a>
                            </div>
                        </td>
                    </tr>

                DELIMETER;

                echo $show_applied_job_details;
            }
        }
    }
}












function get_application_status_job()
{


    $job_query = query("SELECT * FROM applications WHERE user_id = '{$_SESSION['user_id']}' ");

    while ($row = fetch_array($job_query)) {

        $job_id = $row['job_id'];
        $status = $row['status'];

        $query = query("SELECT * FROM jobs WHERE id = '{$job_id}' AND status = '0' ");
        confirm($query);

        while ($row = fetch_array($query)) {

            $job_title = $row['title'];
            $job_description = $row['description'];
            $job_company_id = $row['company_id'];

            $status_job = <<<DELIMETER


<tr>
<td>{$job_id}</td>
<td>{$job_title}</td>
<td>{$job_description}</td>
<td>
    <div class="header-btn d-none d-lg-block">
        <a href="job_details.php?id={$row['id']}" class="btn border-btn head-btn1">View</a>
    </div>
</td>
<td>
    <div class="header-btn d-none d-lg-block">
        <a href="company_details.php?id={$job_company_id}" class="btn border-btn head-btn1">View</a>
    </div>
</td>
<td>{$status}</td>
</tr>

DELIMETER;

            echo $status_job;
        }
    }
}










/**************************************** END ADMIN DATA FUCNTIONS *****************************/
