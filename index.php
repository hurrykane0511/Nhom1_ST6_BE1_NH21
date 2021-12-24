<?php
ob_start();
session_start();
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
              <a href="detail.php?productId=<?php echo $row['pf_id'] ?>" class="img-link">
                <div class="product-img" style="background-image: url(./assets/images/products/<?php echo explode("#", $row['image'])[0] ?>);"></div>
              </a>
              <div class="card-content">
                <a href="detail.php?productId=<?php echo $row['pf_id'] ?>" class="product-link"><?php echo $row['pf_name'] ?></a>
                <a href="result.php?brand_name=<?php echo str_replace("&", "%26", $row['brand_name']) ?>" class="producer"><?php echo $row['brand_name'] ?></a>
                <p class="price">
                  <?php
                  if ($row['sales_price'] != 0) {
                  ?>
                    <del>£<?= $row['regular_price'] ?></del>&emsp;<big>£<?= $row['regular_price'] - (($row['regular_price'] / 100) * $row['sales_price']) ?></big>
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

      <!-- Showcase new-->
      <div class="showcase">
        <div class="showcase-title-box">
          <h2 class="showcase-title">New Fragrance</h2>
          <p>Some of our favourite picks this week.</p>
        </div>
        <div class="showcase-inner">
          <?php foreach ($pf->getNewProduct() as $row) {
          ?>
            <div class="product-card <?= $row['status'] == 1 ? "" : " sold-out" ?>">
              <a href="detail.php?productId=<?php echo $row['pf_id'] ?>" class="img-link">
                <div class="product-img" style="background-image: url(./assets/images/products/<?php echo explode("#", $row['image'])[0] ?>);"></div>
              </a>
              <div class="card-content">
                <a href="detail.php?productId=<?php echo $row['pf_id'] ?>" class="product-link"><?php echo $row['pf_name'] ?></a>
                <a href="result.php?brand_name=<?php echo str_replace("&", "%26", $row['brand_name']) ?>" class="producer"><?php echo $row['brand_name'] ?></a>
                <p class="price">
                  <?php
                  if ($row['sales_price'] != 0) {
                  ?>
                    <del>£<?= $row['regular_price'] ?></del>&emsp;<big>£<?= $row['regular_price'] - (($row['regular_price'] / 100) * $row['sales_price']) ?></big>
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
      <!-- End showcase new-->

      <!-- Brands List -->
      <div class="brands-list">
        <div class="brands-list__inner">
          <?php
          foreach ($brand->getAllBrandLiMit() as $row) {
          ?>
            <div class="brand-box">
              <a href="result.php?brand_name=<?php echo $row['brand_name'] ?>">
                <img src="./assets/images/brands/<?php echo $row['brand_image'] ?>" alt="brand">
              </a>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <!--end Brands List -->

      <!-- FOOTER -->
      <?php include './Template/footer.php' ?>
      <!-- ENDFOOTER -->
    </div>
</body>
<script>
  <?php

  if (isset($_GET['rp'])) {
    echo 'alert("' . $_GET["rp"] . '")';
  }

  ?>
</script>
<script src="./node_modules/gsap/dist/ScrollTrigger.min.js"></script>
<script src="./node_modules/gsap/dist/gsap.min.js"></script>
<script type="module" src="./modules/main.js"></script>

</html>

<?php include './Template/ajax.php' ?>