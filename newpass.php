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

            <!-- New Pass Form -->
            <div class="col-md-7 col-lg-6 ml-auto mt-2 shadow p-3 mb-5 bg-white rounded">
                <form action="./newpass.php" method="POST" autocomplete="">
                    <div class="row">
                        <div class="text-center w-100 mb-0">
                            <h1><strong>New Password</strong></h1>
                            <?php if (isset($_SESSION['info'])) : ?>
                                <?php if (count($errors) == 0) : ?>
                                    <div class="alert alert-success text-center">
                                        <?php echo $_SESSION['info']; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if (count($errors) > 0) : ?>
                                <div class="alert alert-danger text-center">
                                    <?php foreach ($errors as $showerror) {
                                        echo $showerror;
                                    } ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Password -->
                        <div class="input-group col-lg-12 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Password Confirmation -->
                        <div class="input-group col-lg-12 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="passwordConfirmation" type="password" name="cpassword" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto">
                            <button class="btn btn-primary btn-block py-2" type="submit" name="change-password">
                                <span class="font-weight-bold">Change</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--footer section-->
    <?php include_once './includes/footer.php'; ?>