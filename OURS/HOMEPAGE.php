<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login-&-register/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--Device scale & resolution-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Smart Groceries</title>

    <!--==Stylesheet/link to css file ====-->
    <link rel="stylesheet" type="text/css" href="css/homepage.css" />

    <!-- FONT_AWESOME ICONS-->
    <script
      src="https://kit.fontawesome.com/f3b87cd4bd.js"
      crossorigin="anonymous">
    </script>

    <!--JS file link for functionality-->
    <script src="js/script.js"></script>
    <script src="js/search.js"defer></script>

    <!--==fav-icon======-->
    <link rel="icon" href="images/fav-icon.png" type="image/png">

    <!--shortcut-icon-->
    <link rel="shortcut icon" type="image/png" href="OURS\images\fav-icon.png"/>


    <!--==code for font awesome cdn====-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

  </head>

  <!-- Visible portion of website-->
  <body>
    <!--==Navigation Header===-->
    <header class="header">
      <!--logo (leftmost)-->
      <a href="#"> <img class="logo" src="images/logo.png" /> </a>

      <!--menus in header-->
      <nav class="navbar">
        <a href="#category">Categories</a>
        <a href="features\smart_cart.html">Smart Cart</a>
        <a href="features\recommendations.html">Smart selections</a>
        <a href="features\orders.html">Orders</a>
        <a href="#contact">Contact Us</a>
        <a href="#about-us">About Us</a>
        <a href="login-&-register\logout.php" class="btn btn-warning">Logout</a>
      </nav>
      <!--menus in header-->

      <!--icons in header-->
      <div class="icons">
        <div class="fa fa-bars" id="menu-btn"></div>
        <div class="fa fa-search" id="search-btn"></div>
        <a href="features\cart.html"><div class="fa fa-shopping-cart" id="cart-btn"></div>
        <a href="login-&-register\login.php"><div class="fa fa-user" id="login-btn"></div>
      </div>
      <!-- search bar -->
      <form class="search-form">  
          <input type="search" id="search-box" placeholder="Search here..">
          <label for="search-box" class="fa fa-search"></label>
      </form>

      <!--icons in header-->
    </header>
    <!--==Navigation Header end===-->

    <!--==banner------------------->
    <section class="banner" id="home">
      <div class="content">
        <h1>EAT <span>S</span>mart</h1>
        <h1>LIVE <span>S</span>mart</h1>
        <h1>SHOP <span>S</span>mart</h1>

        <p>
          Explore our wide range of features aimed at delivering your fresh
          needs hassle-free right at your doorstep!
        </p>

        <!--<a href="#" class="btn">Explore features</a>-->
      </div>
    </section>
    <!--==banner-end--------------->

    <!--==category=========================================-->
    <!--heading---------------->
    <div class="category-heading">
      <h2>Categories</h2>
      <!-- <span> Show all </span> -->
    </div>
    <section id="category">
      <!--box-container---------->
      <div class="category-container">
        <!--box---------------->
        <a class="category-box" href="categories/Fruits and Vegetables.html">
          <img alt="Fruits and Vegetables" src="images/basket.png" />
          <span
            >Fruits & <br />
            Vegetables</span
          >
        </a>

        <!--box---------------->
        <a class="category-box" href="categories/Daily Essentials.html">
          <img alt="Daily Essentials" src="images/milk.png" />
          <span>Daily <br> Essentials</span>
        </a>
        <!--box---------------->
        <a class="category-box" href="categories/Rice and Flour.html">
          <img alt="Rice & flour" src="images/wheat-flour.png" />
          <span>Rice & Flour</span>
        </a>
        <!--box---------------->
        <a class="category-box" href="categories/Meats and Fish.html">
          <img alt="Fish" src="images/barbecue.png" />
          <span>Meats & Fish</span>
        </a>
        <!--box---------------->
        <a class="category-box" href="categories\Spices and dry fruits.html">
          <img alt="Spices" src="images/spices.png" />
          <span>Spices & <br> Dry fruits</span>
        </a>
        <!--box---------------->
        <a class="category-box" href="categories\Breakfast and cereal.html">
          <img alt="Breakfast & cereal" src="images/cereals.png" />
          <span>Breakfast & cereal</span>
        </a>
        <!-- box -->
        <a class="category-box" href="categories/Snacks and Drinks.html">
          <img alt="Snacks & Drinks" src="images/products.png" />
          <span>Snacks & Drinks</span>
        </a>  
        <!-- box -->
        <a class="category-box" href="categories/Health and Hygiene.html">
          <img alt="Health and Hygiene" src="images/shampoo.png" />
          <span>Health and Hygiene</span>

        </a>
      </div>
    </section>
    <!--category-end----------------------------------->

  </body>
</html>

<!-- DISCOUNT BANNER -->
<section class="discount-banner" id="home">
  <h2 class = 'sale-heading'>

    Sale ends in

  </h2>

  <div class="countdown-container">
      <div class="countdown-el days-c">
          <p class="big-text" id="days">0</p>
          <span>Days</span>
      </div>
      <div class="countdown-el hours-c">
          <p class="big-text" id="hours">0</p>
          <span>Hours</span>
      </div>
      <div class="countdown-el mins-c">
          <p class="big-text" id="mins">0</p>
          <span>Min</span>
      </div>
      <div class="countdown-el seconds-c">
          <p class="big-text" id="seconds">0</p>
          <span>Seconds</span>
      </div>
  </div>
</section>

<!-- Popular products -->
<div class="popular-product-text">
  <h2>Popular Products</h2>
</div>
<div class="productsnumber">
  <div class="product-card">
    <img
      src="https://5.imimg.com/data5/WY/UT/MY-26933826/apple-2g-china-1-kg.png"
      alt="Product 1"
      class="product-img"
    />
    <div class="product-details">
      <h3>Kashmiri Apple</h3>
      <p>1 kg</p>
      <p>1000</p>
    </div>
  </div>

  <div class="product-card">
    <img
      src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAYAqtrSsET_fmh0zq_T2ihv8hTE05phH2wQ&s"
      width="40px"
      ,
      height="40px"
      alt="Product 2"
      class="product-img"
    />
    <div class="product-details">
      <h3>Aashirvaad Atta</h3>
      <p>5 kg</p>
      <p>1250</p>
    </div>
  </div>

  <div class="product-card">
    <img
      src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWb9pWnxUOt7LaxFSZH20msJLWV1yyOHCgPQ&s"
      alt="Product 3"
      class="product-img"
    />
    <div class="product-details">
      <h3>Pulses</h3>
      <p>2 Kgs</p>
      <p>160</p>
    </div>
  </div>

  <div class="product-card">
    <img
      src="https://www.quickpantry.in/cdn/shop/products/maggi-masala-instant-noodles-pack-of-4-280-g-quick-pantry.jpg?crop=center&height=1200&v=1710538813&width=1200"
      alt="Product 4"
      class="product-img"
    />
    <div class="product-details">
      <h3>Maggie Classic</h3>
      <p>4 pack</p>
      <p>130</p>
    </div>
  </div>

  <div class="product-card">
    <img
      src="https://kmf-public.s3.ap-south-1.amazonaws.com/Samrudhi_500_ml_BIMUL_2_product_image_eebc55a74d.jpg"
      alt="Product 5"
      class="product-img"
    />
    <div class="product-details">
      <h3>Nandini Samrudhi Milk Pink</h3>
      <p>500 ml</p>
      <p>27</p>
    </div>
  </div>

  <div class="product-card">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4MbhhJn_nbbtUsPfcBqIMEQEuNqfHVj8iyliln4pitapGRW_Sjv--P0UmE8fkqD5q-bc&usqp=CAU" alt="Product 6" class="product-img"/>
    <div class="product-details">
      <h3>Thumps up</h3>
      <p>750 ml</p>
      <p>40</p>
    </div>
  </div>
</div>


<!------contact us--------------------------------->
  <div id="contact">
    <div class="container">
      <div class="row">
        <div class="contact-left">
          <h1 class="sub-title">Contact Us</h1>
          <p>
            <i class="fa-regular fa-paper-plane"></i>management@smartgroceries.dev
          </p>
          <p><i class="fa-solid fa-phone"></i>080-99816548</p>
          <div class="social-icons">
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
              ><i class="fa-brands fa-linkedin"></i
            ></a>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
              ><i class="fa-brands fa-github"></i
            ></a>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
              ><i class="fa-brands fa-youtube"></i
            ></a>
          </div>
          <a href="PICS/guide.docx" download class="btn btn2">Download Guide</a>
        </div>
        <div class="contact-right">
          <form name="submit-to-google-sheet">
            <input type="text" name="Name" placeholder="Your Name" required />
            <input type="text" name="Email" placeholder="Your email" required />
            <textarea
              name="Message"
              rows="3"
              placeholder="Your message"
            ></textarea>
            <button type="submit" class="btn btn2">Submit</button>
          </form>
          <span id="msg"></span>
        </div>
      </div>
    </div>
  </div>

  <!-- About Us Section -->
  <div id="about-us">
    <div class="container">
      <h1 class="sub-title">About Us</h1>
      <p>
        Welcome to Smart Groceries! This project aims to simulate a seamless and
        convenient shopping experience with our wide selection of groceries,
        tailored recommendations, and smart cart features. Our mission is to
        mimic a system which makes grocery shopping easy, personalized, and
        enjoyable for everyone.
      </p>
    </div>
  </div>
  <div class="copyright">
    <p>©️ Smart Groceries</p>
  </div>
</div>