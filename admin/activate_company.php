<?php include "../includes/db.php";

include "../includes/functions.php";


/* ACTIVATE COMPANY QUERY */
if (isset($_GET['id'])) {

    $activate_query = "UPDATE users SET status = '0' ";
    $activate_query .= "WHERE user_id ="  . escape_string($_GET['id']);
    $query = query($activate_query);
    confirm($query);

    set_message("You Activated This Company Account !");
    redirect("../admin_companies.php");
}
