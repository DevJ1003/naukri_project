<?php include "header.php"; ?>


<h1 class="text-center" style="text-align: center;">CANDIDATE ADMIN</h1>



<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Company</th>
            <th>Description</th>
            <th>Salary</th>
            <th>Location</th>
        </tr>
    </thead>

    <tbody>

        <?php get_jobs_in_user_admin(); ?>

    </tbody>

</table>







<?php include "footer.php"; ?>