<?php
session_start();

//initialising variables

$servername = "localhost";
$email = "";
$password = "";

$errors = array();

//connect to db
$db = mysqli_connect('localhost', 'root', 'QSuM?1743i77', 'contest_scheduling') or die("could not connect to database");

//register users
if (isset($_POST['register'])) {

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
    $institution = mysqli_real_escape_string($db, $_POST['institution']);

    //form validation
    //CHECK DB FOR EXISTING MEMBER WITH SAME EMAIL
    $member_check_query = "SELECT * FROM Users WHERE  email='$email' LIMIT 1";

    $results = mysqli_query($db, $member_check_query);
    $member = mysqli_fetch_assoc($results);

    if ($member) {
        if ($member['email'] === $email) {
            array_push($errors, "This email id already has a registered Member");
            //echo '<script>alert("This email id already has a registered Member!")</script>';
        }
    }

    if (count($errors) == 0) {
        //password -hashing from here
        /*$options = [
            'cost' => 10,
        ];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);*/
        $timeTarget = 0.1; // 100 milliseconds 

        $cost = 10;
        do {
            $cost++;
            $start = microtime(true);
            $password = password_hash($password, PASSWORD_BCRYPT, ["cost" => $cost]);
            $end = microtime(true);
        } while (($end - $start) < $timeTarget);

        //echo "Appropriate Cost Found: " . $cost;
        // echo "<script type='text/javascript'>alert('Appropriate Cost Found: ' .$cost);</script>";

        $query = "INSERT INTO Users (name,email,password,institution) VALUES ('$name','$email','$password','$institution')";

        mysqli_query($db, $query);
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        $_SESSION['hash'] = $cost;

        header("location:index.php");
    }
}

//logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('location:login.php');
}

//login

if (isset($_POST['login'])) {

    $email    =   mysqli_real_escape_string($db, $_POST['email']);
    $password =   mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT * FROM Users WHERE  email='$email'";

    $rs = mysqli_query($db, $sql);
    $numRows = mysqli_num_rows($rs);

    if (count($errors) == 0) {
        if ($numRows  == 1) {
            $row = mysqli_fetch_assoc($rs);
            $hash = $row['password'];
            if (password_verify($password, $hash)) {
                echo '<script>alert("Password verified!")</script>';
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "You are now logged in";
                header("location:index.php");
            } else {
                echo '<script>alert("Wrong Password!")</script>';
            }
        } else {
            echo '<script>alert("No User Found!")</script>';
        }
    }
}

$db->close();