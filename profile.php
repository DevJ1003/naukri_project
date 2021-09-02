<?php include "includes/header.php";

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

    $query = query("SELECT * FROM users WHERE username = '{$username}' ");
    confirm($query);

    while ($row = fetch_array($query)) {

        $username    = $row['username'];
        $description = $row['description'];
        $capacity    = $row['capacity'];
        $location    = $row['location'];
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
        <?php update_profile(); ?>

        <div class="col-md-6">

            <div class="form-group">
                <label for="job-description">DESCRIPTION</label>
                <textarea type="text" name="company_description" id="" cols="30" rows="10" class="form-control"><?php echo $description; ?></textarea>
            </div>

            <div class=" form-group">
                <label for="job-salary">EMPLOYEES</label>
                <input type="text" name="company_employees" class="form-control" value="<?php echo $capacity; ?>">
            </div>

            <div class="form-group">
                <label for="image">LOGO</label>
                <input type="file" name="file"><br>
                <img width="100" src="images/<?php echo $image; ?>" alt="">
            </div>

            <div class="form-group">
                <label for="job-location">ADDRESS</label>
                <input type="text" name="company_location" class="form-control" value="<?php echo $location; ?>"></input>
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