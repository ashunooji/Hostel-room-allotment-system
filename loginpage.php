<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sample";

//creating database connection
$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn)
{
    die("failed to connect" . mysqli_connect_errno());
}

if(isset($_POST["submit"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1)
    {
        //authentication successful
        //start session and redirect to dashboard
        header("Location: http://localhost/Practice/Hostel-room-allotment-system-main/controllerpage1.html");
    }
    else
    {
        //authentication failed
        echo "Invalid username or password.";
    }
}

mysqli_close($conn);
?>
