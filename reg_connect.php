
<!--  Saving the form data in to sql database -->
<?php   
   $conn = mysqli_connect('localhost', 'divyam', 'divyam@1234', 'Info');
   // Check connection
   if ($conn === false) {
       echo 'ERROR: Could not connect. ';
       die('ERROR: Could not connect. ' . mysqli_connect_error());
   }


    if(isset($_POST['fname']) || isset($_POST['sname'])|| isset($_POST['email']) || isset($_POST['pwd']) || isset($_POST['rpwd']) ){
        $fname= $_POST['fname'];
        $sname= $_POST['sname'];
        $email= $_POST['email'];
        $pwd= $_POST['pwd'];
        $rpwd= $_POST['rpwd'];
    
    if(!isset($_POST['email'], $_POST['pwd'])){
        exit('empty field(s)');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
            
              if(strlen($pwd)<6){
                  echo "password must be atleast 6 character long";
                  exit();
              }

              if($rpwd === $pwd)
              {$sql= "INSERT INTO `users` ( `first_name`, `last_name`, `email`, `password`) VALUES  ( '$fname', '$sname', '$email', '$pwd')";}

              else
              {
                  echo "password not matched";
                  exit();
              }

              $query= mysqli_query($conn, $sql);

              if ($query) {
                  echo '<h2>Data stored in a database successfully.' .
                      ' Please browse your localhost php my admin' .
                      ' to view the updated data</h2>';
                  echo 'Connected successfully  ';
      
                  echo nl2br(
                      "\n$fname\n $sname\n $email\n $pwd\n "
                  );
              } else {
                //   echo '<h3>data stored in </h3>';
                  echo "ERROR! Sorry $sql. " . mysqli_error($conn);
              }
              
            }
              mysqli_close($conn);
  ?>
              <form action="login_form.php">
                  <button type="submit">
                      Go to Login
                  </button>
              </form>



<!-- 
<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>

//         ini_set('display_errors', 1);
//         error_reporting(-1);
//         $conn = mysqli_connect('localhost', 'root', 'your_password', 'db');
//         // Check connection
//         if ($conn === false) {
//             echo 'ERROR: Could not connect. ';
//             die('ERROR: Could not connect. ' . mysqli_connect_error());
//         }

//         // Taking all 4 values from the form data(input)
//         $fname = $_REQUEST['fname'];
//         $lname = $_REQUEST['lname'];
//         $email = $_REQUEST['email'];
//         $password = $_REQUEST['password'];
//         $cnfpassword = $_REQUEST['cnfpassword'];
//         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//   $emailErr = "Invalid email format";
// }
//         // Performing insert query execution
//         // here our table name is college
//         if(strlen($password)<10){
//             echo "password must be atleast 10 character";
//             exit();
//         }
//         if($cnfpassword === $password)
//         {$sql = "INSERT INTO user(fname, lname , email, password) VALUES ('$fname',
// 			'$lname','$email','$password')";}
//         else
//         {
//             echo "password not matched";
//             exit();
//         }
//         // mysqli_query($conn, $sql);
//         if (mysqli_query($conn, $sql)) {
//             echo '<h3>data stored in a database successfully.' .
//                 ' Please browse your localhost php my admin' .
//                 ' to view the updated data</h3>';
//             echo 'Connected successfully  ';

//             echo nl2br(
//                 "\n$fname\n $lname\n $email\n $password\n "
//             );
//         } else {
//             echo '<h3>data stored in </h3>';
//             echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
//         }

//         // Close connection
        


// </body>

// </html>