<?php include "includes/admin_header.php"; ?>


<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="../assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2><i class="fas fa-user" style="font-size:100px;"></i> nAukri.com all data...!!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Hero Area End -->

<div class="container">
    <br>


    <!-- Right Content -->
    <div class="col-xl-12 col-lg-2">
        <div class="post-details3  mb-10">
            <!-- Small Section Tittle -->
            <div class="small-section-tittle">
                <h4 class="text-center"><i class="far fa-list-alt" style="font-size: 40px;"></i> ALL DATA...!!</h4>
            </div>
            <hr>
            <ul>
                <li><i class="fas fa-briefcase" style="font-size: 80px;"></i>
                    TOTAL JOBS POSTED ===============================================> <?php count_jobs(); ?> Jobs !<div class="text-center">
                        <div class="header-btn d-none f-center d-lg-block">
                            <p><a href="../admin_jobs.php" class="btn border-btn head-btn1">View All Jobs !</a></p>
                        </div>
                    </div>
                </li>
                <hr>
                <li><i class="fas fa-building" style="font-size: 80px;"></i>
                    TOTAL COMPANIES REGISTERED ======================================> <?php count_companies(); ?> Companies !<div class="text-center">
                        <div class="header-btn d-none f-center d-lg-block">
                            <p><a href="../admin_companies.php" class="btn border-btn head-btn1">View All Companies !</a></p>
                        </div>
                    </div>
                </li>
                <hr>
                <li><i class="fas fa-address-card" style="font-size: 80px;"></i>
                    TOTAL CANDIDATES REGISTERED =====================================> <?php count_candidates(); ?> Candidates !<div class="text-center">
                        <div class="header-btn d-none f-center d-lg-block">
                            <p><a href="../admin_candidates.php" class="btn border-btn head-btn1">View All Candidates !</a></p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>


</div>
<br>

<?php include "includes/admin_footer.php"; ?>