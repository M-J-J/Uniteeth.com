<?php include_once 'controllerUserData.php'; ?>
<?php
require 'connection.php';
//payment option
$stmt = $con->prepare("select * from payments");
$payment = "";
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $payment .= "<option value='" . $row['paylist'] . "'>" . $row['paylist'] . "</option>";
        }
        $stmt->close();
    }
}
//checking timeslot data and date
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $stmt = $con->prepare("select * from bookings where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bookings[] = $row['timeslot'];
            }
        }
        $stmt->close();
    }
}
//form submit for bookings
if (isset($_POST['book'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslot = $_POST['timeslot'];
    $usid = $_POST['usid'];
    $payment = $_POST['payment'];
    $stmt = $con->prepare("select * from bookings where date = ? AND timeslot=?");
    $stmt->bind_param('ss', $date, $timeslot);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $msg = "<div class='alert alert-danger'>Already Booked</div>";
        } else {
            $stmt = $con->prepare("INSERT INTO bookings (usid, name, email, date, timeslot, payment) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param('ssssss', $usid, $name, $email, $date, $timeslot, $payment);
            $stmt->execute();
            $msg = "<div class='alert alert-success'>Booking Successfull'></div>";
            $bookings[] = $timeslot;
            $stmt->close();
            $con->close();
        }
    }
}

//Value for the time slots working for dynamic
$duration = 30;
$cleanup = 0;
$start = "08:00";
$end = "15:00";

function timeslots($duration, $cleanup, $start, $end)
{
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT" . $duration . "M");
    $cleanupinterval = new DateInterval("PT" . $cleanup . "M");
    $slots = array();
    for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupinterval)) {
        $sendPeriod = clone $intStart;
        $sendPeriod->add($interval);
        if ($sendPeriod > $end) {
            break;
        }
        $slots[] = $intStart->format("g:iA") . " - " . $sendPeriod->format("g:iA");
    }
    return $slots;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <section class="formpadding mbr-parallax-background">
        <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(255, 255, 255);">
        </div>
        <div class="container">
            <h3><strong>Book for Date: <?php echo date('F  d , Y', strtotime($date)); ?></strong>
            </h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <?php echo (isset($msg)) ? $msg : ""; ?>
                </div>
                <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
                foreach ($timeslots as $ts) {
                ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php if (in_array($ts, $bookings)) { ?>
                                <button class="btn btn-danger"><?php echo $ts; ?></button>
                            <?php } else { ?>
                                <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <hr>
            <div>
                <a type="button" href="./appointment.php" class="btn btn-primary btn-xs"><strong><i class="fas fa-arrow-alt-circle-left"></i> Back</strong></a>
            </div>
        </div>
    </section>

    <!--MODAL-->
    <div id="myModal" class="modal fade" role="dialog" style="z-index: 1001;">
        <div class="modal-dialog">
            <!--ModalContent-->
            <div class="modal-content" style="z-index: 1055;">
                <div class="modal-header">
                    <h4 class="modal-title">Booking Information</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" autocomplete="">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input required type="text" readonly name="timeslot" class="form-control" value=" <?php echo date('F  d , Y', strtotime($date)); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Timeslot</label>
                                    <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                                </div>
                                <?php if (isset($_SESSION['email'])) : ?>
                                    <div class="form-group">
                                        <label for="">User ID</label>
                                        <input required type="text" class="form-control" readonly name="usid" value="<?php if (isset($_SESSION['unique_id']) && !empty($_SESSION['unique_id']) && isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                                                                                                                            echo $_SESSION['id'] . '-' . $_SESSION['unique_id'];
                                                                                                                        } ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input required type="text" class="form-control" readonly name="name" value="<?php if (isset($_SESSION['name']) && !empty($_SESSION['name']) && isset($_SESSION['lname']) && !empty($_SESSION['lname'])) {
                                                                                                                            echo $_SESSION['name'] . ' ' . $_SESSION['lname'];
                                                                                                                        } ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input required type="email" class="form-control" readonly name="email" value="<?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                                                                                                                            echo $_SESSION['email'];
                                                                                                                        } ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Payment method</label>
                                        <select required type="dropdown" class="form-control" name="payment" id="payment"><?php echo $payment; ?></select>
                                    </div>
                                    <div class="form-group">
                                        <button name="book" type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                                    </div>
                                    <!--php else : ?>
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input required type="text" class="form-control" name="name" placeholder="e.g Juan P. Dela Cruz jr.">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input required type="email" class="form-control" name="email" placeholder="e.g JuanDelaXruz@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Payment method</label>
                                        <select required type="dropdown" class="form-control" name="payment" id="payment"><?php echo $payment; ?></select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Reason of Appointment</label>
                                        <input required type="textarea" class="form-control" name="reason" placeholder="e.g Check up"></input>
                                    </div>
                                    <div-- class="form-group">
                                        <button name="bookings" type="submit" class="form-control btn btn-primary">Submit</button>
                                    </div-->
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once './includes/footer.php'; ?>