<?php include "includes/db.php";

include "includes/functions.php";


if (isset($_GET['id'])) {

    $query = query("SELECT * FROM applications WHERE user_id =" .  escape_string($_GET['id']));
    confirm($query);

    while ($row = fetch_array($query)) {

        $job_id = $row['job_id'];
        $company_id = $row['company_id'];
        $status = 'reject';

        $accept_query = "UPDATE applications SET status = '{$status}' ";
        $accept_query .= "WHERE job_id = '{$job_id}' AND company_id = '{$company_id}' AND user_id = '{$_GET['id']}' ";
        $query = query($accept_query);
        confirm($query);

        set_message("Application rejected !");
        redirect("candidate_details.php?id={$_GET['id']}");
    }
}
