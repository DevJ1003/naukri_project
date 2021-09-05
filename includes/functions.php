<?php

/*********************************************** Helper Functions *************************************/


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




/***************************************** END Helper Functions ******************************************/










/***************************************** REGISTER-LOGIN FUCNTION ****************************************/




function register_user()
{

    if (isset($_POST['register'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];

        $image = $_FILES['file']['name'];
        $temp_image = $_FILES['file']['tmp_name'];

        move_uploaded_file($temp_image, "images/$image");


        $generated_query = "INSERT INTO users(username, password , type , email , image) VALUES('{$username}'  , '{$password}' , '{$user_type}' , '{$email}', '{$image}') ";
        $query = query($generated_query);
        confirm($query);

        redirect("login.php");
        set_message("User Registered !!");
    }
}




function login_user()
{

    if (isset($_POST['submit'])) {

        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $login_query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ";
        $query = query($login_query);
        confirm($query);


        $usertype_query = "SELECT user_id,type FROM users WHERE username = '{$username}' ";
        $query = query($usertype_query);
        confirm($query);



        while ($row = mysqli_fetch_array($query)) {
            $usertype = $row['type'];
            $userid = $row['user_id'];
        }




        if ($usertype == 0) {

            if (mysqli_num_rows($query) == 0) {

                set_message("Your Username or Password is wrong !");
                redirect("login.php");
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $userid;
                redirect("admin/candidate_index.php");
            }
        } else {

            if (mysqli_num_rows($query) == 0) {

                set_message("Your Username or Password is wrong !");
                redirect("login.php");
            } else {
                $_SESSION['user_id'] = $userid;
                $_SESSION['username'] = $username;
                redirect("admin/company_index.php");
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
            <li><a href="job_listing.php">Find a Job</a></li>
            <li><a href="admin/candidate_index.php">Admin</a></li>
            <li><a href="candidate_profile.php?id={$user_id}">Profile</a></li>
        DELIMETER;

            echo $candidate_admin;
        } elseif ($usertype == 1) {

            $company_admin = <<<DELIMETER
            <li><a href="admin/company_index.php">Admin</a></li>
            <li><a href="company_applications.php">Applications</a></li>
            <li><a href="company_profile.php?id={$user_id}">Profile</a></li>
        DELIMETER;

            echo $company_admin;
        }
    } else {

        $find_job_button = <<<DELIMETER

        <li><a href="job_listing.php">Find a Job</a></li>

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
            <li><a href="../job_listing.php">Find a Job</a></li>
            <li><a href="candidate_index.php">Admin</a></li>
            <li><a href="../candidate_profile.php?id={$user_id}">Profile</a></li>
        DELIMETER;

            echo $candidate_admin;
        } elseif ($usertype == 1) {

            $company_admin = <<<DELIMETER
            <li><a href="company_index.php">Admin</a></li>
            <li><a href="../company_applications.php">Applications</a></li>
            <li><a href="../company_profile.php?id={$user_id}">Profile</a></li>
        DELIMETER;

            echo $company_admin;
        }
    } else {

        $find_job_button = <<<DELIMETER

        <li><a href="job_listing.php">Find a Job</a></li>

DELIMETER;

        echo $find_job_button;
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
        }
    } else {

        $login_button = <<<DELIMETER

    <a href="login.php" class="btn head-btn1">Login to Apply !</a>

DELIMETER;

        echo $login_button;
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

    <a href="../includes/logout.php" class="btn head-btn1">Log Out</a>


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
































/**************************************** FRONT DATA FUCNTIONS ***********************************************/






function count_jobs()
{


    $query = query("SELECT id FROM jobs");
    confirm($query);

    $jobs_count = mysqli_num_rows($query);

    echo $jobs_count;
}








function get_jobs()
{

    $query = query("SELECT * FROM jobs");
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
                <a href="apply_job.php?id={$_GET['id']}"><button name="apply" type="submit" class="btn head-btn1">Apply Now</button></a>
            </div>

        DELIMETER;

            echo $candidate_button;
        }
    } else {

        $apply_login_button = <<<DELIMETER

        <div class="apply-btn2">
            <a href="login.php"><button name="apply" type="submit" class="btn head-btn1">Apply Now</button></a>
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











/************************************* END FRONT DATA FUCNTIONS *****************************/













/******************************************** ADMIN DATA FUCNTIONS *****************************/











function add_jobs()
{


    if (isset($_POST['submit'])) {


        $company_id = $_SESSION['user_id'];
        $company_name = $_SESSION['username'];
        $title = $_POST['job_title'];
        $user_id = "";
        $username = "";
        $description = $_POST['job_description'];
        $vacancy = $_POST['job_vacancy'];
        $nature = $_POST['job_nature'];
        $knowledge = $_POST['job_knowledge'];
        $skills = $_POST['job_skills'];
        $education = $_POST['job_education'];
        $experience = $_POST['job_experience'];
        $salary = $_POST['job_salary'];
        $location = $_POST['job_location'];


        $query = query("INSERT INTO jobs( title , company_id , company_name , user_id , username , description , vacancy , nature , knowledge , skills , education , experience , salary , location) VALUES( '{$title}' , '{$company_id}' , '{$company_name}' , '{$user_id}' , '{$username}' ,  '{$description}' , '{$vacancy}' , '{$nature}' , '{$knowledge}' , '{$skills}' , '{$education}' , '{$experience}' , '{$salary}' , '{$location}') ");
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

            while ($row = mysqli_fetch_array($query)) {

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










function create_candidate_profile()
{


    if (isset($_POST['update'])) {

        $username = $_SESSION['username'];

        $description = $_POST['candidate_description'];

        $cv        = $_FILES['pdf']['cv_name'];
        $temp_cv   = $_FILES['pdf']['cv_tmp_name'];

        $knowledge   = $_POST['candidate_knowledge'];
        $skills      = $_POST['candidate_skills'];
        $education   = $_POST['candidate_education'];
        $experience  = $_POST['candidate_experience'];

        $image        = $_FILES['file']['name'];
        $temp_image   = $_FILES['file']['tmp_name'];


        move_uploaded_file($temp_cv, "candidate_cv/$cv");
        move_uploaded_file($temp_image, "images/$image");

        $query = "INSERT INTO candidate( name , description , cv , knowledge , skills , education , experience , image ) VALUES( '{$username}' , '{$description}' , '{$cv}' , '{$knowledge}' , '{$skills}' , '{$education}' , '{$experience}' , '{$image}' )";
        $update_query = query($query);
        confirm($update_query);

        set_message("Your profile has been updated !");
        redirect("admin/candidate_index.php");
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

    $query = query("SELECT * FROM jobs WHERE company_name = '{$username}' ");
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
        <a href="../job_details.php?id={$row['id']}" class="btn border-btn head-btn1">View</a>
    </div>
</td>
<td>
    <div class="header-btn d-none f-right d-lg-block">
        <a href="edit_jobs.php?id={$row['id']}" class="btn border-btn head-btn1">Update</a>
    </div>
</td>
<td>
    <div class="header-btn d-none f-right d-lg-block job_delete">
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


        $query = query("SELECT * FROM jobs WHERE id = '{$job_id}' ");
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
    <div class="header-btn d-none f-right d-lg-block">
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
        $select_job_query = query("SELECT * FROM jobs WHERE id = '{$job_id}' ");
        confirm($select_job_query);

        while ($row = fetch_array($select_job_query)) {

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
                        <td>{$applied_job_title}</td>
                        <td>{$applied_job_descriptipon}</td>
                        <td>&#8377;{$applied_job_salary}</td>
                        <td>{$applied_job_location}</td>
                        <td>{$applied_at}</td>
                        <td>
                            <div class="header-btn d-none f-right d-lg-block">
                                <a href="candidate_details.php?id={$user_id}" class="btn border-btn head-btn1">{$applied_job_username}</a>
                            </div>
                        </td>
                        <td>
                            <div class="header-btn d-none f-right d-lg-block">
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










// function jobs_data_admin()
// {


//     if (isset($_GET['id'])) {

//         $query = query("SELECT * FROM jobs WHERE id =" . escape_string($_GET['id']));
//         confirm($query);

//         while ($row = fetch_array($query)) {

//             $company_name = $_SESSION['username'];
//             $title       = escape_string($row['title']);
//             $description = escape_string($row['description']);
//             $vacancy     = escape_string($row['vacancy']);
//             $nature      = escape_string($row['nature']);
//             $knowledge   = escape_string($row['knowledge']);
//             $skills      = escape_string($row['skills']);
//             $education   = escape_string($row['education']);
//             $experience  = escape_string($row['experience']);
//             $salary      = escape_string($row['salary']);
//             $location    = escape_string($row['location']);
//             $posted_on   = escape_string($row['created_at']);
//         }
//     }
// }









/**************************************** END ADMIN DATA FUCNTIONS *****************************/
