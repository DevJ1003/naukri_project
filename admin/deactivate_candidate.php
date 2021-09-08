<?php include "../includes/db.php";

include "../includes/functions.php";


/* DEACTIVATE CANDIDATE QUERY */
if (isset($_GET['id'])) {

    $deactivate_query = "UPDATE users SET status = '1' ";
    $deactivate_query .= "WHERE user_id ="  . escape_string($_GET['id']);
    $query = query($deactivate_query);
    confirm($query);

    set_message("You Deactivated This Candidate Account !");
    redirect("../admin_candidates.php");
}
