<?php session_start();
define("header_here", true)
?>
<!DOCTYPE html>
<html lang="en">
<?php
include './Template/head.php';
include './model/config.php';
include './model/dbconnect.php';
include './model/perfume.php';
include './model/brand.php';
$pf = new Perfume;
$brand = new Brand;
?>

<body>
  <div class="wraper">
    <div class="wrap">
      <div class="visual">
        
        <?= include './Template/header.php' ?>

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
          <?php foreach ($pf->getTopSell() as $row) {
          ?>
            <div class="product-card <?= $row['status'] == 1 ? "" : " sold-out" ?>">
              <a href="detail.php?productId=<?php echo $row['pf_id']?>" class="img-link">
                <div class="product-img" style="background-image: url(./assets/images/products/<?php echo explode("#", $row['image'])[0] ?>);"></div>
              </a>
              <div class="card-content">
                <a href="detail.php?productId=<?php echo $row['pf_id']?>" class="product-link"><?php echo $row['pf_name'] ?></a>
                <a href="#" class="producer"><?php echo $row['brand_name'] ?></a>
                <p class="price">
                  <?php
                  if ($row['sales_price'] != 0) {
                  ?>
                    <del>£<?=$row['regular_price'] ?></del>&emsp;<big>£<?= $row['regular_price'] - (($row['regular_price'] / 100) * $row['sales_price']) ?></big>
                  <?php
                  } else {
                  ?>
                    <big>£<?= $row['regular_price'] ?></big>
                  <?php
                  }
                  ?>
                </p>
                <a href="javascript:void(0)" onclick="addCart(this);" class="add-cart-link" id="item-<?php echo $row['pf_id'] ?>"><?= $row['status'] == 1 ? "add to cart" : " sold out" ?></a>
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
          foreach ($brand->getAllBrandLiMit() as $row) {
          ?>
            <div class="brand-box">
              <a href="result.php?brand_id=<?php echo $row['brand_id']?>">
                <img src="./assets/images/brands/<?php echo $row['brand_image']?>" alt="brand" >
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

<?php include './Template/ajax.php' ?>