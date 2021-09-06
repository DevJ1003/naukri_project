<?php include "includes/header.php"; ?>

<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2><i class="fas fa-briefcase" style="font-size:240px;"></i> Find your job</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->










    <!-- Job List Area Start -->
    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <div class="row">

                <!-- Right content -->
                <div class="col-xl-9 col-lg-9 col-md-8">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="container">


                            <!-- Count of Job list Start -->
                            <div class="row">
                                <div class="col-lg-12">
                                    Total <?php count_jobs(); ?> Jobs found!
                                </div>
                            </div>
                            <!-- Count of Job list End -->

                            <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Description</th>
                                        <th>Salary</th>
                                        <th>Location</th>
                                        <th>Posted At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php get_jobs(); ?>

                                </tbody>
                            </table>
                        </div>
                    </section>
                    <!-- Featured_job_end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Job List Area End -->

</main>

<?php include "includes/footer.php"; ?>