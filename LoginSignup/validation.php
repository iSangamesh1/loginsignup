<!-- it is same as registration page only little changes -->
<?php

session_start();
// header('location:login.php'); // it will redirect you to same page
// we removed this because after login we don't want the user send it again to login page we need to send him to home page


$con = mysqli_connect('localhost','root');
// we have to pass 3 parameters 1. hostname , 2. username, 3. password
if($con){
    echo "Hare Krishna Connected";
}else{
    echo "Not connected";
}
// above one is to check the connection

mysqli_select_db($con, 'sessionpractical');
// above one is to select the database 

$name = $_POST['user'];
$pass = $_POST['password'];
// to take in input values

$q = "select * from signin where name = '$name' && password = '$pass' ";
// it is the query which we will pass in database to check if there is any name or password same.

$result = mysqli_query($con, $q);
// now we will pass the query i.e. '$q' and we take all the rows matching to query passed 

$num = mysqli_num_rows($result);
// it will take the number of rows which were matched with query
// either it will be 1 or 0 

if($num==1){
    $_SESSION['username'] = $name;
    header('location:home.php');
}
else{
    // $qy = " insert into signin(name, password) values('$name', '$pass') ";
    // // query which we want to execute

    // mysqli_query($con, $qy);
    // // code to insert the query in db

    // now we dont need above data

    header('location:login.php');
    echo "Please enter valid credentials";

}



?>