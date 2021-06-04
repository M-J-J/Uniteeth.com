<?php
//user controller forms
session_start(); //session start for user logge in
require "connection.php"; // this is the connection for database
//this is the dynamic variables and errors arays for user data
$email = "";
$name = "";
$lname = "";
$gender = "";
$job = "";
$bdate = "";
$address = "";
$phone = "";
$errors = array();

//if user signup button
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $job = mysqli_real_escape_string($con, $_POST['job']);
    $bdate = date('Y-m-d', strtotime($_POST['bdate']));
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    //Validation format
    $nuppercase = preg_match('@[A-Z]@', $name);
    $nlowercase = preg_match('@[a-z]@', $name);
    $lnuppercase = preg_match('@[A-Z]@', $lname);
    $lnlowercase = preg_match('@[a-z]@', $lname);
    // validate name and lname if all text only
    if (!$nuppercase || !$nlowercase) {
        $errors['name'] = "Name only contain with letters, and start with upper case letter.";
    }
    if (!$lnuppercase || !$lnlowercase) {
        $errors['lname'] = "Last Name only contain with letters, and start with upper case letter.";
    }

    //validate password match
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    //$specialChars = preg_match('@[^\w]@', $password);
    if (strlen($password) < 8) {
        $errors['password'] = "Password should be at least 8 characters in length.";
    }
    if (!$uppercase) {
        $errors['password'] = "Password should be at least one upper case letter.";
    }
    if (!$number) {
        $errors['password'] = "Password should be at least one number.";
    }
    /*if (!$specialChars) {
        $errors['password'] = "Password should be at least one special character.";
    }*/
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email that you have entered is already exist!";
    }
    $phone_checker = preg_match("^(09|\+639)\d{9}$^", $phone);
    if (!$phone_checker) {
        $errors['phone'] = "Phone number is incorrect format!";
    }
    if (strlen($phone) < 11) {
        $errors['phone'] = "Phone number atlease 11 digit!";
    }
    if (count($errors) === 0) {
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $uniqueid = rand(999999, 111111);
        $code = rand(999999, 111111);
        $status = "notverified";
        $role = 3;
        $role_name = "Client";
        $insert_data = "INSERT INTO usertable (unique_id, name, lname, email, gender, job, bdate, phone, address, password, code, status, role, role_name )
                        values('$uniqueid','$name','$lname','$email','$gender', '$job', '$bdate', '$phone', '$address', '$encpass', '$code', '$status', '$role' , '$role_name')";
        $data_check = mysqli_query($con, $insert_data);
        if ($data_check) {
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: Uniteeth Dental Clinic";
            if (mail($email, $subject, $message, $sender)) {
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $role;
                $_SESSION['role_name'] = $role_name;
                $_SESSION['status'] = $status;
                header('location: userotp.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
}
//if user click verification code submit button
if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if ($update_res) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: loginpage.php');
            exit();
        } else {
            $errors['otp-error'] = "Failed while updating code!";
        }
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click login button
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if (password_verify($password, $fetch_pass)) {
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            $role = $fetch['role'];
            $bdate = $fetch['bdate'];
            $name = $fetch['name'];
            $lname = $fetch['lname'];
            $job = $fetch['job'];
            $address = $fetch['address'];
            $code = $fetch['code'];
            $uniqueid = $fetch['unique_id'];
            $id = $fetch['id'];
            $role_name = $fetch['role_name'];
            if ($status == 'verified' && $role == 3 && $code == 0) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['name'] = $name;
                $_SESSION['lname'] = $lname;
                $_SESSION['job'] = $job;
                $_SESSION['bdate'] = $bdate;
                $_SESSION['address'] = $address;
                $_SESSION['unique_id'] = $uniqueid;
                $_SESSION['id'] = $id;
                $_SESSION['code'] = $code;
                $_SESSION['role'] = $role;
                $_SESSION['status'] = $status;
                header('location: index.php');
            } elseif ($status == 'verified' && $role == 2 && $code == 0) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['name'] = $name;
                $_SESSION['lname'] = $lname;
                $_SESSION['job'] = $job;
                $_SESSION['bdate'] = $bdate;
                $_SESSION['address'] = $address;
                $_SESSION['unique_id'] = $uniqueid;
                $_SESSION['id'] = $id;
                $_SESSION['code'] = $code;
                $_SESSION['role'] = $role;
                $_SESSION['role_name'] = $role_name;
                $_SESSION['status'] = $status;
                header('location: index.php');
            } elseif ($status == 'verified' && $role == 1 && $code == 0) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['name'] = $name;
                $_SESSION['lname'] = $lname;
                $_SESSION['job'] = $job;
                $_SESSION['bdate'] = $bdate;
                $_SESSION['address'] = $address;
                $_SESSION['unique_id'] = $uniqueid;
                $_SESSION['id'] = $id;
                $_SESSION['code'] = $code;
                $_SESSION['role'] = $role;
                $_SESSION['role_name'] = $role_name;
                $_SESSION['status'] = $status;
                header('location: index.php');
            } elseif ($status == 'verified' && $role == 0) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['name'] = $name;
                $_SESSION['lname'] = $lname;
                $_SESSION['job'] = $job;
                $_SESSION['bdate'] = $bdate;
                $_SESSION['address'] = $address;
                $_SESSION['unique_id'] = $uniqueid;
                $_SESSION['id'] = $id;
                $_SESSION['code'] = $code;
                $_SESSION['role'] = $role;
                $_SESSION['role_name'] = $role_name;
                $_SESSION['status'] = $status;
                header('location: index.php');
            } else {
                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;
                header('location: userotp.php');
            }
        } else {
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}

//if user click continue button in forgot password form
if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM usertable WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if (mysqli_num_rows($run_sql) > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if ($run_query) {
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: Uniteeth Dental Clinic";
            if (mail($email, $subject, $message, $sender)) {
                $info = "We've sent a passwrod reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: resetcode.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Something went wrong!";
        }
    } else {
        $errors['email'] = "This email address does not exist!";
    }
}

//if user click check reset otp button
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: newpass.php');
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    if (strlen($password) < 8) {
        $errors['password'] = "Password should be at least 8 characters in length.";
    }
    if (!$uppercase) {
        $errors['password'] = "Password should be at least one upper case letter.";
    }
    if (!$number) {
        $errors['password'] = "Password should be at least one number.";
    }
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }
    if (count($errors) === 0) {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if ($run_query) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: passchanged.php');
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

//if login now button click
if (isset($_POST['login-now'])) {
    header('Location: loginpage.php');
}

//set up cokies
if (!empty($_POST["remember"])) {
    setcookie("email", $_POST["email"], time() + 3600);
    setcookie("password", $_POST["password"], time() + 3600);
} else {
    setcookie("email", "");
    setcookie("password", "");
}

//Age calculator
if (isset($_SESSION['bdate'])) {
    $dob = new DateTime($_SESSION['bdate']);
    //We need to compare the user's date of birth with today's date.
    $now = new DateTime();
    //Calculate the time difference between the two dates.
    $difference = $now->diff($dob);
    //Get the difference in years, as we are looking for the user's age.
    $age = $difference->y;
}
