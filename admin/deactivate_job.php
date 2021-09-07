<?php include "../includes/db.php";

include "../includes/functions.php";


if (isset($_GET['id'])) {

    $deactivate_query = "UPDATE jobs SET status = '1' ";
    $deactivate_query .= "WHERE id ="  . escape_string($_GET['id']);
    $query = query($deactivate_query);
    confirm($query);

    set_message("You Deactivated This Job !");
    redirect("admin_jobs.php");
}
