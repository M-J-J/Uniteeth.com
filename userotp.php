<?php require_once './controllerUserData.php'; ?>
<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location: loginpage.php');
}
?>
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

            <!-- user otp Form -->
            <div class="col-md-7 col-lg-6 ml-auto mt-2 shadow p-3 mb-5 bg-white rounded">
                <form action="./userotp.php" method="POST" autocomplete="">
                    <div class="row">
                        <div class="text-center w-100 mb-3">
                            <h1 class="mb-3"><strong>Code Verification</strong></h1>
                            <p class="text-center">Enter your One-Time-Password.</p>
                            <?php
                            if (isset($_SESSION['info'])) {
                            ?>
                                <div class="alert alert-success text-center">
                                    <?php echo $_SESSION['info']; ?>
                                </div>
                            <?php
                            }
                            ?>
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
                        <!-- otp code -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-key text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="number" name="otp" placeholder="Enter Code" class="form-control bg-white border-left-0 border-md">
                        </div>
                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto">
                            <button class="btn btn-primary btn-block py-2" type="submit" name="check">
                                <span class="font-weight-bold">Submit</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--footer section-->
    <?php include_once './includes/footer.php'; ?>