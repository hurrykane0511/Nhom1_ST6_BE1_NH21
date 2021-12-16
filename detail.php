<!DOCTYPE html>
<html lang="en">
<?php
include('./Template/head.php');
define("header_here", true);
include './model/config.php';
include './model/dbconnect.php';
include './model/perfume.php';
if(!isset($_GET['productId'])){
    header('location: index.php');
}
$pf = new Perfume;
if (isset($_GET['productId'])) {
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
                                <div class="pf-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>&nbsp;4.7 (28)</span>
                                    <span><a href="#" class="review-link">Read 28 reviews</a></span>
                                </div>
                                <p class="values"><span class="capacity"><?php echo $getPerfumeByID['capacity'] ?> - </span> <span class="price">£<?php echo $getPerfumeByID['regular_price'] ?><del></del> <?php echo $getPerfumeByID['sales_price'] ?></span></p>
                                <p class="description"><?php echo $getPerfumeByID['description'] ?></p>
                                <a href="javascript:void(0)" onclick="addCart(this);" class="addCart" id="item-<?php echo $_GET['productId'] ?>">Add to card</a>
                                <a href="#" class="buyNow">Buy it now</a>

                            </div>

                        </div>

                    </div>
                    <!-- Showcase -->
                    <div class="showcase">
                        <div class="showcase-title-box">
                            <h2 class="showcase-title">Related products</h2>
                        </div>
                        <div class="showcase-inner">
                            <?php foreach ($pf->getTopSell() as $row) {
                            ?>
                                <div class="product-card <?= $row['status'] == 1 ? "" : " sold-out" ?>">
                                    <a href="#" class="img-link">
                                        <div class="product-img" style="background-image: url(./assets/images/products/<?php echo explode("#", $row['image'])[0] ?>);"></div>
                                    </a>
                                    <div class="card-content">
                                        <a href="#" class="product-link"><?php echo $row['pf_name'] ?></a>
                                        <a href="#" class="producer"><?php echo $row['brand_name'] ?></a>
                                        <p class="price">
                                            <?php
                                            if ($row['sales_price'] != null) {
                                            ?>
                                                <del>£<?= $row['sales_price'] ?></del>&emsp;<big>£<?= $row['regular_price'] ?></big>
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

                    <div class="form-rating-wrap">

                        <form id="ratingForm" onsubmit="javascript:void(0)" class="rating-form">

                            <div class="head-form">
                                <h2 class="form-title">Customer reviews</h2>
                                <div class="review-parameter">
                                    <p class="num-review">No review yet</p>
                                    <a href="javascript:void(0)" class="write-review">Write review</a>
                                </div>
                            </div>
                            <input type="hidden" name="id_product" value="<?php echo $_GET['productId'] ?>">
                            <div class="input-wrap">
                                <label for="name">name</label>
                                <input type="text" name="name" id="name" placeholder="Enter your name" autocomplete="off">
                            </div>

                            <div class="input-wrap">
                                <label for="email">email</label>
                                <input type="text" name="email" id="email" placeholder="john.smith@example.com" autocomplete="off">
                            </div>


                            <fieldset class="rating">
                                <legend>Please rate:</legend>
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                            </fieldset>

                            <div class="clearfix"></div>

                            <div class="input-wrap">
                                <label for="title">review title</label>
                                <input type="text" name="title" id="title" placeholder="Give your review title" autocomplete="off">
                            </div>

                            <div class="input-wrap">
                                <label for="body">review body</label>
                                <textarea name="body" id="body" cols="30" placeholder="Write your comments here" rows="10"></textarea>
                            </div>
                            <button type="submit" class="submit clearfix" name="review_submit">Submit review</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    <?php }
include("./Template/footer.php") ?>
    </body>
    <script>
        function ValidateForm() {

            const rate = document.querySelectorAll('input[name="rating"]:checked');
            const form = document.querySelector('#ratingForm');
            if (!rate.length > 0) {
                return;
            }

            var xhr = new XMLHttpRequest();
            var formData = new FormData(form);

            
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    console.log(this.response);
                }
            };
            xhr.open('POST', 'rating.php', true);
            xhr.send(formData);

        }
    </script>
    <script src="./node_modules/gsap/dist/ScrollTrigger.min.js"></script>
    <script src="./node_modules/gsap/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drift-zoom/1.3.1/Drift.min.js"></script>
    <script type="module" src="./modules/detail.js"></script>

</html>

<?php include './Template/ajax.php' ?>