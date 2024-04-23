<?php
session_start();
$conn=mysqli_connect('localhost','root','','favfest') or die('unable to connect');

if(isset($_SESSION['username'])){
    $name=$_SESSION['username'];
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("Location:login.html");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favfest</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="home.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./images/icon.jpg" rel="icon">
    <link rel="stylesheet" href="home.css">
    <script src="home.js"></script>
    <style>
      body{
        background-color: rgb(112, 108, 108);
        font-family: sans-serif;
      }
      .nav {
        background-color: #504b48 !important;
        color: aliceblue;
        border: none;
        box-shadow: none;
      }
        .car{
          height:600px !important;
        }
      .cont{
        height: auto;
        background-color: rgb(74, 70, 50);
      }
      .abt1{
        background-color: #dd7230;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .abt2{
        background-color: #f4c95d;
       text-align: center;
       padding: 6%;
      }
      .carousel-item {
    transition: transform 2s !important; /* Adjust the time (2s) to control the slide speed */
  }
  .card img{
      height:250px;
  }
  </style>
   <script>
        function addToCart(name, price, image) {
            const item = {
                name: name,
                price: price,
                image: image
            };
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            cartItems.push(item);
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
        }
    </script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-light nav sticky-top ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        Favfest
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  justify-content-end me-5 " id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class="nav-item me-5 ">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item me-5">
            <a class="nav-link" href="#cont">About</a>
          </li>
          <li class="nav-item me-5">
            <a class="nav-link" href="#footer">Contact</a>
          </li>
          <!-- Update your navigation links -->
          <li class="nav-item me-5">
            <a class="nav-link" href="cart.php">Cart</a>
          </li>

      </ul>
      <span class="nav-item dropdown me-5">
                   <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false"><i class="bi bi-person-circle text-light "></i>
                   </a>
                   <ul class="dropdown-menu">
                       <li class="dropdown-item">
                           <?php echo $name; ?>
                       </li>
                       <li><a class="dropdown-item" href="?logout=true">Logout</li></a>
                   </ul>
               </span>
      </div>
    </div>
  </nav>
  
  <div id="carouselExampleInterval" class="carousel slide car" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
        <div class="carousel-inner">
          <div class="carousel-item car active" data-bs-interval="1000">
            <!-- <img src="https://t3.ftcdn.net/jpg/05/40/55/96/240_F_540559655_0apbLqRakMu4p5h3ghBXTAYzkVpn5jTu.jpg " class="d-block w-100 car" alt="...">  -->
            <img src="./Images/food2.jpg" class="d-block w-100 car" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item car" data-bs-interval="1000">
            <img src="./Images/fresh-gourmet-meal-beef-taco-salad-plate-generated-by-ai.jpg" class="d-block w-100 car" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
                </div>
          <div class="carousel-item car" data-bs-interval="1000">
            <img src="./Images/food3.jpg" class="d-block w-100 car" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  
      <div class="container-fluid cont" height="200px" id="cont">
        <div class="row">
          <div class="col-md-6 abt1 ">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGJenI7612lOG5L53KZKMEqfGwE6aI9Dls7w&usqp=CAU" alt="" style="margin: auto;">
          </div>
          <div class="col-md-6 abt2">
            <h1>About us</h1>
            <p+>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis expedita dicta quidem esse cumque ipsam, repellat omnis dolor iure tenetur rem cupiditate totam quae dolorum, accusantium necessitatibus iusto laborum voluptates?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil excepturi, possimus, debitis dolorum voluptate, fugit deserunt pariatur soluta atque qui praesentium! Provident vitae quos voluptates soluta culpa ea ullam quod.
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam veniam sunt laborum, id pariatur sit commodi cupiditate ipsam quod aut voluptatum cum expedita nulla eveniet perferendis sequi quos dolorem magni.
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut iste illum voluptate dolores quidem, sed ducimus, molestias nulla, dolor cum voluptates. Reprehenderit illo blanditiis consequuntur corrupti excepturi tenetur voluptatem consectetur?
            </p>
          </div>
        </div>
      </div>
      <div class="container-fluid card_cont">
        <div class="btn_cont">
          <button class="button bg-success " id="breakfast_btn" >Breakfast</button>
          <button class="button bg-success" id="lunch_btn" >Lunch</button>
          <button class="button bg-success" id="dinner_btn" >Dinner</button>
      </div>
      

      <div class="breakfast food-cards" id="">
        <?php

          $sql = "select * from food";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo '
                  <div class="card cardcont" id="' . $row["category"] . '" style="width: 18rem;">
                      <img src="./Images/' . $row["image"] . '" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">' . $row["name"] . '</h5>
                          <p class="card-text">' . $row["description"] . '</p>
                          <p>Price :₹' . $row["price"] . '</p> 
                          <center>
                          <!-- Add this button inside the food card loop -->
                          <button class="btn btn-primary" onclick="addToCart(\'' . $row["name"] . '\', \'' . $row["price"] . '\', \'' . $row["image"] . '\')" >Add to Cart</button>
                          </center>
                      </div>
                  </div>';
              }
          }
          ?>

        </div>
          <!-- Add more food cards as needed -->
      
      </div>


      <div class="footer" id="footer">
        <div class="container" >
          <div class="row">
            <div class="col-md-8">
              <div style="margin-top: 20px;padding: 50px;">
                <div>
                <h2>Favfest</h2>
                <p style="margin-top: 50px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda at, perferendis unde eum delectus ipsam quaerat dicta dignissimos. Consectetur cum adipisci ipsum voluptatum in magni itaque enim tenetur vero quasi!
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum fugiat iure ipsam voluptas expedita et, doloribus tenetur adipisci numquam vitae in sequi aliquid nihil eos placeat fuga ratione totam eaque.
                </p>
                <hr style="background-color: white;">
              </div>
              <div class="row">
              <div style="display: flex;align-items: center;gap: 10px;" class="col-md-4">
                <div><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#f5f5f5}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg></div>
                <div style="margin-top:15px ;">
                <p>157 White Oak Drive Kansas City</p>
                 <p> 689 Lynn Street South Boston</p>
                </div>
              </div>
              <div style="display: flex;align-items: center;gap: 10px;"  class="col-md-4">
                <div><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><style>svg{fill:#f5f5f5}</style><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg></div>
                <div style="margin-top:15px ;">
                <p>+91 9384906336</p>
                 <p>+91 9003566035</p>
                </div>
              </div>
              <div style="display: flex;align-items: center;gap: 10px;" class="col-md-4">
                <div><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><style>svg{fill:#f2f6fd}</style><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg></div>
                <div style="margin-top:15px ;">
                <p>admin@favfest.com</p>
                 <p>support@favfest.com</p>
                </div>
              </div>
              
            </div>
            </div>
            </div>
          
            <div class="col-md-4">
              <div style="margin-top: 100px;padding: 50px;">
                <h3>Branches</h3>
                <ul style="margin-left: 20px;">
                  <li>Chennai</li>
                  <li>Coimbatore</li>
                  <li>Erode</li>
                  <li>Madurai</li>
                </ul>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
</body>
</body>
</html>










































































































<!-- <div class="card" style="width: 18rem; background: #d8d6d6;">
          <img src="./Images/dosa_1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

        <div class="card" style="width: 18rem;">
          <img src="./Images/idli.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <p>price:150</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

        <div class="card" style="width: 18rem;">
          <img src="./Images/poori.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        </div>


        <div class="lunch food-cards" id="lunch">

          <div class="card" style="width: 18rem;">
            <img src="./Images/meals.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="./Images/biriyani.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="./Images/fried rice.webp" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>

        </div>

        <div class="dinner food-cards" id="dinner">

          <div class="card" style="width: 18rem;">
            <img src="./Images/grill.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="./Images/shawarma.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="./Images/parrota1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
 -->
