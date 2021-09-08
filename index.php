<?php include "includes/header.php"; ?>

<main>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h1>Find the most exciting jobs according to your skills.</h1>
                            </div>
                        </div>
                    </div>

                    <?php login_find_add_job_link(); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <?php include "navigation/categories.php";

    include "navigation/featured_job.php";

    include "navigation/bottom_navigation.php"; ?>

    <!-- main tag end -->
</main>

<?php include "includes/footer.php"; ?>