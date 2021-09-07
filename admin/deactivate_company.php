<?php include "../includes/db.php";

include "../includes/functions.php";


if (isset($_GET['id'])) {

    $deactivate_query = "UPDATE users SET status = '1' ";
    $deactivate_query .= "WHERE user_id ="  . escape_string($_GET['id']);
    $query = query($deactivate_query);
    confirm($query);

    set_message("You Deactivated This Company Account !");
    redirect("admin_companies.php");
}
