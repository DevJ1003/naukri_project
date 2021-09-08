<?php include "includes/admin_header.php"; ?>

<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="../assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2><i class="fas fa-user" style="font-size: 100px;"></i> Welcome to <?php echo $_SESSION['username'] ?>'s Admin page !</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Hero Area End -->

<div class="container">
    <h1 class="page-header text-center"><i class="fa fa-fw fa-table"></i>
        Your Applied Jobs...!!
    </h1>
    <h4 class="text-center bg-info"><?php display_message(); ?></h4>

    <table class="table" style="min-height: 400px;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Company</th>
                <th>Description</th>
                <th>(&#8377;)Salary</th>
                <th>Location</th>
                <th>Posted At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php get_jobs_candidate_admin(); ?>
        </tbody>
    </table>
</div>
<br>

<?php include "includes/admin_footer.php"; ?>