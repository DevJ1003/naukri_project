<?php include "includes/db.php";

include "includes/functions.php";





if (isset($_GET['id'])) {


    if (isset($_GET['id'])) {


        /* JOB DATA */
        $jobs_data_query = query("SELECT * FROM jobs WHERE id =" . escape_string($_GET['id']));
        confirm($jobs_data_query);

        while ($row = fetch_array($jobs_data_query)) {


            $job_id = $_GET['id'];
        }



        // /* COMPANY DATA */
        // $company_name = escape_string($row['company_name']);
        // $company_data_query = query("SELECT * FROM users WHERE username = '{$company_name}' ");
        // confirm($company_data_query);

        // while ($row = fetch_array($company_data_query)) {


        //     $company_id = $row['user_id'];
        // }




        $user_id    =  $_SESSION['user_id'];




        $query = query("INSERT INTO applications( job_id , user_id , company_id ) VALUES( '{$job_id}' , '{$user_id}' , '{$company_id}' ) ");
        confirm($query);

        set_message("You applied for this Job!");
        redirect("job_details.php?id={$job_id}");
    }
}
