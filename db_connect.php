<<?php 

$conn= mysqli_connect('localhost', 'divyam', 'divyam@1234', 'Info');
    if(!$conn){
        echo 'connection Error' . mysqli_connect_error();
    }
?>