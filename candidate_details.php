<?php include "includes/header.php";


/* GET CANDIDATE DETAILS QUERY */
if (isset($_GET['id'])) {

    $query = query("SELECT * FROM users WHERE user_id =" . escape_string($_GET['id']));
    confirm($query);

    while ($row = fetch_array($query)) {

        $candidate_id = escape_string($row['user_id']);
        $candidate_name = escape_string($row['username']);
    }

    $details_query = query("SELECT * FROM candidate WHERE name = '{$candidate_name}' ");
    confirm($details_query);

    while ($row = fetch_array($details_query)) {

        $candidate_description = $row['description'];
        $candidate_cv          = $row['cv'];
        $candidate_knowledge   = $row['knowledge'];
        $candidate_skills      = $row['skills'];
        $candidate_education   = $row['education'];
        $candidate_experience  = $row['experience'];
        $candidate_image       = $row['image'];
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
                        <h2><i class="fas fa-address-card" style="font-size: 240px;"></i> Candidate's Details Page...!!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Hero Area End -->

<h4 class="text-center bg-info"><?php display_message(); ?></h4>

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
                            <a href="candidate_details.php?id=<?php echo $candidate_id; ?>"><img width="100" src="images/<?php echo $candidate_image; ?>" alt=""></a>
                        </div>
                        <div class="job-tittle">
                            <h1><?php echo $candidate_name; ?></h1>
                            <ul>
                                <li><i class="fas fa-clock"></i>Experience : <?php echo $candidate_experience; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- job single End -->

                <div class="job-post-details">

                    <div class=" post-details mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4><i class="fas fa-newspaper" style="font-size: 30px;"></i> Candidate Description</h4>
                        </div>
                        <p><?php echo $candidate_description; ?></p>
                    </div>
                </div>

                <div class="post-details  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4><i class="far fa-list-alt" style="font-size: 30px;"></i> Knowledgable to...</h4>
                    </div>
                    <ul>
                        <?php echo $candidate_knowledge; ?>
                    </ul>
                </div>

                <div class="post-details  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4><i class="fas fa-user-plus" style="font-size: 30px;"></i> Skills</h4>
                    </div>
                    <ul>
                        <?php echo $candidate_skills; ?>
                    </ul>
                </div>

                <div class="post-details  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4><i class="fas fa-graduation-cap" style="font-size: 30px;"></i> Education</h4>
                    </div>
                    <ul>
                        <?php echo $candidate_education; ?>
                    </ul>
                </div>

            </div>


            <!-- Right Content -->
            <div class="col-xl-4 col-lg-4">
                <div class="post-details3  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4><i class="fas fa-address-card" style="font-size: 40px;"></i> CANDIDATE OVERVIEW...!!</h4>
                    </div>
                    <ul>
                        <li><span>This is the official candidate account of <?php echo $candidate_name; ?> on nAukri.com .
                                I have persued <?php echo $candidate_education; ?> , so I am knowledgable to <?php echo $candidate_knowledge; ?>
                                and i also know <?php echo $candidate_skills; ?> , I have a experience of about <?php echo $candidate_experience; ?> .
                                Please find my Resume attached under .</span></li>
                    </ul>

                    <?php job_detail_page_link(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- job post company End -->
</main>

<?php include "includes/footer_short.php"; ?>