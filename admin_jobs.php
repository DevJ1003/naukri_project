<?php include "includes/header.php"; ?>


<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2><i class="fas fa-briefcase" style="font-size:240px;"></i> All Jobs...!!</h2>
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
        Jobs posted by all companies...!!
    </h1>
    <h4 class="text-center bg-info"><?php display_message(); ?></h4>
    <br>

    <table class="table" style="min-height: 400px;">

        <thead>
            <tr>
                <th>Id</th>
                <th>Job Title</th>
                <th>Description</th>
                <th>Company Name</th>
                <th>Status</th>
                <th>View Job</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php get_jobs_site_admin(); ?>
        </tbody>
    </table>
</div>
<br>

<?php include "includes/footer.php"; ?>