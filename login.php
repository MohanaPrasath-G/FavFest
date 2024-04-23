<?php
session_start();
$conn=mysqli_connect('localhost','root','','favfest') or die('unable to connect');

?>
 <?php
        $value = $_POST['value'];

if($value=='user'){
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select = mysqli_query($conn, "SELECT * FROM user_cred WHERE username = '$username' AND password = '$password'");
    $row = mysqli_fetch_array($select);

    if (is_array($row)) {
        $_SESSION["username"] = $row["username"];
        $_SESSION["password"] = $row["password"];
        header("Location: home.php"); 
        exit;
    } else {
        echo '<script>alert("Invalid Username or Password");</script>';
        echo '<script>togglePopup();</script>';

    }
}
}
else{
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $select = mysqli_query($conn, "SELECT * FROM admin_cred WHERE username = '$username' AND password = '$password'");
        $row = mysqli_fetch_array($select);
    
        if (is_array($row)) {
            $_SESSION["username"] = $row["username"];
            $_SESSION["password"] = $row["password"];
            header("Location: admi.html"); 
            exit;
        } else {
            echo '<script>alert("Invalid Username or Password");</script>';
            echo '<script>togglePopup();</script>';
    
        }
    }
}
?>