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

        $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
        confirm($query);


        if (mysqli_num_rows($query) == 0) {

            set_message("Your Username or Password is wrong !");
            redirect("login.php");
        } else {
            $_SESSION['username'] = $username;
            redirect("admin/candidate_index.php");
        }
    }
}





/*************************************** END OF REGISTER-LOGIN FUCNTION *************************************/








/******************************** HOMEPAGE LOGIN-ADMIN LINK FUCNTION ********************************/




function IsLoggedIn()
{
    if (isset($_SESSION['username'])) {

        return true;
    } else {

        return false;
    }
}


function show_login_admin_registration_link()
{

    if (IsLoggedIn()) {

        $admin = <<<DELIMETER

<li>
    <a href="admin/candidate_index.php"><span class="glyphicon glyphicon-user"></span> Admin</a>
</li>

DELIMETER;

        echo $admin;
    } else {


        $login = <<<DELIMETER

<li>
    <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
</li>
<li>
    <a href="registration.php"><span class="glyphicon glyphicon-log-in"></span> Registration</a>
</li>

DELIMETER;

        echo $login;
    }
}




/******************************** END OF HOMEPAGE LOGIN-ADMIN LINK FUCNTION ********************************/









/**************************************** ADMIN DATA FUCNTIONS ***********************************************/





function get_jobs_in_user_admin()
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
<td>{$row['salary']}</td>
<td>{$row['location']}</td>
</tr>





DELIMETER;

        echo $user_admin_job;
    }
}
