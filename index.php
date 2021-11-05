<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/sass/style.css">
  <title>Fragrance Shop</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<?php
include './model/config.php';
include './model/dbconnect.php';
include './model/perfume.php';
$pf = new Perfume;
?>

<body>

  <div class="wraper">
    <div class="wrap">
      <div class="visual">

        <header class="header">
          <div class="header__inner">
            <div class="above-header">
              <p class="-contact"><span>Contact Us</span><span>123 456 789</span></p>
              <a href="../fragranceshopee/index.php" class="logo">THE<span>FRAGRANCE</span></a>
              <div class="header-action-icon">
                <div class="header-action search-site-wrap">
                  <button class="search-box-handle">
                    <svg class="svg-search" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 451 451" style="enable-background:new 0 0 451 451;" xml:space="preserve">
                      <g>
                        <path d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3   s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4   C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3   s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z"></path>
                      </g>
                    </svg>
                  </button>
                  <div class="search-popup">
                    <div class="search-popup__inner">
                      <div class="close-box search">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                        </svg>
                      </div>
                      <form action="">
                        <input type="text" name="text-search" class="search-inp" placeholder="Search our store">
                        <button type="submit" name="search" class="search-btn">
                          <svg class="svg-search" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 451 451" style="enable-background:new 0 0 451 451;" xml:space="preserve">
                            <g>
                              <path d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3   s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4   C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3   s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z"></path>
                            </g>
                          </svg>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="header-action account-site-wrap">
                  <a href="login.php?signin" class="search-box-handle">
                    <svg class="svg-account" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 488.9 488.9" style="enable-background:new 0 0 488.9 488.9;" xml:space="preserve">
                      <g>
                        <path d="M477.7,454.8v-26c0-26.5-12.4-52-33.1-68.1c-48.2-37.4-97.3-63.5-114.5-72.2v-29.7c3.5-7.8,6.4-16.3,8.6-25.5   c12.8-4.6,19.8-23.4,24.5-40c6.3-22.1,5.6-37.6-1.8-46.2c7.8-42.5,4.3-73.8-10.3-93.1c-7.7-10.1-16.7-14.4-22.7-16.3   c-4.3-6-13-16.1-27.7-24.2C285.5,4.5,268.4,0,249.6,0c-3.4,0-6.8,0.2-9.8,0.4c-8.4,0.4-16.7,2-24.9,4.7c-0.1,0-0.2,0.1-0.3,0.1   c-9,3.1-17.8,7.6-26.3,13.4c-9.7,6.2-18.6,13.6-26.3,21.8c-15.1,15.5-25.1,33-29.4,51.7c-4.1,15.5-4.4,31.1-1,46.4   c-1.8,1.3-3.4,2.8-4.8,4.6c-6.9,9.1-7.2,23.4-1.1,45.1c4.2,15,9.8,30.3,19.3,37.2c2.8,14.4,7.5,27.5,13.8,39.1v24.1   c-17.2,8.7-66.3,34.7-114.5,72.2c-20.7,16.1-33.1,41.5-33.1,68.1v26c0,18.8,15.3,34,34,34h398.5   C462.4,488.9,477.7,473.6,477.7,454.8z M35.6,454.8v-26c0-19,8.8-37.2,23.6-48.7c52-40.3,104.9-66.9,115-71.8   c5.6-2.7,9.1-8.3,9.1-14.6v-32.5c0-2.2-0.6-4.3-1.7-6.2c-6.6-11.2-11.2-24.6-13.5-39.9c-0.8-4.9-4.4-8.8-9.1-10   c-1.3-1.5-5-6.9-9.7-23.6c-3.9-13.8-3.6-20.2-3.2-22.5c3.9,0.2,7.8-1.6,10.3-4.7c2.6-3.3,3.3-7.7,1.9-11.6   c-5.2-14.5-5.8-29.4-1.8-44.6c3.4-14.6,11.2-28.2,23.3-40.6c6.5-7,14-13.1,22-18.2c0.1-0.1,0.3-0.2,0.4-0.3   c6.7-4.7,13.7-8.2,20.6-10.6c0.1,0,0.2-0.1,0.2-0.1c5.9-2,12-3.1,18.4-3.4c17.5-1.5,33.2,1.8,47.1,9.9   c15.2,8.4,21.4,19.4,21.4,19.4c1.9,3.9,5.3,6.2,9.7,6.5c0.3,0,6.8,1,12.4,8.9c5.9,8.4,14.3,30,3.8,80.4c-1.2,5.6,1.7,11.2,6.8,13.6   c0.5,1.8,1.3,7.9-3,23.1c-3.8,13.4-6.9,19.5-8.7,22.2c-2.3-0.4-4.7-0.2-6.9,0.8c-3.8,1.6-6.6,5.1-7.3,9.1c-2.1,12-5.5,22.8-9.9,32   c-0.8,1.7-1.2,3.5-1.2,5.3v37.6c0,6.3,3.5,11.8,9.1,14.6c10.1,4.9,63,31.6,114.9,71.8c14.8,11.5,23.6,29.7,23.6,48.7v26   c0,5.2-4.3,9.5-9.5,9.5H45.2C39.9,464.4,35.6,460.1,35.6,454.8z"></path>
                      </g>
                    </svg>
                  </a>

                </div>
                <div class="header-action cart-site-wrap">
                  <a href="javascript:void(0)" class="search-box-handle" id="cart-link">
                    <svg class="svg-cart" xmlns="http://www.w3.org/2000/svg" height="456pt" viewBox="0 -13 456.75885 456" width="456pt">
                      <path d="m150.355469 322.332031c-30.046875 0-54.402344 24.355469-54.402344 54.402344 0 30.042969 24.355469 54.398437 54.402344 54.398437 30.042969 0 54.398437-24.355468 54.398437-54.398437-.03125-30.03125-24.367187-54.371094-54.398437-54.402344zm0 88.800781c-19 0-34.402344-15.402343-34.402344-34.398437 0-19 15.402344-34.402344 34.402344-34.402344 18.996093 0 34.398437 15.402344 34.398437 34.402344 0 18.996094-15.402344 34.398437-34.398437 34.398437zm0 0"></path>
                      <path d="m446.855469 94.035156h-353.101563l-7.199218-40.300781c-4.4375-24.808594-23.882813-44.214844-48.699219-48.601563l-26.101563-4.597656c-5.441406-.96875-10.632812 2.660156-11.601562 8.097656-.964844 5.441407 2.660156 10.632813 8.101562 11.601563l26.199219 4.597656c16.53125 2.929688 29.472656 15.871094 32.402344 32.402344l35.398437 199.699219c4.179688 23.894531 24.941406 41.324218 49.199219 41.300781h210c22.0625.066406 41.546875-14.375 47.902344-35.5l47-155.800781c.871093-3.039063.320312-6.3125-1.5-8.898438-1.902344-2.503906-4.859375-3.980468-8-4zm-56.601563 162.796875c-3.773437 12.6875-15.464844 21.367188-28.699218 21.300781h-210c-14.566407.039063-27.035157-10.441406-29.5-24.800781l-24.699219-139.398437h336.097656zm0 0"></path>
                      <path d="m360.355469 322.332031c-30.046875 0-54.402344 24.355469-54.402344 54.402344 0 30.042969 24.355469 54.398437 54.402344 54.398437 30.042969 0 54.398437-24.355468 54.398437-54.398437-.03125-30.03125-24.367187-54.371094-54.398437-54.402344zm0 88.800781c-19 0-34.402344-15.402343-34.402344-34.398437 0-19 15.402344-34.402344 34.402344-34.402344 18.996093 0 34.398437 15.402344 34.398437 34.402344 0 18.996094-15.402344 34.398437-34.398437 34.398437zm0 0"></path>
                    </svg>
                  </a>
                  <div id="cart-container">

                  </div>
                </div>
              </div>
            </div>
            <div class="nav">
              <ul class="menu">
                <li><a href="#" class="menu-link">MEN'S COLOGNE</a></li>
                <li><a href="#" class="menu-link">WOMEN'S PERFUME</a></li>
                <li><a href="#" class="menu-link">UNISEX</a></li>
                <li><a href=".php?d=1" class="menu-link">BRANDS</a></li>
              </ul>
            </div>
          </div>
        </header>

        <div class="-scroll">
          <span class="-border"></span>
          <span class="-text">SCROLL</span>
        </div>

        <a href="#" class="-move">
          <span>Click Move</span>
          <div class="-circle">
            <img src="assets/images/arrow.svg" alt="Move">
          </div>
        </a>

        <?php include("./Template/slider.php") ?>
      </div>
      <!-- Intro -->
      <div class="intro">
        <div class="slogan-box__inner">
          <p class="slogan-content">
            <em>the scent is the first impression</em>, proud to be a convergence of magical fragrances, <span>TheFragrance</span> is a destination for style seekers. <br>
          </p>
        </div>
      </div>
      <!-- End Intro -->

      <!-- Showcase -->
      <div class="showcase">
        <div class="showcase-title-box">
          <h2 class="showcase-title">Our Favorite</h2>
          <p>Some of our favourite picks this week.</p>
        </div>
        <div class="showcase-inner">
          <?php foreach ($pf->getAllPerfume() as $row) {
          ?>
            <div class="product-card">
              <a href="#" class="img-link">
                <div class="product-img" style="background-image: url(./assets/images/products/<?php echo $row['image'] ?>);"></div>
              </a>
              <div class="card-content">
                <a href="#" class="product-link"><?php echo $row['perfume_name'] ?></a>
                <a href="#" class="producer"><?php echo $row['brand_name'] ?></a>
                <p class="price">£ <?php echo $row['price'] ?></p>
                <a href="javascript:void(0)" onclick="addCart(this);" class="add-cart-link" id="item-<?php echo $row['perfume_id'] ?>">add to cart</a>
              </div>
            </div>
          <?php
          } ?>
        </div>
      </div>
      <!-- End showcase -->

      <!-- Video -->
      <div class="video-box">
        <video autoplay=true loop=true muted=true src="./assets/video/banner.mp4"></video>
      </div>
      <!-- End Video -->

      <!-- Brands List -->
      <div class="brands-list">
        <div class="brands-list__inner">
          <?php
          for ($i = 1; $i <= 10; $i++) {
          ?>
            <div class="brand-box">
              <a href="#">
                <img src="./assets/images/brands/<?php echo $i ?>.jpeg" alt="brand">
              </a>
            </div>
          <?php
          }
          ?>
        </div>
      </div>


      <!--end Brands List -->

      <!-- FOOTER -->
      <footer class="footer">
        <div class="footer-wrap">
          <h2 class="footer-title">Join us</h2>
          <p>We will let you know when we have new arrivals, events and promo's don't worry we send them infrequently, just a friendly hi now and again!</p>
          <form class="subscribe-frm" action="">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <button type="submit" name="subscribe" class="btn-sb">
              <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-email" viewBox="0 0 64 64">
                <path d="M63 52H1V12h62zM1 12l25.68 24h9.72L63 12M21.82 31.68L1.56 51.16m60.78.78L41.27 31.68"></path>
              </svg>
            </button>
          </form>
        </div>
        <div class="footer-wrap above">
          <div class="social-icons">
            <a href="#" class="social-link">
              <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-instagram" viewBox="0 0 32 32">
                <path fill="#fff" d="M16 3.094c4.206 0 4.7.019 6.363.094 1.538.069 2.369.325 2.925.544.738.287 1.262.625 1.813 1.175s.894 1.075 1.175 1.813c.212.556.475 1.387.544 2.925.075 1.662.094 2.156.094 6.363s-.019 4.7-.094 6.363c-.069 1.538-.325 2.369-.544 2.925-.288.738-.625 1.262-1.175 1.813s-1.075.894-1.813 1.175c-.556.212-1.387.475-2.925.544-1.663.075-2.156.094-6.363.094s-4.7-.019-6.363-.094c-1.537-.069-2.369-.325-2.925-.544-.737-.288-1.263-.625-1.813-1.175s-.894-1.075-1.175-1.813c-.212-.556-.475-1.387-.544-2.925-.075-1.663-.094-2.156-.094-6.363s.019-4.7.094-6.363c.069-1.537.325-2.369.544-2.925.287-.737.625-1.263 1.175-1.813s1.075-.894 1.813-1.175c.556-.212 1.388-.475 2.925-.544 1.662-.081 2.156-.094 6.363-.094zm0-2.838c-4.275 0-4.813.019-6.494.094-1.675.075-2.819.344-3.819.731-1.037.4-1.913.944-2.788 1.819S1.486 4.656 1.08 5.688c-.387 1-.656 2.144-.731 3.825-.075 1.675-.094 2.213-.094 6.488s.019 4.813.094 6.494c.075 1.675.344 2.819.731 3.825.4 1.038.944 1.913 1.819 2.788s1.756 1.413 2.788 1.819c1 .387 2.144.656 3.825.731s2.213.094 6.494.094 4.813-.019 6.494-.094c1.675-.075 2.819-.344 3.825-.731 1.038-.4 1.913-.944 2.788-1.819s1.413-1.756 1.819-2.788c.387-1 .656-2.144.731-3.825s.094-2.212.094-6.494-.019-4.813-.094-6.494c-.075-1.675-.344-2.819-.731-3.825-.4-1.038-.944-1.913-1.819-2.788s-1.756-1.413-2.788-1.819c-1-.387-2.144-.656-3.825-.731C20.812.275 20.275.256 16 .256z"></path>
                <path fill="#fff" d="M16 7.912a8.088 8.088 0 0 0 0 16.175c4.463 0 8.087-3.625 8.087-8.088s-3.625-8.088-8.088-8.088zm0 13.338a5.25 5.25 0 1 1 0-10.5 5.25 5.25 0 1 1 0 10.5zM26.294 7.594a1.887 1.887 0 1 1-3.774.002 1.887 1.887 0 0 1 3.774-.003z"></path>
              </svg>
            </a>
            <a href="#" class="social-link">
              <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-facebook" viewBox="0 0 32 32">
                <path fill="#fff" d="M18.56 31.36V17.28h4.48l.64-5.12h-5.12v-3.2c0-1.28.64-2.56 2.56-2.56h2.56V1.28H19.2c-3.84 0-7.04 2.56-7.04 7.04v3.84H7.68v5.12h4.48v14.08h6.4z"></path>
              </svg>
            </a>
          </div>
          <ul class="site-footer__linklist">
            <li><a href="/pages/contact">Contact</a></li>
            <li><a href="/pages/faq">FAQ</a></li>
            <li><a href="/pages/shipping">Shipping</a></li>
            <li><a href="/pages/returns">Returns</a></li>
            <li><a href="/pages/terms-of-use">Terms of Use</a></li>
            <li><a href="/pages/privacy-policy">Privacy Policy</a></li>
          </ul>
        </div>
      </footer>
      <!-- ENDFOOTER -->
    </div>
</body>

<script src="./node_modules/gsap/dist/ScrollTrigger.min.js"></script>
<script src="./node_modules/gsap/dist/gsap.min.js"></script>
<script type="module" src="./modules/main.js"></script>

</html>

<script>
    "use strict";

    function addCart(item) {
      var xhttp;
      xhttp = new XMLHttpRequest();
      const cart = document.querySelector('#cart-container');
      xhttp.onreadystatechange = function() {
        cart.innerHTML = this.responseText;
      }
      cart.classList.add("active");
      xhttp.open("POST", "loadcart.php?id=" + item.getAttribute("id"), true);
      xhttp.send()
      $('body').on('click', '.drawer__close-button', function(e) {
        cart.classList.remove("active");
      })
    }

    function del_cart(id){
      var xhttp;
      xhttp = new XMLHttpRequest();
      const cart = document.querySelector('#cart-container');
      xhttp.onreadystatechange = function() {
        cart.innerHTML = this.responseText;
      }
      cart.classList.add("active");
      xhttp.open("POST", "loadcart.php?del=" + id, true);
      xhttp.send()
      $('body').on('click', '.drawer__close-button', function(e) {
        cart.classList.remove("active");
      })
    }
  </script>