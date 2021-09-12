<?php include "includes/admin_header.php";


/* GET JOB DATA-UPDATING JOB DATA QUERY */
if (isset($_GET['id'])) {

    $query = query("SELECT * FROM jobs WHERE id =" . escape_string($_GET['id']));
    confirm($query);

    while ($row = fetch_array($query)) {
        $title       = escape_string($row['title']);
        $description = escape_string($row['description']);
        $vacancy     = escape_string($row['vacancy']);
        $nature      = escape_string($row['nature']);
        $knowledge   = escape_string($row['knowledge']);
        $skills      = escape_string($row['skills']);
        $education   = escape_string($row['education']);
        $experience  = escape_string($row['experience']);
        $salary      = escape_string($row['salary']);
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

            <div class="form-group">
                <label for="job-vacancy">VACANCY</label>
                <input type="text" name="job_vacancy" class="form-control" required data-validation-required-message="Please Enter" value="<?php echo $vacancy; ?>">
            </div>

            <div class="form-group">
                <label for="job-nature">NATURE</label>
                <input type="text" name="job_nature" class="form-control" required data-validation-required-message="Please Enter" value="<?php echo $nature; ?>">
            </div>

            <div class="form-group">
                <label for="job-knowledge">KNOWLEDGE</label>
                <input type="text" name="job_knowledge" class="form-control" required data-validation-required-message="Please Enter" value="<?php echo $knowledge; ?>">
            </div>


            <div class="form-group">
                <label for="job-skills">SKILLS</label>
                <input type="text" name="job_skills" class="form-control" required data-validation-required-message="Please Enter" value="<?php echo $skills; ?>">
            </div>

            <div class="form-group">
                <label for="job-education">EDUCATION</label>
                <input type="text" name="job_education" class="form-control" required data-validation-required-message="Please Enter" value="<?php echo $education; ?>">
            </div>

            <div class="form-group">
                <label for="job-experience">EXPERIENCE</label>
                <input type="text" name="job_experience" class="form-control" required data-validation-required-message="Please Enter" value="<?php echo $experience; ?>">
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