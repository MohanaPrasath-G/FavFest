<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "favfest";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO user_cred (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Succesfully Submitted! ');

  window.location = 'login.html';

</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>