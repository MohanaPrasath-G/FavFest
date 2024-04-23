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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cart Page</title>
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
      }.footer{
    background-image: url(	https://sun-themes.com/html/fooday/assets/images/background/bg7.jpg);
    background-size: cover;
    /* background-image: url(	https://sun-themes.com/html/fooday/assets/images/background/footer-bg.jpg); */
    height:auto;
    color:white;
}

    
    </style>
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
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item me-5">
            <a class="nav-link" href="home.php#cont">About</a>
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

    <div class="container my-5">
        <h1 class="text-center my-5">Your Cart</h1>

        <!-- Displaying cart items in a container -->
        <div class="cart-container">
            <!-- Cart items will be displayed here -->
        </div>

        <div class="text-end my-4 total-price">
            <h5>Total Price: $0.00</h5>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" onclick="clearCart()">Buy Now</button>
        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to remove item from the cart
        function removeFromCart(index) {
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            cartItems.splice(index, 1);
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            renderCartItems();
        }

        // Function to increment the quantity of an item
        function incrementQuantity(index) {
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            cartItems[index].quantity = cartItems[index].quantity + 1 || 1;
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            renderCartItems();
        }

        // Function to decrement the quantity of an item
        function decrementQuantity(index) {
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            if (cartItems[index].quantity > 1) {
                cartItems[index].quantity = cartItems[index].quantity - 1;
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
                renderCartItems();
            }
        }
        function clearCart() {
            localStorage.removeItem('cartItems');
            renderCartItems();
        }


        // Render the cart items and calculate the total price
        function renderCartItems() {
            const cartContainer = document.querySelector('.cart-container');
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            let totalPrice = 0;

            cartContainer.innerHTML = '';

            cartItems.forEach((item, index) => {
                const cartItem = document.createElement('div');
                const itemTotal = item.price * (item.quantity || 1);
                totalPrice += itemTotal;
                cartItem.innerHTML = `
                <div class="row my-4">
                    <div class="col-md">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="images/${item.image}" class="img-fluid rounded-start" alt="Product Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">${item.name}</h5>
                                        <p class="card-text">Price: $${item.price}</p>
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-secondary me-2" onclick="decrementQuantity(${index})">-</button>
                                            <span>${item.quantity || 1}</span>
                                            <button class="btn btn-secondary ms-2" onclick="incrementQuantity(${index})">+</button>
                                            <button class="btn btn-danger ms-2" onclick="removeFromCart(${index})">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                cartContainer.appendChild(cartItem);
            });

            const totalElement = document.querySelector('.total-price');
            totalElement.textContent = `Total Price: $${totalPrice.toFixed(2)}`;
        }

        // Render the initial cart items
        renderCartItems();
    </script>


</body>

</html>