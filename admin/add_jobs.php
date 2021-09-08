<?php include "includes/admin_header.php"; ?>

<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="../assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2><i class="fa fa-fw fa-table" style="font-size:240px;"></i>Add Jobs +</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Hero Area End -->


<div id="page-wrapper" style="text-align: -webkit-center;">

    <h1 class="page-header"><i class="fa fa-fw fa-table"></i>
        Add New Job...!!
    </h1>
    <h4 class="text-center bg-info"><?php display_message(); ?></h4>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <?php add_jobs();
        ?>
        <div class="col-md-8">
            <div class="form-group">
                <label for="job-title">TITLE</label>
                <input type="text" name="job_title" class="form-control" required data-validation-required-message="Please Enter">
            </div>

            <div class="form-group">
                <label for="job-description">DESCRIPTION</label>
                <textarea type="text" name="job_description" id="" cols="30" rows="10" class="form-control" required data-validation-required-message="Please Enter"></textarea>
            </div>

            <div class="form-group">
                <label for="job-vacancy">VACANCY</label>
                <input type="text" name="job_vacancy" class="form-control" required data-validation-required-message="Please Enter">
            </div>

            <div class="form-group">
                <label for="job-nature">NATURE</label>
                <input type="text" name="job_nature" class="form-control" required data-validation-required-message="Please Enter">
            </div>

            <div class="form-group">
                <label for="job-knowledge">KNOWLEDGE</label>
                <input type="text" name="job_knowledge" class="form-control" required data-validation-required-message="Please Enter">
            </div>


            <div class="form-group">
                <label for="job-skills">SKILLS</label>
                <input type="text" name="job_skills" class="form-control" required data-validation-required-message="Please Enter">
            </div>

            <div class="form-group">
                <label for="job-education">EDUCATION</label>
                <input type="text" name="job_education" class="form-control" required data-validation-required-message="Please Enter">
            </div>

            <div class="form-group">
                <label for="job-experience">EXPERIENCE</label>
                <input type="text" name="job_experience" class="form-control" required data-validation-required-message="Please Enter">
            </div>

            <div class="form-group">
                <label for="job-salary">SALARY ( &#8377; )</label>
                <input type="text" name="job_salary" class="form-control" required data-validation-required-message="Please Enter">
            </div>

            <div class="form-group">
                <label for="job-location">LOCATION</label>
                <input type="text" name="job_location" class="form-control" required data-validation-required-message="Please Enter"></input>
            </div>

            <div class="form-group">
                <button name="submit" type="submit" class="btn head-btn2">Add New Job <span class="glyphicon glyphicon-ok"></span></button>
            </div>

        </div>

        <!--Main Content-->

    </form>
</div>
<!-- /#page-wrapper -->
<br>

<?php include "includes/admin_footer.php"; ?>