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

        $generated_query = "INSERT INTO users(username, password, type, email, created_at) VALUES('{$username}'  , '{$password}' , '{$user_type}' , '{$email}', now() ) ";
        $query = query($generated_query);
        confirm($query);
        redirect("login.php");
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


        $usertype_query = "SELECT type FROM users WHERE username = '{$username}' ";
        $query = query($usertype_query);
        confirm($query);



        while ($row = mysqli_fetch_array($query)) {

            $usertype = $row['type'];
        }




        if ($usertype == 0) {

            if (mysqli_num_rows($query) == 0) {

                set_message("Your Username or Password is wrong !");
                redirect("login.php");
            } else {
                $_SESSION['username'] = $username;
                redirect("admin/candidate_index.php");
            }
        } else {

            if (mysqli_num_rows($query) == 0) {

                set_message("Your Username or Password is wrong !");
                redirect("login.php");
            } else {
                $_SESSION['username'] = $username;
                redirect("admin/company_index.php");
            }
        }
    }
}







/*************************************** END OF REGISTER-LOGIN FUCNTION *************************************/














/****************************** ADMIN REGISTRATION , LOGIN , LOGOUT BUTTON ********************************/








function admin_link_user_type_index()
{


    if (IsLoggedIn()) {


        $username = $_SESSION['username'];


        $admin_usertype_query = query("SELECT type FROM users WHERE username = '{$username}' ");
        confirm($admin_usertype_query);

        while ($row = mysqli_fetch_array($admin_usertype_query)) {

            $usertype = $row['type'];
        }


        if ($usertype == 0) {

            $candidate_admin = <<<DELIMETER
            <li><a href="admin/candidate_index.php">Admin</a></li>
            DELIMETER;

            echo $candidate_admin;
        } else {

            $company_admin = <<<DELIMETER
            <li><a href="admin/company_index.php">Admin</a></li>
            DELIMETER;

            echo $company_admin;
        }
    }
}








function admin_link_user_type_admin()
{

    $username = $_SESSION['username'];

    $admin_usertype_query = query("SELECT type FROM users WHERE username = '{$username}' ");
    confirm($admin_usertype_query);

    while ($row = mysqli_fetch_array($admin_usertype_query)) {

        $usertype = $row['type'];
    }


    if ($usertype == 0) {

        $candidate_admin = <<<DELIMETER
            <li><a href="candidate_index.php">Admin</a></li>
            DELIMETER;

        echo $candidate_admin;
    } else {

        $company_admin = <<<DELIMETER
            <li><a href="company_index.php">Admin</a></li>
            DELIMETER;

        echo $company_admin;
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

    <a href="../registration.php" class="btn head-btn1">Register</a>
    <a href="../login.php" class="btn head-btn1">Login</a>


    DELIMETER;

        echo $login;
    }
}








/*********************************** END ADMIN REGISTRATION , LOGIN , LOGOUT BUTTON **********************************/








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
</tr>

DELIMETER;

        echo $user_admin_job;
    }
}







/************************************* END FRONT DATA FUCNTIONS *****************************/













/******************************************** ADMIN DATA FUCNTIONS *****************************/








function get_jobs_company_admin()
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
<td><a href="edit_jobs.php">Edit</a></td>
<td><a href="delete_jobs.php">Delete</a></td>
</tr>

DELIMETER;

        echo $user_admin_job;
    }
}










function add_jobs()
{


    if (isset($_POST['submit'])) {


        $company_id = $_SESSION['user_id'];
        $company_name = $_SESSION['username'];
        $title = $_POST['job_title'];
        $user_id = "";
        $username = "";
        $description = $_POST['job_description'];
        $salary = $_POST['job_salary'];
        $location = $_POST['job_location'];



        $query = query("INSERT INTO jobs( title , company_id , company_name , user_id , username , description , salary , location , created_at ) VALUES( '{$title}' , '{$company_id}' , '{$company_name}' , '{$user_id}' , '{$username}' ,  '{$description}' , '{$salary}' , '{$location}' , now() ) ");
        confirm($query);
    }
}



















/**************************************** END ADMIN DATA FUCNTIONS *****************************/
