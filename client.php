<?php include_once 'controllerUserData.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="description" content="">

  <title>Uniteeth Dental Clinic</title>
  <?php include_once './includes/head.php'; ?>

  <title>client</title>

  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background-color: #f8f9fa;
    }

    .topnav {
      overflow: hidden;
      background-color: #ffffff;
    }

    .topnav a {
      float: right;
      color: #2E3842;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      color: #4e73df;
    }

    .topnav a.active {
      background-color: #04AA6D;
      color: white;
    }



    img {
      border-radius: 50%;
      margin-left: 50px;
    }

    .info {
      text-align: center;
      color: #FFFFFFCC;
    }

    .sidenav {
      height: 500px;
      width: 250px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #4e73df;
      overflow-x: hidden;
      padding-top: 20px;
      margin-left: 20px;
      margin-top: 107px;
      border-radius: 4px;
    }

    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 14px;
      color: #FFFFFFCC;
      display: block;
      padding-bottom: 18px;
      padding-top: 15px;
      padding-left: 20px;
    }

    .sidenav a:hover {
      color: #fff;
    }

    .dash {
      margin-left: 10px;
    }



    .but:link,
    .but:visited {
      background-color: white;
      color: black;
      border: 2px;
      padding-left: 65px;
      padding-right: 60px;
      padding-top: 10px;
      padding-bottom: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      border-bottom: 2px solid white;
    }

    .but:hover {
      color: #4e73df;
      border-bottom: 2px solid #4e73df;
    }

    .active {
      border: 2px;
      padding-left: 65px;
      padding-right: 60px;
      padding-top: 10px;
      padding-bottom: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      color: #4e73df;
      border-bottom: 2px solid #4e73df;
    }

    .tabbut {
      padding-bottom: 20px;
    }

    .tabs {
      position: relative;
      margin-left: 290px;
      margin-top: 60px;
      padding-bottom: 348px;
      padding-left: 13px;
      background-color: #ffffff;
      padding-top: 20px;
      border-radius: 4px;
      margin-right: 20px;
      border: 1px solid rgba(0, 0, 0, .125);
    }



    .tdet {

      padding-bottom: fixed;
    }

    .det table,
    td,
    th {
      border: 1px solid rgba(0, 0, 0, .125);
      text-align: left;
      border-radius: 4px;
      border-collapse: collapse;
    }



    table {
      width: 900px;
    }

    th,
    td {
      padding: 10px;
    }



    .btn1 {
      background-color: rgba(231, 231, 231);
      border-radius: 4px;
      color: #1db9aa;
      border: 1px solid transparent;
      font-size: 15px;
      border: none;
      cursor: pointer;
      padding-right: 10px;
    }

    .btn1:hover {
      background: #7afff2;
    }

    .btn2 {
      background-color: rgba(231, 231, 231);
      border-radius: 4px;
      color: #f44336;
      border: 1px solid transparent;
      font-size: 15px;
      border: none;
      cursor: pointer;
      padding-right: 10px;
    }

    .btn2:hover {
      background: #ff8b82;
    }
  </style>


</head>

<body>

  <div class="topnav">
    <a href="index.php">Home</a>
  </div>

  <div class="sidenav">
    <img src="./assets/images/billy.png" width="150px">

    <div class="info">
      <h3><?php echo $_SESSION['name'] . $_SESSION['lname']; ?></h3>
      <h5><?php echo $age ?> Years old</h5>
      <h5><?php echo $_SESSION['address']; ?></h5>
    </div>

    <hr>
    <div class="dash">
      <b><a href="client.php"><i class="fa fa-home"></i> DASHBOARD</a>
        <a href="appointment.php"><i class="fa fa-calendar-plus-o"></i> SET AN APPOINTMENT</a>
        <a href="profs.php"><i class="fa fa-user"></i> PROFILE SETTINGS</a>
        <a href="logout-user.php"><i class="fa fa-sign-out"></i> LOG OUT</a></b>
    </div>
  </div>

  <div class="tabs">
    <div class="tabbut">
      <a class="active" class="but" href="client.php"><b>Appointments</b></a>
      <a class="but" href="presc.php"><b>Prescriptions</b></a>
      <a class="but" href="medr.php"><b>Medical Records</b></a>
      <a class="but" href="bill.php"><b>Billing</b></a>
    </div>
    <div class="tdet">
      <table class="det">
        <tr>
          <th>Doctor</th>
          <th>Appt Date</th>
          <th>Time Slot</th>
          <th>Status</th>
          <th>
            <center>Action</center>
          </th>
        </tr>

        <?php
        $records = mysqli_query($con, "select * from bookings");
        while ($data = mysqli_fetch_array($records)) { ?>

          <tr>
            <td><?php echo ($data["name"]); ?></td>
            <td><?php echo ($data["date"]); ?></td>
            <td><?php echo ($data["timeslot"]); ?></td>
            <td>Pending</td>
            <td>
              <center><a href="delete.php?id=<?php echo $data["id"]; ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn2">Delete</a></center>
            </td>
          </tr>
        <?php }
        ?>
      </table>
    </div>
  </div>


</body>

</html>