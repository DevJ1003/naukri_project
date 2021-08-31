<?php include "includes/admin_header.php"; ?>

<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="../assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Welcome to <?php echo $_SESSION['username'] ?>'s Admin page !</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->

    <div class="container">
        <table class="table">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Description</th>
                    <th>Salary</th>
                    <th>Location</th>
                    <th>Posted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php get_jobs_company_admin(); ?>
            </tbody>



        </table>
    </div>

</main>

<?php include "includes/admin_footer.php"; ?>