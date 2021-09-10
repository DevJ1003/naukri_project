<?php include "includes/header.php";


/* MESSAGE CANDIDATE QUERY */
// if (isset($_GET['id'])) {

//     $query = query("SELECT * FROM users WHERE user_id =" . escape_string($_GET['id']));
//     confirm($query);

//     while ($row = fetch_array($query)) {

//         $candidate_id = escape_string($row['user_id']);
//         $candidate_name = escape_string($row['username']);
//     }

//     $details_query = query("SELECT * FROM candidate WHERE name = '{$candidate_name}' ");
//     confirm($details_query);

//     while ($row = fetch_array($details_query)) {

//         $candidate_description = $row['description'];
//         $candidate_cv          = $row['cv'];
//         $candidate_knowledge   = $row['knowledge'];
//         $candidate_skills      = $row['skills'];
//         $candidate_education   = $row['education'];
//         $candidate_experience  = $row['experience'];
//         $candidate_image       = $row['image'];
//     }
// }

?>

<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2><i class="far fa-paper-plane" style="font-size:240px;"></i> Message Candidate...!!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Hero Area End -->

<!-- ================ CONTACT SECTION START ================= -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="contact-title">For any query , message candidate !</h2>
            <h4 class="text-center bg-info"><?php display_message(); ?></h4>
        </div>

        <div class="col-lg-8">
            <form name="sentMessage" method="post" id="contact" enctype="multipart/form-data">
                <?php send_message_candidate(); ?>
                <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" cols="30" rows="9" placeholder=" Enter message" required data-validation-required-message="Please enter your message"></textarea>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name" required data-validation-required-message="Please enter your name">
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" name="email" id="email" type="email" placeholder="Enter candidate's email" required data-validation-required-message="Please enter your email">
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter subject" required data-validation-required-message="Please enter your subject">
                        </div>
                    </div>

                    <div class="col-lg-12 text-center">
                        <button name="submit" type="submit" class="button button-contactForm boxed-btn btn head-btn2">Send</button>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
<br>
<!-- ================ CONTACT SECTION END ================= -->

<?php include "includes/footer_short.php"; ?>