<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: ../login-&-register/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <script
      src="https://kit.fontawesome.com/f3b87cd4bd.js"
      crossorigin="anonymous">
    </script>
  

    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="../css/items-&-cart.css">
    

  </head>
  <body>
    
    <div class="container">
        
            <header class="header">
                <!--logo (leftmost)-->
                <a href="../HOMEPAGE.php">
                  <img class="logo" src="../images/logo.png"/>
                </a>
          
                <!--menus in header-->
                <nav class="navbar">
                  <a href="../homepage.html#category">Categories</a>
                  <a href="../features/smart_cart.html">Smart Cart</a>
                  <a href="../features/recommendations.html">Smart selections</a>
                  <a href="../features/orders.html">Orders</a>
                </nav>
                <!--menus in header-->
          
                <!--icons in header-->
                <div class="icons">
                    <div class="fa fa-shopping-cart" id="icon-cart"></div>
                    <span class="cart-count">0</span>
                </div>
                <!--icons in header-->
              
            </header>
        <div class="listProduct">
          <div class="item">
            <img src="product_images/Screenshot 2024-12-01 154113.png" alt="">
            <h2>Product Name</h2>
            <div class="price">₹200</div>
            <button class="addCart">Add To cart</button>
          </div>
        </div>
        
      <div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart">
         
        </div>
          <div class="grand-total">Grand Total:</div>
          <div class="btn">
            <button class="close">CLOSE</button>
            <a href="../payment/Payment HTML.html">
              <button class="checkOut">CHECK OUT</button>
            </a>
          </div>
        
        </div>
      </div>
    </div>  
    <script src="app.js"></script>
  </body>
</html>