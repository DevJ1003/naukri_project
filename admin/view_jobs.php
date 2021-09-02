<?php include "includes/admin_header.php";

if (isset($_GET['id'])) {

    $query = query("SELECT * FROM jobs WHERE id =" . escape_string($_GET['id']));
    confirm($query);

    while ($row = fetch_array($query)) {
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


<div id="page-wrapper" style="text-align: -webkit-center;">

    <!-- <h1 class="page-header"><i class="fa fa-fw fa-table"></i>
        Edit Job...!!
    </h1> -->


    <div class="col-md-9">

        <div class="row justify-content-center">
            <div class="col-xl-10">
                <!-- single-job-content -->
                <div class="single-job-items mb-30">
                    <div class="job-items">
                        <div class="company-img">
                            <a href="job_details.php"><img src="assets/img/icon/job-list1.png" alt=""></a>
                        </div>
                        <div class="job-tittle">
                            <a href="job_details.php">
                                <h4>Digital Marketer</h4>
                            </a>
                            <ul>
                                <li>Creative Agency</li>
                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                <li>$3500 - $4000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="items-link f-right">
                        <a href="job_details.php">Full Time</a>
                        <span>7 hours ago</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <div class="media-body">
        <h1>" DESCRIPTION "</h1>
        <h5><?php echo $description; ?></h5>
    </div>

    <hr>

    <div class="media-body">
        <h1>"(&#8377;)SALARY "</h1>
        <h5>&#8377; <?php echo $salary; ?> / month</h5>
    </div>

    <hr>

    <div class="media-body">
        <h1>" LOCATION "</h1>
        <h5><?php echo $location; ?></h5>
    </div>

    <hr>

    <div class="media-body">
        <h1>" POSTED ON "</h1>
        <h5><?php echo $posted_on; ?></h5>
    </div>

</div>
<!--Main Content-->
</div>
<!-- /#page-wrapper -->
<br>

<?php include "includes/admin_footer.php"; ?>