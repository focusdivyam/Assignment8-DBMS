<?php
ini_set('display_errors', 1);
error_reporting(-1);
ini_set('display_errors', 1);
error_reporting(-1);
session_start();

$conn = mysqli_connect('localhost', 'divyam', 'divyam@1234', 'Info');
// Check connection
if ($conn === false) {
    echo 'ERROR: Could not connect. ';
    die('ERROR: Could not connect. ' . mysqli_connect_error());
}
if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    $email = validate($_POST['email']);

    $pass = validate($_POST['password']);

    if (empty($email)) {
        header('Location: login_form.php?error= User Name cant be empty');

        exit();
    } elseif (empty($pass)) {
        header('Location: login_form.php?error=password cant be empty');

        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);  // row is an array of arrays.

            if ($row['email'] === $email && $row['password'] === $pass) {
                echo 'You are successfully Logged in!';
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $row['email'];
                $_SESSION['ID'] = $row['id'];
                $_SESSION['fname'] = $row['first_name'];
                $_SESSION['sname'] = $row['last_name'];
                $_SESSION['password'] = $row['password'];

                header('Location: main.php');
            } else {
                header(
                    'Location: login_form.php?error=Incorect User name or password'
                );

                exit();
            }
        } else {
            header(
                'Location: login_form.php?error=Incorect User name or password'
            );

            exit();
        }
    }
} else {
    header('Location: login_form.php');

    exit();
}
?>
<br>
