<?php include "../includes/db.php";

include "../includes/functions.php";


/* ACTIVATE JOB QUERY */
if (isset($_GET['id'])) {

    $activate_query = "UPDATE jobs SET status = '0' ";
    $activate_query .= "WHERE id ="  . escape_string($_GET['id']);
    $query = query($activate_query);
    confirm($query);

    set_message("You Activated This Job !");
    redirect("../admin_jobs.php");
}
