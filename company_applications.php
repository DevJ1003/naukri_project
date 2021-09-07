<?php include "includes/header.php"; ?>


<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2><i class="fas fa-bell" style="font-size: 240px;"></i> Job Applications Received !</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Hero Area End -->

<div class="container">


    <!-- TABLE -->
    <table class="table">
        <!-- <table class="table" style="min-height: 400px;"> -->

        <thead>
            <tr>
                <!-- <th>Id</th> -->
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>(&#8377;)Salary</th>
                <th>Location</th>
                <th>Applied At</th>
                <th>View Candidate</th>
                <th>View Job</th>
            </tr>
        </thead>
        <tbody>
            <?php get_applied_jobs_company_admin(); ?>
        </tbody>
    </table>
</div>
<br>

<?php include "includes/footer_short.php"; ?>