<head>
    <script type="text/javascript">
    // var baseUrl = 'localhost/form/';

    function ConfirmDelete() {
        if (confirm("Delete Account?"))
            location.href ='delete.php';
    }
    </script>


</head>
<?php
session_start();
ini_set('display_errors', 1);
error_reporting(-1);

$fname = $_SESSION['fname'];
$lname = $_SESSION['sname'];
$email = $_SESSION['email'];

?>
<html>

<body>

<h2> For Updating information</h2>
    <h3>
        First Name:
        <?php
        echo($fname);
        ?>
    </h3>
    <h3>
        Last Name:
        <?php
        echo($lname);
        ?>
    </h3>
    <h3>
        Email:
        <?php
        echo($email);
        ?>
    </h3>
    
    <h3> <?php echo "Enter new information: " ?> </h3>
    <form action="change.php" method="post">
        <h3><label for="fname">First Name</label>

            <input type="text" name="fname" placeholder="first name"><br>
        </h3>
        <h3>
            <label for="lname">Last name</label>
            <input type="text" name="lname" placeholder="last name"><br>
        </h3>
        <br>
        <button type="submit">Change</button>
    </form>
    <h3>For changing the password</h3>

    <form action="change_pswd.php" method="post">
        <h3><label for="pwd">Password</label>

            <input type="password" name="pwd" placeholder="password"><br>
        </h3>
        <h3><label for="rpwd"> Confirm Password</label>

            <input type="password" name="rpwd" placeholder="Confirm password"><br>
        </h3>
        <br>
        <button type="submit">Change Password</button>
    </form>

    <?php
    echo '<button type="button" onclick="ConfirmDelete()">DELETE ACCOUNT</button>';?>
    <form action="logout.php">
        <br>
        <button type="submit">
            Log out
        </button>
    </form>
</body>

</html>