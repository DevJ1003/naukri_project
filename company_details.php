<?php include "includes/header.php";


/* GET COMPANY DETAILS QUERY */
if (isset($_GET['id'])) {

    $query = query("SELECT * FROM users WHERE user_id =" . escape_string($_GET['id']));
    confirm($query);

    while ($row = fetch_array($query)) {

        $company_id        = escape_string($row['user_id']);
        $company_name = escape_string($row['username']);
        $company_description = $row['description'];
        $company_location = $row['location'];
        $company_capacity = $row['capacity'];
        $company_image = $row['image'];
        $company_email = $row['email'];
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
                        <h2><i class="fas fa-building" style="font-size: 240px;"></i> A warm welcome to <?php echo $company_name; ?>'s official Account...!!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Hero Area End -->

<?php display_message(); ?>

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
                            <h1><?php echo $company_name; ?></h1>
                            <ul>
                                <li><i class="fas fa-users"></i><?php echo $company_capacity; ?> employees working !</li>
                                <li><i class="fas fa-map-marker-alt"></i><?php echo $company_location; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- job single End -->

                <div class="job-post-details">
                    <div class=" post-details1 mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4><i class="fas fa-newspaper" style="font-size: 30px;"></i> Company Description</h4>
                        </div>
                        <p><?php echo $company_description; ?></p>
                    </div>
                </div>

                <div class="post-details2  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4><i class="far fa-list-alt" style="font-size: 30px;"></i> All jobs posted by <?php echo $company_name; ?> are :</h4>
                    </div>
                    <ul>
                        <?php job_company_details(); ?>
                    </ul>
                </div>
            </div>


            <!-- Right Content -->
            <div class="col-xl-4 col-lg-4">
                <div class="post-details3  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4><i class="far fa-address-card" style="font-size: 40px;"></i> COMPANY OVERVIEW...!!</h4>
                    </div>
                    <ul>
                        <li><span>This is the official company account of <?php echo $company_name; ?> on nAukri.com , here we provide internships
                                and jobs to the candidates who are suitable for our company and clear all our filters . The candidate has
                                to apply for the job he/she is intrested in and if candidate's profile is selected , our team will connect
                                to the candidate .</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job post company End -->
</main>

<?php include "includes/footer_short.php"; ?>