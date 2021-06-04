<?php
session_start();
if (empty(['email'])) :
    header('location: index.php');
endif;
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="description" content="">

    <title>Uniteeth Dental Clinic</title>
    <?php include_once './includes/head.php'; ?>

</head>

<body>

    <section class="formpadding">
        <div class="whiteload">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 form login-form">
                        <img style="opacity: 0.8;" src="./assets/images/unilogo.jpg" alt="Logo">
                        <?php
                        include('connection.php');
                        session_destroy();
                        session_unset();

                        echo '<meta http-equiv="refresh" content="2;url=index.php">';
                        echo '<br /><progress max=100 style="width: 20rem; height: 2rem;"><strong>Progress: 50% done.</strong></progress><br />';
                        echo '<strong class="itext">Your <strong>Signing out</strong> please wait!. . .</strong>';

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>