<?php include "../includes/db.php";

include "../includes/functions.php";


/* DELETE COMPANY QUERY */
if (isset($_GET['id'])) {

    $query = query("DELETE FROM users WHERE user_id=" . escape_string($_GET['id']) . " ");
    confirm($query);

    set_message("Company Deleted !");
    redirect("../admin_companies.php");
}
