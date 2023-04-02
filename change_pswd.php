<?php
session_start();
ini_set('display_errors', 1);
error_reporting(-1);
ini_set('display_errors', 1);
error_reporting(-1);
$ID = $_SESSION['ID'];

$conn = mysqli_connect('localhost', 'divyam', 'divyam@1234', 'Info');
// Check connection
if ($conn === false) {
    echo 'ERROR: Could not connect. ';
    die('ERROR: Could not connect. ' . mysqli_connect_error());
}
if ( isset($_POST['pwd']) && isset($_POST['rpwd'])) {
    function validate($data)
    {
        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    $password = validate($_POST['pwd']);
    $cnfpassword = validate($_POST['rpwd']);
    if (empty($password)) {
        header('Location: change.php?error= Password cant be empty.');

        exit();
    } elseif (empty($cnfpassword)) {
        header('Location: change.php?error= Password is required. ');

        exit();
    }  else {
        $sql = "SELECT * FROM users WHERE ID='$ID'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            
            
            // printf("%s \n Name: \n", $row['password']);
            if($cnfpassword !== $password){
                echo("Password Not Matched");
                exit();
            }
            $sql = "UPDATE users SET password='$password' WHERE ID='$ID'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<h3>Details Updated</h3>';
                echo '<span>Password:  </span> ', $password;
                
            } else {
                echo 'Not Updated';
            }
        } else {
            header(
                'Location: main.php?error=Not Updated'
            );

            exit();
        }
    }
} else {
    header('Location: home.php');

    exit();
}
?>

<form action="logout.php">
    <button type="submit">
        Log out
    </button>
</form>