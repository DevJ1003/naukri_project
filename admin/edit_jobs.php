<?php include "includes/admin_header.php";

if (isset($_GET['id'])) {

    $query = query("SELECT * FROM jobs WHERE id =" . escape_string($_GET['id']));
    confirm($query);

    while ($row = fetch_array($query)) {
        $title       = escape_string($row['title']);
        $description = escape_string($row['description']);
        $salary        = escape_string($row['salary']);
        $location    = escape_string($row['location']);
    }

    update_jobs();
}

?>



<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="../assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2><i class="fas fa-briefcase" style="font-size:240px;"></i> UPDATE JOB !</h2>
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

    <form action="" method="post" enctype="multipart/form-data">

        <div class="col-md-6">
            <div class="form-group">
                <label for="job-title">TITLE</label>
                <input type="text" name="job_title" class="form-control" value="<?php echo $title; ?>">
            </div>

            <div class="form-group">
                <label for="job-description">DESCRIPTION</label>
                <textarea type="text" name="job_description" id="" cols="30" rows="10" class="form-control"><?php echo $description; ?></textarea>
            </div>

            <div class=" form-group">
                <label for="job-salary">SALARY ( &#8377; )</label>
                <input type="text" name="job_salary" class="form-control" value="<?php echo $salary; ?>">
            </div>

            <div class="form-group">
                <label for="job-location">LOCATION</label>
                <input type="text" name="job_location" class="form-control" value="<?php echo $location; ?>"></input>
            </div>

            <div class="form-group">
                <button name="update" type="submit" class="btn head-btn2">Update<span class="glyphicon glyphicon-ok"></span></button>
            </div>

        </div>
        <!--Main Content-->
    </form>
</div>
<!-- /#page-wrapper -->
<br>

<?php include "includes/admin_footer.php"; ?>