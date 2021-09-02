<?php include "includes/admin_header.php";

if (isset($_GET['id'])) {

    $query = query("SELECT * FROM jobs WHERE id =" . escape_string($_GET['id']));
    confirm($query);

    while ($row = fetch_array($query)) {

        $company_name = $_SESSION['username'];
        $title       = escape_string($row['title']);
        $description = escape_string($row['description']);
        $salary      = escape_string($row['salary']);
        $location    = escape_string($row['location']);
        $posted_on   = escape_string($row['created_at']);
    }
}

?>


<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="../assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2><i class="fa fa-fw fa-table" style="font-size:240px;"></i>VIEW JOB !</h2>
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
                            <a href="#"><img src="../assets/img/icon/job-list1.png" alt=""></a>
                        </div>
                        <div class="job-tittle">
                            <a href="#">
                                <h4><?php echo $title; ?></h4>
                            </a>
                            <ul>
                                <li><?php echo $company_name; ?></li>
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
                            <h4>Job Description</h4>
                        </div>
                        <p><?php echo $description; ?></p>
                    </div>
                    <div class="post-details2  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Required Knowledge, Skills, and Abilities</h4>
                        </div>
                        <ul>
                            <li>System Software Development</li>
                            <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                            <li>Research and code , libraries, APIs and frameworks</li>
                            <li>Strong knowledge on software development life cycle</li>
                            <li>Strong problem solving and debugging skills</li>
                        </ul>
                    </div>
                    <div class="post-details2  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Education + Experience</h4>
                        </div>
                        <ul>
                            <li>3 or more years of professional design experience</li>
                            <li>Direct response email experience</li>
                            <li>Ecommerce website design experience</li>
                            <li>Familiarity with mobile and web apps preferred</li>
                            <li>Experience using Invision a plus</li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- Right Content -->
            <div class="col-xl-4 col-lg-4">
                <div class="post-details3  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4>JOB OVERVIEW</h4>
                    </div>
                    <ul>
                        <li>Posted date : <span><?php echo $posted_on; ?></span></li>
                        <li>Location : <span><?php echo $location; ?></span></li>
                        <li>Vacancy : <span>02</span></li>
                        <li>Job nature : <span>Full time</span></li>
                        <li>Salary : <span>&#8377; <?php echo $salary; ?> yearly</span></li>
                    </ul>
                    <div class="apply-btn2">
                        <a href="#" class="btn">Apply Now</a>
                    </div>
                </div>
                <div class="post-details4  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4>Company Information</h4>
                    </div>
                    <span>Colorlib</span>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <ul>
                        <li>Name: <span>Colorlib </span></li>
                        <li>Web : <span> colorlib.com</span></li>
                        <li>Email: <span>carrier.colorlib@gmail.com</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job post company End -->

</main>

<?php include "includes/admin_footer.php"; ?>