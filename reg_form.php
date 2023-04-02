<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REgistration Form</title>
</head>
<h1> New Student Registration</h1>
<body>

    <div><h2> Registration Form </h2></div>
    <legend>
    <form action="reg_connect.php" method="post">
        <!-- <fieldset> -->
        <label for="fname">Enter your first Name: </label>
        <input type="text" name="fname" id= "fname" required= "required"><br><br>

        <label for="sname">Enter your last Name: </label>
        <input type="text" name="sname" id= "sname" required= "required"><br><br>

        <label for="email">Enter your Email: </label>
        <input type="email" name="email" id= "email" required= "required"><br><br>

        <label for="pwd">Enter password: </label>
        <input type="text" name="pwd" id= "pwd" required= "required"><br><br>

        <label for="rpwd">Confirm password: </label>
        <input type="text" name="rpwd" id= "rpwd" required= "required"><br><br>

        <input type="submit" name="submit" id="submit">
        </legend>
        <!-- </fieldset> -->
    </form>
</body>
</html>