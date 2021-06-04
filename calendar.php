<?php include_once 'controllerUserData.php'; ?>
<?php
function build_calendar($month, $year)
{
    require 'connection.php';
    /* $stmt = $con->prepare("SELECT * FROM bookings WHERE MONTH(date) = ? AND YEAR(date)=?");
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bookings[] = $row['date'];
            }
            $stmt->close();
        }
    }*/

    // Create array containing abbreviations of days of week.
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    // What is the first day of the month in question?
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    // How many days does this month contain?
    $numberDays = date('t', $firstDayOfMonth);

    // Retrieve some information about the first day of the
    // month in question.
    $dateComponents = getdate($firstDayOfMonth);

    // What is the name of the month in question?
    $monthName = $dateComponents['month'];

    // What is the index value (0-6) of the first day of the
    // month in question.
    $dayOfWeek = $dateComponents['wday'];
    //set the week starts to monday-sunday
    /*if ($dayOfWeek == 0) {
        $dayOfWeek = 6;
    } else {
        $dayOfWeek = $dayOfWeek - 1;
    }*/

    // Create the table tag opener and day headers
    $dateToday = date('Y-m-d');
    $prev_month = date('m', mktime(0, 0, 0, $month - 1, 1, $year));
    $prev_year = date('Y', mktime(0, 0, 0, $month - 1, 1, $year));
    $next_month = date('m', mktime(0, 0, 0, $month + 1, 1, $year));
    $next_year = date('Y', mktime(0, 0, 0, $month + 1, 1, $year));

    $calendar = "<div class='align-center'><h2><strong style='text-transform: uppercase; weight: bolder;'>$monthName $year</strong></h2>";
    if (!isset($_SESSION['id'])) {
        $calendar .= "<div class='w-100 font-italic align-center pt-3 pb-2'>
    <p class='text-muted font-weight-bold'>Please <a href='register.php' class='font-italic'>Register</a> first to set an appointment or already have an account please <a href='loginpage.php' class='font-italic'>login</a> here.</p></div></div>";
    } else {
        $calendar .= "<div class='w-100 font-italic align-center pt-3 pb-2'>
    <p class='text-muted'>Note: Please Fill up the <u class='font-weight-bold font-italic'>health declaration</u> honestly to ensure our safety and prevent the COVID-19.</p></div></div>";
    }
    //previous button for calendar
    $calendar .= "<div class='row align-center'><div class='col'><a class='btn btn-primary-outline' href='?month=" . $prev_month . "&year=" . $prev_year . "'><strong><i class='fas fa-arrow-alt-circle-left'></i> Previous Month</strong></a></div>";

    //current button for calendar
    $calendar .= "<div class='col'><a href='appointment.php' class='btn btn-primary-outline' data-month='" . date('m') . "' data-year='" . date('Y') . "'>Current Month</a></div>";

    //next button for calendar
    $calendar .= "<div class='col'><a class='btn btn-primary-outline' href='?month=" . $next_month . "&year=" . $next_year . "'><strong>Next Month <i class='fas fa-arrow-alt-circle-right'></i></strong></a></div></div>";

    $calendar .= "<table class='table table-bordered'>";
    $calendar .= "<tr>";

    // Create the calendar headers
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th  class='header'>$day</th>";
    }

    // Create the rest of the calendar
    // Initiate the day counter, starting with the 1st.
    $calendar .= "</tr><tr>";
    $currentDay = 1;

    // The variable $dayOfWeek is used to
    // ensure that the calendar
    // display consists of exactly 7 columns.

    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td  class='empty'></td>";
        }
    }

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberDays) {
        //Seventh column (Saturday) reached. Start a new row.
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $dayname = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        //date format
        $today = $date == date('Y-m-d') ? "today" : "";

        //Set for holidays and breaktime
        if ($dayname == 'sunday') {
            $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Holiday</button> ";
        } elseif ($date < date('Y-m-d')) {
            $calendar .= "<td><h4>$currentDay</h4>";
        }/* elseif ($_SESSION['email']) {
            $email = $_POST['email'];
            $stmt = $con->prepare("select * from bookings where email = ?");
            $stmt->bind_param('s', $email);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Already Booked</button>";
                }
            }
        } */ else {
            //Currently 14 slots each day.
            $totalbookings = checkSlots($con, $date);
            if ($totalbookings > 14) {
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='#' class='btn btn-danger btn-xs'>All Booked</a>";
            } else {

                $availableslots = 14 - $totalbookings;
                if (isset($_SESSION['id'])) {
                    $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=" . $date . "' class='btn btn-success btn-xs'>Set</a><br><small><i>$availableslots slots available</i></small>";
                } else {
                    $calendar .= "<td class='$today'><h4>$currentDay</h4><br><small><i>$availableslots slots available</i></small>";
                }
            }
        }
        $calendar .= "</td>";
        //Increment counters
        $currentDay++;
        $dayOfWeek++;
    }
    //Complete the row of the last week in month, if necessary
    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        for ($l = 0; $l < $remainingDays; $l++) {
            $calendar .= "<td class='empty'></td>";
        }
    }

    $calendar .= "</tr>";
    $calendar .= "</table>";
    echo $calendar;
}
function checkSlots($con, $date)
{
    $stmt = $con->prepare("SELECT * FROM bookings WHERE date = ?");
    $stmt->bind_param('s', $date);
    $totalbookings = 0;
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $totalbookings++;
            }
            $stmt->close();
        }
    }
    return $totalbookings;
}


?>