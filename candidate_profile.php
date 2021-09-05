<?php include "includes/header.php";

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

    $query = query("SELECT * FROM candidate WHERE name = '{$username}' ");
    confirm($query);

    while ($row = fetch_array($query)) {

        $description = $row['description'];
        $cv          = $row['cv'];
        $knowledge   = $row['knowledge'];
        $skills      = $row['skills'];
        $education   = $row['education'];
        $experience  = $row['experience'];
        $image       = $row['image'];
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
                        <h2><i class="fa fa-fw fa-table" style="font-size:240px;"></i><?php echo $_SESSION['username']; ?>'s Profile...!!</h2>
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
        Your Profile...!!
    </h1>

    <form action="" method="post" enctype="multipart/form-data">
        <?php create_candidate_profile(); ?>

        <div class="col-md-6">

            <div class="form-group">
                <label for="candidate-description">DESCRIPTION</label>
                <textarea type="text" name="candidate_description" id="" cols="30" rows="10" class="form-control"><?php echo $description; ?></textarea>
            </div>

            <div class="form-group">
                <label for="cv">CV</label>
                <input type="file" name="pdf"><br>
                <img width="100" src="candidate_cv/<?php echo $cv; ?>" alt="">
            </div>

            <div class=" form-group">
                <label for="candidate-knowledge">KNOWLEDGE</label>
                <input type="text" name="candidate_knowledge" class="form-control" value="<?php echo $knowledge; ?>">
            </div>

            <div class=" form-group">
                <label for="candidate-skills">SKILLS</label>
                <input type="text" name="candidate_skills" class="form-control" value="<?php echo $skills; ?>">
            </div>

            <div class=" form-group">
                <label for="candidate-education">EDUCATION</label>
                <input type="text" name="candidate_education" class="form-control" value="<?php echo $education; ?>">
            </div>

            <div class=" form-group">
                <label for="candidate-experience">EXPERIENCE</label>
                <input type="text" name="candidate_experience" class="form-control" value="<?php echo $experience; ?>">
            </div>



            <div class="form-group">
                <label for="image">IMAGE</label>
                <input type="file" name="file"><br>
                <img width="100" src="images/<?php echo $image; ?>" alt="">
            </div>

            <div class="form-group">
                <button name="update" type="submit" class="btn head-btn2">Complete<span class="glyphicon glyphicon-ok"></span></button>
            </div>

        </div>
        <!--Main Content-->
    </form>
</div>
<!-- /#page-wrapper -->
<br>

<?php include "includes/footer.php"; ?>