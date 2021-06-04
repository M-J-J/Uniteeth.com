<?php require_once './controllerUserData.php'; ?>
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
    <div class="container">
        <div class="row py-5 mt-4">
            <!-- left side area -->
            <div class="col-md-5 pr-lg-5 mb-4 mb-md-0">
                <a href="./index.php" class="img-fluid mb-3 d-none d-md-block"> <img src="./assets/images/unilogo.jpg"> </a>
                <p class="font-italic text-muted img-fluid mb-3 d-none d-md-block"> <span class="ml-5">We recommend to fill up this form correct,then the email and phone numbers are working to ensure to give you an update in the future. </span></p>
            </div>
            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto mt-2 shadow p-3 mb-5 bg-white rounded">
                <form action="./register.php" method="POST" autocomplete="">
                    <div class="row">
                        <div class="input-group col-lg-12 mb-3">
                            <h1><strong> Create an Account</strong></h1>
                            <p class="font-italic text-muted w-100">It's quick and easy.</p>
                        </div>

                        <!-- First Name -->
                        <div class="input-group col-lg-6 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="name" placeholder="First Name" data-toggle="tooltip" data-placement="left" title="eg. Juan" class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Last Name -->
                        <div class="input-group col-lg-6 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="lastName" type="text" name="lname" placeholder="Last Name" placeholder="First Name" data-toggle="tooltip" data-placement="left" title="eg. Dela Cruz Jr. if any suffix" class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- home Address -->
                        <div class="input-group col-lg-12 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fas fa-address-card text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="address" name="address" placeholder="Home Address" data-toggle="tooltip" data-placement="left" title="eg. Street, Barangay, Town, Province" class=" border-md form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="email" name="email" placeholder="Email address" data-toggle="tooltip" data-placement="left" title="eg. JuanDelaCruz@gmail.com" class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="input-group col-lg-12 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-phone text-muted"></i>
                                </span>
                            </div>
                            <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" data-toggle="tooltip" data-placement="left" title="eg. +639191234567 or 09191234567" class="form-control bg-white border-md border-left-0 pl-3" required>
                        </div>

                        <!-- Birth date-->
                        <div class="input-group col-lg-12 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-calendar-alt text-muted"></i>
                                </span>
                            </div>
                            <input type="date" name="bdate" data-toggle="tooltip" data-placement="left" title="Date of your birth." class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Job -->
                        <div class="input-group col-lg-12 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-black-tie text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="job" placeholder="Occupation" data-toggle="tooltip" data-placement="left" title="eg. Dentist" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <div class="input-group col mb-3" required>
                            <!-- Gender Male -->
                            <input id="male" type="radio" name="gender" value="Male" required>
                            <label for="male" class="radio"><i class="fa fa-male mr-3"></i> Male</label>
                        </div>

                        <div class="input-group col mb-3">
                            <!-- Gender Female -->
                            <input id="female" type="radio" name="gender" value="Female" required>
                            <label for="female" class="radio"><i class="fa fa-female mr-3"></i>Female</label>
                        </div>

                        <!-- Password -->
                        <div class="input-group col-lg-6 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password" data-toggle="tooltip" data-placement="left" data-html="true" title="Password must have <ul class='mb-0 text-justify'><li>8 Characters</li> <li>1 Uppercase</li> <li>1 Number  </li></ul>" class="form-control bg-white border-left-0 border-md " required>
                        </div>

                        <!-- Password Confirmation -->
                        <div class="input-group col-lg-6 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="passwordConfirmation" type="password" name="cpassword" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100"></div>
                            <div class="border-bottom w-100"></div>
                        </div>
                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-3">
                            <?php
                            if (count($errors) == 1) {
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php
                                    foreach ($errors as $showerror) {
                                        echo $showerror;
                                    }
                                    ?>
                                </div>
                            <?php
                            } elseif (count($errors) > 1) {
                            ?>
                                <div class="alert alert-danger">
                                    <?php
                                    foreach ($errors as $showerror) {
                                    ?>
                                        <li><?php echo $showerror; ?></li>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                            <button class="btn btn-primary btn-block py-2 mb-3" type="submit" name="signup">
                                <span class="font-weight-bold">Create your account</span>
                            </button>
                            <!-- Already Registered -->
                            <div class="w-100 font-italic align-center pt-3 pb-2">
                                <p class="text-muted  font-weight-bold">Already Registered?<a href="loginpage.php" class="text-primary ml-2 font-italic font-weight-bold">Login here.</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--footer section-->
    <?php include_once './includes/footer.php'; ?>