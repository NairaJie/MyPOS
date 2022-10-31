<?php
    // if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];


    // $mail = mail($name, $semail, $subject, $message);

    // if ($mail) {
    //   echo "<script>alert('Mail Send.');</script>";
    // }else {
    //   echo "<script>alert('Mail Not Send.');</script>";
    // }

    // }


//connect database

$host = "localhost";
$dbname = "db_mypos";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO mypos (name, email, subject, message)
        VALUES (?,?,?,?)" ;

$result=mysqli_query($conn, $sql);

$stmt = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);

mysqli_stmt_execute($stmt);

echo "pesan sudah terkirim" ;