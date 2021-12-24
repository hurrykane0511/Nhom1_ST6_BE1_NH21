<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include('./Template/head.php');
define("header_here", true);
include './model/config.php';
include './model/dbconnect.php';
include './model/perfume.php';
if (!isset($_GET['productId'])) {
    header('location: index.php');
}

$pf = new Perfume;
if (isset($_GET['productId'])) {
    if (!$pf->getPerfumeByID($_GET['productId'])) {
        header('location: ./');
        exit;
    }
    $getPerfumeByID = $pf->getPerfumeByID($_GET['productId'])
?>

    <body>
        <div class="wraper">
            <div class="wrap">
                <div class="visual-page">
                    <?php include './Template/header.php' ?>

                    <div class="detail-wraper">
                        <div class="detail-container">
                            <div class="img-container">
                                <div class="imgs-container">
                                    <?php
                                    $image = $getPerfumeByID['image'];
                                    $arrimage = explode("#", $image);
                                    ?>
                                    <a href="#" class="img-link1 active"><img src="./assets/images/products/<?php echo $arrimage[0] ?>" alt=""></a>
                                    <a href="#" class="img-link1"><img src="./assets/images/products/<?php echo $arrimage[1] ?>" alt=""></a>
                                    <a href="#" class="img-link1"><img src="./assets/images/products/<?php echo $arrimage[2] ?>" alt=""></a>
                                </div>
                                <div class="main-image">
                                    <div class="img-box" style="--i:0">
                                        <img src="./assets/images/products/<?php echo $arrimage[0] ?>" data-zoom="./assets/images/products/<?php echo $arrimage[0] ?>" alt="error" class="img" id="img1">
                                    </div>
                                    <div class="img-box" style="--i:1">
                                        <img src="./assets/images/products/<?php echo $arrimage[1] ?>" data-zoom="./assets/images/products/<?php echo $arrimage[1] ?>" alt="error" class="img" id="img2">
                                    </div>
                                    <div class="img-box" style="--i:2">
                                        <img src="./assets/images/products/<?php echo $arrimage[2] ?>" data-zoom="./assets/images/products/<?php echo $arrimage[2] ?>" alt="error" class="img" id="img3">
                                    </div>
                                </div>
                            </div>

                            <div class="content-container" id="imgDetails">
                                Remain

                                <h2 class="pf-name"><?php echo $getPerfumeByID['pf_name'] ?></h2>
                                <p class="brand"><?php echo $getPerfumeByID['brand_name'] ?></p>

                                <p class="values"><span class="capacity"><?php echo $getPerfumeByID['capacity'] ?> - </span>

                                    <?php
                                    if ($getPerfumeByID['sales_price'] != 0) {
                                    ?>
                                        <del>£<?= $getPerfumeByID['regular_price'] ?></del>&emsp;<big>£<?= $getPerfumeByID['regular_price'] - (($getPerfumeByID['regular_price'] / 100) * $getPerfumeByID['sales_price']) ?></big>
                                    <?php
                                    } else {
                                    ?>
                                        <big>£<?= $getPerfumeByID['regular_price'] ?></big>
                                    <?php
                                    }
                                    ?>
                                </p>
                                <p class="description"><?php echo $getPerfumeByID['description'] ?></p>
                                <?php
                                if ($getPerfumeByID['status'] == 1) {
                                ?>
                                    <a href="javascript:void(0)" onclick="addCart(this);" class="addCart" id="item-<?php echo $_GET['productId'] ?>">Add to card</a>
                                <?php
                                }
                                else{
                                    ?>
                                     <a href="javascript:void(0)" class="addCart" disabled>Sold Out</a>
                                    <?php
                                }
                                ?>
                                <?php  
     $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || 
     $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
     $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=1309726042773427&autoLogAppEvents=1" nonce="WMaUa2w0"></script>
<div class="fb-share-button" data-href="<?= $CurPageURL ?>" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F<?= $CurPageURL ?>%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>


                            </div>

                        </div>

                    </div>
                    <!-- Showcase -->
                    <div class="showcase">
                        <div class="showcase-title-box">
                            <h2 class="showcase-title">Related products</h2>
                        </div>
                        <div class="showcase-inner">
                            <?php foreach ($pf->getPerfumeRalated($getPerfumeByID['brand_id']) as $row) {
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

                </div>

            </div>


        </div>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=1309726042773427&autoLogAppEvents=1" nonce="om69d1be"></script>
        <div class="comments" >
          <div style="padding:30px;background:#fff;margin: 20px">
                <?PHP
            $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            echo "<div class='fb-comments' data-href='$url' data-num-posts='10' data-width='1222'></div>";
            ?>
          </div>
        </div>
    <?php }
include("./Template/footer.php")
    ?>

    </body>

    <script src="./node_modules/gsap/dist/ScrollTrigger.min.js"></script>
    <script src="./node_modules/gsap/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drift-zoom/1.3.1/Drift.min.js"></script>
    <script type="module" src="./modules/detail.js"></script>

</html>

<?php include './Template/ajax.php' ?>