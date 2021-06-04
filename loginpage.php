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
        <div class="row py-5 mt-4 align-items-center">
            <!-- left side area -->
            <div class="col-md-5 pr-lg-5 mb-4 mb-md-0">
                <a href="./index.php">
                    <img src="./assets/images/unilogo.jpg" alt="" class="img-fluid mb-3 d-none d-md-block">
                </a>
            </div>

            <!-- login Form -->
            <div class="col-md-7 col-lg-6 ml-auto mt-2 shadow p-3 mb-5 bg-white rounded">
                <form action="./loginpage.php" method="POST" autocomplete="">
                    <div class="row">
                        <div class="text-center w-100 mb-3">
                            <h1><strong>Log in your Account</strong></h1>
                            <?php
                            if (count($errors) > 0) {
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php
                                    foreach ($errors as $showerror) {
                                        echo $showerror;
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4  mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <?php if (isset($_SESSION['email'])) : ?>
                                <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md" value="<?php echo $_SESSION['email']; ?>">
                            <?php else : ?>
                                <input id=" email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                            <?php endif; ?>
                        </div>

                        <!-- Password -->
                        <div class=" input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <div class="col w-100">
                            <p class="text-muted font-weight-bold"><input type="checkbox" name="remember" /> Remember me</p>
                        </div>

                        <div class="col align-right w-100">
                            <p class="text-muted font-weight-bold"><a href="./forgot-pass.php" class="text-primary ml-2"> Forgot password?</a></p>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto">
                            <button class="btn btn-primary btn-block py-2" type="submit" name="login">
                                <span class="font-weight-bold">Sign in</span>
                            </button>
                        </div>

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4 m-1">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>

                        <!-- Social Login -->
                        <div class="form-group col-lg-12 mx-auto">
                            <a href="#" class="btn btn-primary btn-block py-2 btn-facebook">
                                <i class="fa fa-facebook-f mr-2"></i>
                                <span class="font-weight-bold">Continue with Facebook</span>
                            </a>
                            <a href="#" class="btn btn-danger btn-block py-2 btn-google">
                                <i class="fa fa-google mr-2"></i>
                                <span class="font-weight-bold">Continue with Gmail</span>
                            </a>
                            <div class="w-100 font-italic align-center pt-3 pb-2 mt-4">
                                <p class="text-muted font-weight-bold font-italic">Not yet Registered? <a href="./register.php" class="font-italic text-primary ml-2 font-weight-bold">Sign up here</a>.</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--footer section-->
    <?php include_once './includes/footer.php'; ?>