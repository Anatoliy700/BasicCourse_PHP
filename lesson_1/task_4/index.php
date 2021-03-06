<?php
$headTitle = 'Home';
$header = '<div class="header-content">
    <a href="#" class="header-label">
      <img src="image/group-2.png" alt="Logo">
      Bran<span>d</span>
    </a>
    <div class="header-search">
      <div class="search__wrap">
        <select title="search" name="search" id="search">
          <option class="nav" value="Browse">Browse</option>
        </select>
        <input type="text" placeholder="Search for item...">
        <button></button>
      </div>
    </div>
    <div class="acc">
      <div class="acc__cart_wrap">
        <a href="#"><span id="count-goods"></span></a>
        <div id="wrap-top-basket" class="acc__cart">
        </div>
      </div>
      <div class="my-account__wrap">
        <select title="MyAccount" class="btn" name="account" id="account">
          <option value="MyAccount">MyAccount</option>
        </select>
      </div>
    </div>
  </div>';//строка 53
$forMenCategory = 'Hot deal';// 87
$forWomenCategory = '30% offer';// 96
$forKidsCategory = ' new arrivals';// 105
$forAccesoriesCategory = 'luxirous & trendy';// 115
$footer = '<div class="wrap-footer-content">
    <div class="footer-logo-copy">
      <div class="footer-logo">
        <img src="image/group-2.png" alt="Logo">
        Bran<span>d</span>
      </div>
      <div>
        Objectively transition extensive data rather than cross functional solutions. Monotonectally syndicate
        multidisciplinary materials before go forward benefits. Intrinsicly syndicate an expanded array of
        processes and cross-unit partnerships.
      </div>
      <div>
        Efficiently plagiarize 24/365 action items and focused infomediaries.
        Distinctively seize superior initiatives for wireless technologies. Dynamically optimize.
      </div>
    </div>
    <div class="footer-links__wrap">
      <div class="footer-company footer-links">
        <div>COMPANY</div>
        <a href="#">Home</a>
        <a href="#">Shop</a>
        <a href="#">About</a>
        <a href="#">How it Works</a>
        <a href="#">Contact</a>
      </div>
      <div class="footer-information footer-links">
        <div>INFORMATION</div>
        <a href="#">Tearms & Condition</a>
        <a href="#">Privacy Policy</a>
        <a href="#">How to Buy</a>
        <a href="#">How to Sell</a>
        <a href="#">Promotion</a>
      </div>
      <div class="footer-shop-category footer-links">
        <div>SHOP CATEGORY</div>
        <a href="#">Men</a>
        <a href="#">Women</a>
        <a href="#">Child</a>
        <a href="#">Apparel</a>
        <a href="#">Brows All</a>
      </div>
    </div>
  </div>';// 365
$dateCopyright = '2018';// 371
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?=$headTitle?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="components/jquery-ui/themes/base/all.css">
    <link rel="stylesheet" href="components/jquery-ui/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" href="components/jquery-ui/themes/smoothness/theme.css">
    <link rel="stylesheet" href="css/style.min.css">
</head>
<body>
<header class="header header_resp"><?=$header?></header>
<nav class="wrap-nav nav-resp">
  <input type="checkbox" id="navCheck" class="nav-open-check">
  <label for="navCheck" class="nav-open-click"></label>
  <ul class="nav">
    <li><a href="index.php">Home</a></li>
    <li><a href="comment.html">Comment</a></li>
    <li><a href="#">Man</a></li>
    <li><a href="#">Women</a></li>
    <li><a href="#">Kids</a></li>
    <li><a href="#">Accoseriese</a></li>
    <li><a href="#">Featured</a></li>
    <li><a href="#">Hot Deals</a></li>
  </ul>
</nav>
<div class="slider ">
  <div class="wrap-slider">
    <div class="slider-content__left">
      <img src="image/slider-left-img.jpg" alt="Slider image">
    </div>
    <div class="slider-content">
      <div class="slider-text">
        THE BRAND <br>
        <span>OF LUXERIOUS</span> <span>FASHION</span>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="category">
    <a class="category-item" href="#">
      <img src="image/for-men.png" alt="For-men">
      <div class="category-text__wrap">
        <span class="category-text">
          <?=$forMenCategory?> <br>
          <span>For men</span>
        </span>
      </div>
    </a>
    <a class="category-item" href="#">
      <img src="image/women.png" alt="Women">
      <div class="category-text__wrap">
       <span class="category-text">
          <?=$forWomenCategory?> <br>
          <span>Women</span>
        </span>
      </div>
    </a>
    <a class="category-item for-kids" href="#">
      <img src="image/for-kids.png" alt="FOR kids">
      <div class="category-text__wrap">
       <span class="category-text">
          <?=$forKidsCategory?> <br>
          <span>FOR kids</span>
        </span>
      </div>
    </a>
    <a class="category-item accesories" href="#">
      <img class="category-item__img-xl" src="image/accesories.png" alt="ACCESORIES">
      <img class="category-item__img-lg" src="image/accesories-min.jpg" alt="ACCESORIES">
      <div class="category-text__wrap">
       <span class="category-text">
          <?=$forAccesoriesCategory?> <br>
          <span>ACCESORIES</span>
        </span>
      </div>
    </a>
  </div>
  <div class="product">
    <div class="fetured">
      Fetured Items <br>
      <span>Shop for items based on what we featured in this week</span>
    </div>
    <div class="wrap-product-item">
      <div class="product-item" data-id="1">
        <div class="product-item__img">
          <img class='product-img' src="image/product-1.png" alt="Mango People T-shirt">
          <div class="product-item__img__hover">
            <button class="hover__btn" data-type="add" >Add to Cart</button>
          </div>
        </div>
        <div class="product-item__text">
          <span class="title-item">Mango People T-shirt</span>
          <span class="product-item__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.</span>
          <span class="price">$<span class="price-val">52.00</span></span>
        </div>
      </div>
      <div class="product-item" data-id="2">
        <div class="product-item__img">
          <img class='product-img' src="image/product-2.png" alt="Mango  People  T-shirt">
          <div class="product-item__img__hover">
            <button class="hover__btn" data-type="add" >Add to Cart</button>
          </div>
        </div>
        <div class="product-item__text">
          <span class="title-item">Mango People T-shirt</span>
          <span class="product-item__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool.</span>
          <span class="price">$<span class="price-val">52.00</span></span>
        </div>
      </div>
      <div class="product-item" data-id="3">
        <div class="product-item__img">
          <img class='product-img' src="image/product-3.png" alt="Mango  People  T-shirt">
          <div class="product-item__img__hover">
            <button class="hover__btn" data-type="add" >Add to Cart</button>
          </div>
        </div>
        <div class="product-item__text">
          <span class="title-item">Mango People T-shirt</span>
          <span class="product-item__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.</span>
          <span class="price">$<span class="price-val">52.00</span></span>
        </div>
      </div>
      <div class="product-item" data-id="4">
        <div class="product-item__img">
          <img class='product-img' src="image/product-4.png" alt="Mango  People  T-shirt">
          <div class="product-item__img__hover">
            <button class="hover__btn" data-type="add">Add to Cart</button>
          </div>
        </div>
        <div class="product-item__text">
          <span class="title-item">Mango People T-shirt</span>
          <span class="product-item__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool.</span>
          <span class="price">$<span class="price-val">52.00</span></span>
        </div>
      </div>
      <div class="product-item" data-id="5">
        <div class="product-item__img">
          <img class='product-img' src="image/product-5.png" alt="Mango  People  T-shirt">
          <div class="product-item__img__hover">
            <button class="hover__btn" data-type="add">Add to Cart</button>
          </div>
        </div>
        <div class="product-item__text">
          <span class="title-item">Mango People T-shirt</span>
          <span class="product-item__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi for this exclusive capsule collection.</span>
          <span class="price">$<span class="price-val">52.00</span></span>
        </div>
      </div>
      <div class="product-item" data-id="6">
        <div class="product-item__img">
          <img class='product-img' src="image/product-6.png" alt="Mango  People  T-shirt">
          <div class="product-item__img__hover">
            <button class="hover__btn" data-type="add">Add to Cart</button>
          </div>
        </div>
        <div class="product-item__text">
          <span class="title-item">Mango People T-shirt</span>
          <span class="product-item__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi for this exclusive capsule collection.</span>
          <span class="price">$<span class="price-val">52.00</span></span>
        </div>
      </div>
      <div class="product-item" data-id="7">
        <div class="product-item__img">
          <img class='product-img' src="image/product-7.png" alt="Mango  People  T-shirt">
          <div class="product-item__img__hover">
            <button class="hover__btn" data-type="add">Add to Cart</button>
          </div>
        </div>
        <div class="product-item__text">
          <span class="title-item">Mango People T-shirt</span>
          <span class="product-item__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.</span>
          <span class="price">$<span class="price-val">52.00</span></span>
        </div>
      </div>
      <div class="product-item" data-id="8">
        <div class="product-item__img">
          <img class='product-img' src="image/product-8.png" alt="Mango  People  T-shirt">
          <div class="product-item__img__hover">
            <button class="hover__btn" data-type="add">Add to Cart</button>
          </div>
        </div>
        <div class="product-item__text">
          <span class="title-item">Mango People T-shirt</span>
          <span class="product-item__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.</span>
          <span class="price">$<span class="price-val">52.00</span></span>
        </div>
      </div>
    </div>
    <div class="wrap-button-all-product">
      <button class="all-product_btn" href="#">Browse All Product &#10144;</button>
    </div>
  </div>
  <div class="feature">
    <div class="feature-banner">
      <img src="image/feature-banner.png" alt="feature-banner">
      <div class="feature-banner-text">
        <span>30% <span>OFFER</span></span> <br>
        FOR WOMEN
      </div>
    </div>
    <div class="feature-wrap-boxes">
      <div class="feature-box">
        <div class="feature-box-text">
          <span>Free Delivery</span>
          Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive models.
        </div>
      </div>
      <div class="feature-box">
        <div class="feature-box-text">
          <span>Sales & discounts</span>
          Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive models.
        </div>
      </div>
      <div class="feature-box">
        <div class="feature-box-text">
          <span>Quality assurance</span>
          Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive models.
        </div>
      </div>
    </div>
  </div>
</div>
<div class="logo-subscribe">
  <div class="logo-subscribe__wrap">
    <div class="logo-subscribe__logo">
      <div class="logo__wrap">
        <img src="image/logo-subscribe-1.jpg" alt="Logo 1">
        <img src="image/logo-subscribe-2.jpg" alt="Logo 2">
        <img src="image/logo-subscribe-3.jpg" alt="Logo 3">
        <img src="image/logo-subscribe-4.jpg" alt="Logo 4">
      </div>
    </div>
    <div class="logo-subscribe__subscribe">
      <div class="subscribe__wrap">
        <div class="subscribe-title">
          <span>Subscribe</span>
          FOR OUR NEWLETTER AND PROMOTION
        </div>
        <div class="subscribe-form">
          <input type="email" placeholder="Enter Your Email">
          <button class="btn">Subscribe</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="subscribe">
  <div class="wrap-subscribe-content">
    <div class="subscribe-content">
      <div class="subscribe-content-left">
        <div>
          “Vestibulum quis porttitor dui! Quisque viverra nunc mi,<br> a pulvinar purus condimentum a. Aliquam
          condimentum mattis neque sed pretium”
        </div>
        <div>
          <span>Bin Burhan</span>
          Dhaka, Bd
        </div>
        <div class="rectangle__wrap">
          <div class="rectangle-1"></div>
          <div class="rectangle-2"></div>
        </div>
      </div>
      <div class="subscribe-content-right">
        <div class="subscribe-title">
          <span>Subscribe</span>
          FOR OUR NEWLETTER AND PROMOTION
        </div>
        <div class="subscribe-form">
          <input type="email" placeholder="Enter Your Email">
          <button class="btn">Subscribe</button>
        </div>
      </div>
    </div>
    <div class="subscribe-shape"></div>
  </div>
</div>
<div class="footer">
  <?=$footer?>
</div>
<div class="copyright">
  <div class="wrap-copyright">
    <div class="copyright-text">
      &copy; <?=$dateCopyright?> Brand All Rights Reserved.
    </div>
    <div class="copyright-social">
      <a href="#">
        <i class="fa fa-facebook" aria-hidden="true"></i>
      </a>
      <a href="#">
        <i class="fa fa-twitter" aria-hidden="true"></i>
      </a>
      <a href="#">
        <i class="fa fa-linkedin" aria-hidden="true"></i>
      </a>
      <a href="#">
        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
      </a>
      <a href="#">
        <i class="fa fa-google-plus" aria-hidden="true"></i>
      </a>
    </div>
  </div>
</div>
<script src="components/jquery/dist/jquery.min.js"></script>
<script src="components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="components/jquery-ui/jquery-ui.min.js"></script>
<script src="js/main-out.min.js"></script>
</body>
</html>