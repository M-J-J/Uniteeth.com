<?php require_once 'controllerUserData.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="description" content="">

    <title>Uniteeth Dental Clinic</title>
    <?php include_once './includes/head.php'; ?>

</head>

<body>
    <!--navigation section-->
    <section class="cid-suZrAiMP24">
        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
            <div class="container">
                <?php include_once './includes/navi.php'; ?>
            </div>
        </nav>
    </section>
    <!--Welcome Landing image section-->
    <section class="cid-suVDrcaHaz mbr-parallax-background">
        <div class="mbr-overlay" style="background-color:#6592e6; opacity:.5;">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="card col-12 col-lg-10">
                    <div class="card-wrapper">
                        <div class="card-box align-center">
                            <h4 class="card-title mbr-fonts-style align-center mb-4 display-1"><strong>Uniteeth Dental Clinic</strong></h4>
                            <?php if (isset($_SESSION['email']) && $_SESSION['role'] == 3 && $_SESSION['status'] == 'verified' && $_SESSION['code'] == 0) : ?>
                                <p class="mbr-text mbr-fonts-style mb-4 display-7">You can now create your appointment. click the button below.</p>
                                <div class="mbr-section-btn mt-3">
                                    <a class="btn btn-warning display-4" href="./appointment.php">Set Appointment</a>
                                </div>
                            <?php elseif (isset($_SESSION['email']) && $_SESSION['role'] == 2 && $_SESSION['status'] == 'verified' && $_SESSION['code'] == 0) : ?>
                                <div class="mbr-section-btn mt-3">
                                    <a class="btn btn-warning display-4" href="./appointment.php">Dashboard</a>
                                </div>
                            <?php elseif (isset($_SESSION['email']) && $_SESSION['role'] == 1 && $_SESSION['status'] == 'verified' && $_SESSION['code'] == 0) : ?>
                                <div class="mbr-section-btn mt-3">
                                    <a class="btn btn-warning display-4" href="./appointment.php">Dashboard</a>
                                </div>
                            <?php elseif (isset($_SESSION['email']) && $_SESSION['role'] == 0 && $_SESSION['status'] == 'verified' && $_SESSION['code'] == 0) : ?>
                                <div class="mbr-section-btn mt-3">
                                    <a class="btn btn-warning display-4" href="./appointment.php">Dashboard</a>
                                </div>
                            <?php else : ?>
                                <p class="mbr-text mbr-fonts-style mb-4 display-7">Create your account just click the register button.</p>
                                <div class="mbr-section-btn mt-5">
                                    <a class="btn btn-warning display-4" href="./register.php">Register</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--UDC Vision mission section-->
    <section class="cid-suVBakSLIg mbr-fullscreen">
        <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(255, 255, 255);"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-5 pr-lg-5">
                    <div class="img-fluid">
                        <img src="./assets/images/img5.jpeg" alt="images">
                    </div>
                </div>
                <div class="col-md-5 pr-lg-5 ml-auto ">
                    <div class="text-wrapper">
                        <h2 class="mbr-section-title mbr-fonts-style mb-3  display-4"><strong><span class="lighten">U</span>niteeth <span class="lighten">D</span>ental <span class="lighten">C</span>linic</strong></h2>
                        <p class="mbr-text mbr-fonts-style display-7"><strong><em>Vision</em></strong>
                            <br>
                            <br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam veniam, labore, doloremque odio necessitatibus ut architecto expedita accusamus inventore eum dolorem quam, magnam natus? Labore ex fugit vero culpa necessitatibus.
                            <br>
                            <br><em><strong>Mission</strong>
                            </em><br>
                            <br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam veniam, labore, doloremque odio necessitatibus ut architecto expedita accusamus inventore eum dolorem quam, magnam natus? Labore ex fugit vero culpa necessitatibus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Activity section-->
    <section class="carousel slide testimonials-slider cid-sw4SAmjSC0" data-interval="false">
        <div class="text-center container">
            <h2 class="mb-4 mbr-fonts-style">
                <strong><span class="lighten">O</span>ur <span class="lighten">A</span>ctivities</strong>
            </h2>
            <div class="carousel slide" role="listbox" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="6000">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <div class="user col-md-8">
                            <div class="user_image">
                                <img src="./assets/images/img1.jpg">
                            </div>
                            <div class="user_text mb-4">
                                <p class="mbr-fonts-style display-7">
                                    This is paragraph. it can contains any caption for the photos.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam ipsam obcaecati rem reiciendis accusantium provident laboriosam! Consequuntur sit ratione perferendis quae numquam ullam sunt voluptatibus minus cupiditate molestiae. Laboriosam, sint?
                                </p>
                            </div>
                            <div class="user_name mbr-fonts-style mb-2 display-7">
                                <strong>This is the titleof the picture</strong>
                            </div>
                            <div class="user_desk mbr-fonts-style display-7">
                                Uniteeth Dental Clinic
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="user col-md-8">
                            <div class="user_image">
                                <img src="./assets/images/img2.jpg">
                            </div>
                            <div class="user_text mb-4">
                                <p class="mbr-fonts-style display-7">
                                    This is paragraph. it can contains any caption for the photos.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam ipsam obcaecati rem reiciendis accusantium provident laboriosam! Consequuntur sit ratione perferendis quae numquam ullam sunt voluptatibus minus cupiditate molestiae. Laboriosam, sint?
                                </p>
                            </div>
                            <div class="user_name mbr-fonts-style mb-2 display-7">
                                <strong>This is the titleof the picture</strong>
                            </div>
                            <div class="user_desk mbr-fonts-style display-7">
                                Uniteeth Dental Clinic
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="user col-md-8">
                            <div class="user_image">
                                <img src="./assets/images/img3.jpg">
                            </div>
                            <div class="user_text mb-4">
                                <p class="mbr-fonts-style display-7">
                                    This is paragraph. it can contains any caption for the photos.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam ipsam obcaecati rem reiciendis accusantium provident laboriosam! Consequuntur sit ratione perferendis quae numquam ullam sunt voluptatibus minus cupiditate molestiae. Laboriosam, sint?
                                </p>
                            </div>
                            <div class="user_name mbr-fonts-style mb-2 display-7">
                                <strong>This is the titleof the picture</strong>
                            </div>
                            <div class="user_desk mbr-fonts-style display-7">
                                Uniteeth Dental Clinic
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="user col-md-8">
                            <div class="user_image">
                                <img src="./assets/images/img4.jpg">
                            </div>
                            <div class="user_text mb-4">
                                <p class="mbr-fonts-style display-7">
                                    This is paragraph. it can contains any caption for the photos.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam ipsam obcaecati rem reiciendis accusantium provident laboriosam! Consequuntur sit ratione perferendis quae numquam ullam sunt voluptatibus minus cupiditate molestiae. Laboriosam, sint?
                                </p>
                            </div>
                            <div class="user_name mbr-fonts-style mb-2 display-7">
                                <strong>This is the titleof the picture</strong>
                            </div>
                            <div class="user_desk mbr-fonts-style display-7">
                                Uniteeth Dental Clinic
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-controls">
                    <a class="carousel-control-prev" role="button" data-slide="prev">
                        <span aria-hidden="true" class="mobi-mbri mobi-mbri-arrow-prev mbr-iconfont"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" role="button" data-slide="next">
                        <span aria-hidden="true" class="mobi-mbri mobi-mbri-arrow-next mbr-iconfont"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--Contact , Clinic hours and google map section-->
    <section class="cid-suVoxlzjYs">
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="card col-12 col-md-6">
                    <div class="card-wrapper">
                        <div class="image-wrapper">
                            <span class="mbr-iconfont mbrib-mobile"></span>
                        </div>
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style mb-1">
                                <strong><span class="lighten">P</span>hone</strong>
                            </h6>
                            <p class="mbr-text mbr-fonts-style display-7"><strong>Globe/TM - +(63) 965-837-7801<br>Smart/Sun - +(63) 933-681-9245</strong></p>
                        </div>
                    </div>
                    <div class="card-wrapper">
                        <div class="image-wrapper">
                            <span class="mbr-iconfont mbrib-clock"></span>
                        </div>
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style mb-1">
                                <strong><span class="lighten">C</span>linic Hour</strong>
                            </h6>
                            <p class="mbr-text mbr-fonts-style display-7"><strong>Monday to Saturday 8:00 am - 5:00 pm<br>Sunday 8:00 am - 2:00 pm</strong></p>
                        </div>
                    </div>
                </div>
                <div class="map-wrapper col-12 col-md-6">
                    <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.5122319745733!2d120.3323011148074!3d16.03888738889971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33915db7497afc75%3A0xe7cf006197c841fe!2sUNITEETH%20DENTAL%20CLINIC!5e0!3m2!1sen!2sph!4v1618738841793!5m2!1sen!2sph" allowfullscreen=""></iframe></div>
                </div>
            </div>
        </div>
    </section>
    <!--The Dentist section-->
    <section class="cid-sw4ToBdDGf" id="Dentist">
        <div class="container">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                <strong><span class="lighten">T</span>he <span class="lighten">D</span>entist</strong>
            </h3>
            <div class="row justify-content-center">
                <div class="card col-12 col-md-6">
                    <p class="mbr-text mbr-fonts-style mb-4 display-7">General dentistry is the foundation of every dental practice. It primarily involves simple and inexpensive dental procedures that promote and maintain your oral hygiene and health</p>
                    <div class="d-flex mb-md-0 mb-4">
                        <div class="image-wrapper">
                            <img src="assets/images/team1.jpg" alt="images">
                        </div>
                        <div class="text-wrapper">
                            <p class="name mbr-fonts-style mb-1 display-4">
                                <strong>Dr. Ralph Laurence B Cabugao</strong>
                            </p>
                            <p class="position mbr-fonts-style display-4">
                                <strong>General Dentist</strong>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card col-12 col-md-6">
                    <p class="mbr-text mbr-fonts-style mb-4 display-7">General dentistry is the foundation of every dental practice. It primarily involves simple and inexpensive dental procedures that promote and maintain your oral hygiene and health</p>
                    <div class="d-flex mb-md-0 mb-4">
                        <div class="image-wrapper">
                            <img src="assets/images/DocSarah.JPG" alt="images">
                        </div>
                        <div class="text-wrapper">
                            <p class="name mbr-fonts-style mb-1 display-4">
                                <strong>Dr. Sarah Leanza P. Gabrillo</strong>
                            </p>
                            <p class="position mbr-fonts-style display-4">
                                <strong>General Dentist</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--footer section-->
    <?php include_once './includes/footer.php'; ?>