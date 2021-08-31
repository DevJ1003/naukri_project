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








function admin_link_user_type()
{


    if (IsLoggedIn()) {

        $admin_username_query = query("SELECT id FROM users");
        confirm($admin_username_query);

        while ($row = mysqli_fetch_array($admin_username_query)) {

            $id = $row['id'];






            $admin_usertype_query = query("SELECT type FROM users WHERE id = '{$id}' ");
            confirm($admin_usertype_query);






            while ($row = mysqli_fetch_array($admin_usertype_query)) {

                $usertype = $row['type'];
            }


            var_dump($usertype);



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
