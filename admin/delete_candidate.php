<?php include "../includes/db.php";

include "../includes/functions.php";

if (isset($_GET['id'])) {


    $name_query = query("SELECT username FROM users WHERE user_id =" . escape_string($_GET['id']) . " ");
    confirm($name_query);

    while ($row = fetch_array($name_query)) {

        $candidate_name = $row['username'];


        $query = query("DELETE FROM users WHERE user_id=" . escape_string($_GET['id']) . " ");
        confirm($query);

        $candidate_table_query = query("DELETE FROM candidate WHERE name = '{$candidate_name}' ");
        confirm($candidate_table_query);


        set_message("Candidate Deleted !");
        redirect("admin_candidates.php");
    }
}
