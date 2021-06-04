<?php require 'calendar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uniteeth Dental Clinic</title>
    <?php include_once './includes/head.php'; ?>

    <!--style>
        @media only screen and (max-device-width: 760px),
        (min-device-width: 341px) and (max-device-width: 1020px) {

            /*Force table to not be like tables */
            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
                position: relative;
            }

            .empty {
                display: none;
            }

            /*Hide the th but not display */
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                /*Behave to row*/
                border: none;
                border-radius: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            /*label the data */
            td:nth-of-type(1):before {
                content: "Sunday";
            }

            td:nth-of-type(2):before {
                content: "Monday";
            }

            td:nth-of-type(3):before {
                content: "Tuesday";
            }

            td:nth-of-type(4):before {
                content: "Wednesday";
            }

            td:nth-of-type(5):before {
                content: "Thursday";
            }

            td:nth-of-type(6):before {
                content: "Friday";
            }

            td:nth-of-type(7):before {
                content: "Saturday";
            }

            /*Smartphone(portrait and landscape) */
            @media only screen and(min-device-width:320px) and (max-device-width: 480px) {
                body {
                    padding: 0;
                    margin: 0;
                }
            }

            /*Ipods (portrait and landscape) */
            @media only screen and(min-device-width:802px) and (max-device-width: 1020px) {
                body {
                    width: 495px;
                }
            }

            @media(min-width:641px) {
                table {
                    table-layout: fixed;
                }

                td {
                    width: 33%;
                }
            }
        }

        .row {
            margin-top: 20px;
        }

        .today {
            background-color: #155ce0;
            color: #fff;
            font-weight: bolder;
        }
    </!--style-->

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

    <section class="formpadding mbr-parallax-background">
        <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(255, 255, 255);">
        </div>
        <div class="container">
            <div class="container-fluid">
                <div class=" row">
                    <div class="col-md-12">
                        <?php $dateComponents = getdate();
                        if (isset($_GET['month']) && isset($_GET['year'])) {
                            $month = $_GET['month'];
                            $year = $_GET['year'];
                        } else {
                            $month = $dateComponents['mon'];
                            $year = $dateComponents['year'];
                        }
                        echo build_calendar($month, $year);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once './includes/footer.php'; ?>