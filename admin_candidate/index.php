<?php include "../includes/header.php"; ?>


<h1 class="text-center" style="text-align: center;">User ADMIN</h1>
<ul class="nav navbar-right top-nav">
    <a class="navbar-brand" href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
</ul>


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







<?php include "../includes/footer.php"; ?>