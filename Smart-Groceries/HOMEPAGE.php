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
    <link rel="stylesheet" href="css/items-&-cart.css">

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
    <div class="container">
      <!--==Navigation Header===-->
      <header class="header">
        <!--logo (leftmost)-->
        <a href="#"> <img class="logo" src="images/logo.png" /> </a>

        <!--menus in header-->
        <nav class="navbar">
          <a href="#category">Categories</a>
          <a href="features\smartcart.php">Smart Cart</a>
          <a href="features\recommendations.html">Smart selections</a>
          <a href="features\orders.html">Orders</a>
          <a href="#contact">Contact Us</a>
          <a href="#about-us">About Us</a>
        </nav>
        <!--menus in header-->

        <!--icons in header-->
        <!-- search bar -->
        <form class="search-form">  
            <input type="search" id="search-box" placeholder="Search here..">
            <label for="search-box" class="fa fa-search"></label>
        </form>
        <!-- 2 icons -->
        <div class="icons">
            <div class="fa fa-search" id="search-btn"></div>
            <div class="fa fa-shopping-cart" id="icon-cart">
              <span class="cart-counter"></span>
            </div>
            <a href="login-&-register/profile.php">
              <div class="fa fa-user" id="login-btn"></div>
            </a>
      </header>
      <!--==Navigation Header end===-->

      <!-- cart func -->
      <div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart">
          
        </div>
          <div class="btn">
            <button class="close">CLOSE</button>
            <a href="payment/Payment HTML.html">
              <button class="checkOut">CHECK OUT</button>
            </a>
        </div>
      </div>      
    </div>
    <script src="js/homepage.js"defer></script>
    <script src="js/cart.js"defer></script>



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
    <div class="category-heading ">
      <h2>Categories</h2>
      <span>
        <a href="all-products/all-items.php" class="show-all-button">Show All</a>
      </span>
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
      <h3><a href="Categories/Fruits and Vegetables.html">Kashmiri Apple</a></h3>
      <p>1 kg</p>
      <p>1000</p>
    </div>
  </div>

  <div class="product-card">
    <img
      src="https://admin.itcstore.in/media/catalog/category/urad_2.png"
      width="40px"
      height="40px"
      alt="Product 2"
      class="product-img"
    />
    <div class="product-details">
      <h3><a href="Categories/Rice and Flour.html">Aashirvaad Atta</a></h3>
      <p>5 kg</p>
      <p>1250</p>
    </div>
  </div>

  <div class="product-card">
    <img
      src="https://m.media-amazon.com/images/I/71arAlcbDGL.jpg"
      alt="Product 3"
      class="product-img"
    />
    <div class="product-details">
      <h3><a href="Categories/Rice and Flour.html">Pulses</a></h3>
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
      <h3><a href="Categories/Snacks and Drinks.html">Maggie Classic</a></h3>
      <p>4 pack</p>
      <p>130</p>
    </div>
  </div>

  <div class="product-card">
    <img
      src="images/milk.jpg"
      alt="Product 5"
      class="product-img"
    />
    <div class="product-details">
      <h3><a href="Categories/Daily-Essentials.html">Nandini Samrudhi Milk Pink</a></h3>
      <p>500 ml</p>
      <p>27</p>
    </div>
  </div>

  <div class="product-card">
    <img src="https://m.media-amazon.com/images/I/61yecBpCDhL.jpg" alt="Product 6" class="product-img"/>
    <div class="product-details">
      <h3><a href="Categories/Snacks and Drinks.html">Thumps up</a></h3>
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
            <i class="fa-regular fa-envelope"></i>help@smartgroceries.dev
          </p>
          <p><i class="fa-solid fa-phone"></i>080-99816548</p>
          <p style="padding-bottom: 5px;"><i class="fa-solid fa-map-pin"></i>Visit us here:</p>
          <div style="width: 90%; border-radius: 15px; overflow: hidden; box-shadow: 0 0.1rem 1rem rgba(0, 0, 0, 0.164);">
            <iframe 
                width="100%" 
                height="200" 
                frameborder="0" 
                scrolling="no" 
                marginheight="0" 
                marginwidth="0" 
                style="border-radius: 15px;" 
                src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Sir%20M%20Visvesvaraya%20Institute%20+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps tracker sport</a>
            </iframe>
          </div>
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
  <div class="social-icons"><center>
      <a target="_blank" href="https://github.com/Termi007xt/Mini_Project"
        ><i class="fa-brands fa-github"></i
      ></a>
      <a target="_blank" href="https://github.com/Termi007xt/Mini_Project"
        ><i class="fa-brands fa-linkedin"></i
      ></a>
      <a target="_blank" href="https://github.com/Termi007xt/Mini_Project"
        ><i class="fa-brands fa-youtube"></i
      ></a>
    </center></div>

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
    <p>&copy; Smart Groceries</p>
  </div>

</div>

<script>
      const scriptURL = 'https://script.google.com/macros/s/AKfycbxUs3_VJlRWedKHqDkeidvOgxJ91bnH-D3wkDk-WaPMVrfSqjW30zcn7ExLZpEbeBBr/exec'
      const form = document.forms['submit-to-google-sheet']
      const msg = document.getElementById("msg")
  
      form.addEventListener('submit', e => {
      e.preventDefault()
      fetch(scriptURL, { method: 'POST', body: new FormData(form)})
          .then(response => {
              msg.innerHTML = "Message Sent Successfully"
              setTimeout(function(){
                  msg.innerHTML = ""
              },5000)
              form.reset()
          })
          .catch(error => console.error('Error!', error.message))
      })
  </script>