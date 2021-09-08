<?php include "includes/header.php"; ?>


<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2><i class="fas fa-building" style="font-size:240px;"></i> All Companies...!!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Hero Area End -->

<div class="container">
    <h4 class="text-center bg-info"><?php display_message(); ?></h4>

    <!-- TABLE DATA -->
    <table class="table" style="min-height: 500px;">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Description</th>
                <th>Status</th>
                <th>Update</th>
                <th>View Company</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php get_all_companies(); ?>
        </tbody>
    </table>
</div>
<br>

<?php include "includes/footer.php"; ?>