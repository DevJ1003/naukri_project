<?php include "includes/db.php";

include "includes/functions.php";


if (isset($_GET['id'])) {


    $jobs_data_query = query("SELECT * FROM jobs WHERE id =" . escape_string($_GET['id']));
    confirm($jobs_data_query);

    while ($row = fetch_array($jobs_data_query)) {

        $job_id = $_GET['id'];
    }


    $jobs_delete_data_query = query("DELETE FROM applications WHERE job_id = '{$job_id}' ");
    confirm($jobs_delete_data_query);

    set_message("You retrieved your application !");
    redirect("admin/candidate_index.php");
}
