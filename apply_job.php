<?php include "includes/db.php";

include "includes/functions.php";

/* APPLY JOB-INTEREST QUERY */
if (isset($_GET['id'])) {

    $jobs_data_query = query("SELECT * FROM jobs WHERE id =" . escape_string($_GET['id']));
    confirm($jobs_data_query);

    while ($row = fetch_array($jobs_data_query)) {

        $job_id = $_GET['id'];
        $company_id = $row['company_id'];
    }

    $user_id    =  $_SESSION['user_id'];
    $username    =  $_SESSION['username'];

    $query = query("INSERT INTO applications( job_id , user_id , company_id ) VALUES( '{$job_id}' , '{$user_id}' , '{$company_id}' ) ");
    confirm($query);

    set_message("You applied for this Job!");
    redirect("admin/candidate_index.php");
}
