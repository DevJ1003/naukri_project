<?php include "includes/header.php";

if (isset($_GET['id'])) {

    $jobs_data_query = query("SELECT * FROM jobs WHERE id =" . escape_string($_GET['id']));
    confirm($jobs_data_query);

    while ($row = fetch_array($jobs_data_query)) {

        /* JOB DATA */
        $title        = escape_string($row['title']);
        $description  = escape_string($row['description']);
        $vacancy      = escape_string($row['vacancy']);
        $nature       = escape_string($row['nature']);
        $knowledge    = escape_string($row['knowledge']);
        $skills       = escape_string($row['skills']);
        $education    = escape_string($row['education']);
        $experience   = escape_string($row['experience']);
        $salary       = escape_string($row['salary']);
        $location     = escape_string($row['location']);
        $posted_on    = escape_string($row['created_at']);



        /* COMPANY DATA */
        $company_name = escape_string($row['company_name']);
        $company_data_query = query("SELECT * FROM users WHERE username = '{$company_name}' ");
        confirm($company_data_query);

        while ($row = fetch_array($company_data_query)) {

            $company_id = $row['user_id'];
            $company_description = $row['description'];
            $company_image = $row['image'];
            $company_email = $row['email'];
        }
    }
}


?>





<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2><i class="fas fa-briefcase" style="font-size:240px;"></i> VIEW JOB...!!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Hero Area End -->


<!-- job post company Start -->
<div class="job-post-company pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Left Content -->
            <div class="col-xl-7 col-lg-8">
                <!-- job single -->
                <div class="single-job-items mb-50">
                    <div class="job-items">
                        <div class="company-img company-img-details">
                            <a href="company_details.php?id=<?php echo $company_id; ?>"><img width="100" src="images/<?php echo $company_image; ?>" alt=""></a>
                        </div>
                        <div class="job-tittle">
                            <h4><?php echo $title; ?></h4>
                            <ul>
                                <li><i class="fas fa-user"></i><?php echo $company_name; ?></li>
                                <li><i class="fas fa-map-marker-alt"></i><?php echo $location; ?></li>
                                <li>&#8377; <?php echo $salary; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- job single End -->

                <div class="job-post-details">
                    <div class="post-details1 mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4><i class="far fa-newspaper" style="font-size: 30px;"></i> Job Description</h4>
                        </div>
                        <p><?php echo $description; ?></p>
                    </div>
                    <div class="post-details2  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4><i class="far fa-list-alt" style="font-size: 30px;"></i> Required Knowledge, Skills and Abilities</h4>
                        </div>
                        <ul>
                            <li><?php echo $knowledge; ?></li>
                            <li><?php echo $skills; ?></li>
                        </ul>
                    </div>
                    <div class="post-details2  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4><i class="fas fa-graduation-cap" style="font-size: 30px;"></i> Education + Experience</h4>
                        </div>
                        <ul>
                            <li><?php echo $education; ?></li>
                            <li><?php echo $experience; ?></li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- Right Content -->
            <div class="col-xl-4 col-lg-4">
                <div class="post-details3  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4><i class="fas fa-chart-line" style="font-size: 40px;"></i> JOB OVERVIEW...!!</h4>
                    </div>
                    <ul>
                        <li>Posted date : <span><?php echo $posted_on; ?></span></li>
                        <li>Location : <span><?php echo $location; ?></span></li>
                        <li>Vacancy : <span><?php echo $vacancy; ?></span></li>
                        <li>Job nature : <span><?php echo $nature; ?></span></li>
                        <li>Salary : <span>&#8377; <?php echo $salary; ?> yearly</span></li>
                    </ul>

                    <?php

                    apply_button_in_job_details();

                    apply_button_retrieve_button();

                    ?>

                </div>
                <div class="post-details3  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4><i class="fas fa-industry" style="font-size: 40px;"></i> COMPANY OVERVIEW...!!</h4>
                    </div>
                    <span><?php echo $company_name; ?></span>
                    <p><?php echo $company_description; ?></p>
                    <ul>
                        <li><i class="fas fa-archive" style="font-size: 25px;"></i> <span><?php echo $company_name; ?></span></li>
                        <li><i class="fas fa-desktop" style="font-size: 25px;"></i> <span> www.<?php echo $company_name; ?>.com</span></li>
                        <li><i class="far fa-envelope" style="font-size: 25px;"></i> <span><?php echo $company_email; ?></span></li>
                        <li>
                            <!-- <div class="company-details">
                                <a href="company_details.php?id=<?php //echo $company_id; 
                                                                ?>"><button name="company_details" type="submit" class="btn head-btn1">View</button></a>
                            </div> -->

                            <?php view_button_job_details(); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job post company End -->

</main>

<?php include "includes/footer.php"; ?>