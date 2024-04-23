<?php

$conn= new mysqli("localhost",'root',"","favfest");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$image = $_POST['image'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$category = $_POST['category'];


$sql = "INSERT INTO food (name,image,description,price,category) VALUES ('$name', '$image', '$desc','$price','$category')";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Succesfully inserted! ');

  window.location = 'home.php';

</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

