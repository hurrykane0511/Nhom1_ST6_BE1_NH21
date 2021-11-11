<!DOCTYPE html>
<html lang="en">
<?php
include './Template/head.php';
include './model/config.php';
include './model/dbconnect.php';
include './model/perfume.php';
include './model/pagitation.php';
$paginator = new Paginator;
?>

<body>
    <div class="wraper">
        <div class="wrap">
            <div class="visual-page">
                <?php include './Template/header.php' ?>
                <div class="search-title">
                    <p>Search result for <span class="keyword">Armani</span></p>
                </div>
                <div class="filter-wraper">
                    <div class="filter-inner">
                        <div class="select-boxs">
                            <div class="select-box">

                                <select>
                                    <option selected disabled hidden>-- Brand --</option>
                                    <option value=""></option>
                                </select>

                            </div>
                            <div class="select-box">

                                <select>
                                    <option value="" selected disabled hidden>-- Perfume type --</option>
                                </select>

                            </div>
                            <div class="select-box">

                                <select>
                                    <option value="" selected disabled hidden>-- Perfume type --</option>
                                </select>

                            </div>
                            <div class="select-box">

                                <select>
                                    <option value="" selected disabled hidden>-- Gender --</option>
                                </select>

                            </div>
                            <div class="price-box">
                                Price:
                                <span>£ <input type="number" min="0" max="200" id="min" value="0"> - </span>
                                <span>£ <input type="number" max="200" min="0" id="max" value="200"></span>
                            </div>
                            <div class="sort-by">
                                Sort by:
                                <span>
                                    <select name="catogery" id="attr-sort">
                                        <option value="A-Z">A-Z</option>
                                        <option value="Review count">Review count</option>
                                        <option value="Review rating">Review rating</option>
                                        <option value="Price: Low to High">Price: Low to High</option>
                                        <option value="Price: Hign to Low">Price: Hign to Low</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="display-product">
                    <div class="display-product__inner">
                        <?php foreach ($paginator->getData(1) as $key => $row) { ?>
                            <div class="pf-cart">

                                <a href="#" class="img_link">
                                    <img src="./assets/images/products/<?= $row['image']; ?>" alt="#">
                                </a>
                                <div class="pf-content">
                                    <a href="#" class="pf-brand">
                                        <p> <?= $row['brand_name']; ?> </p>
                                    </a>
                                    <a href="#" class="pf-name">
                                        <p> <?= $row['pf_name']; ?> </p>
                                    </a>
                                    <div class="review">
                                        <button class="star"><span class="stararea checked">★</span></button>
                                        <button class="star"><span class="stararea checked">★</span></button>
                                        <button class="star"><span class="stararea checked">★</span></button>
                                        <button class="star"><span class="stararea checked">★</span></button>
                                        <button class="star"><span class="stararea">★</span></button>
                                    </div>
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
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="content_detail__pagination" actpage="1">
                    <a href="pre"><span>Pre</span></a>
                    <a href="pre" class="page-num"><span>1</span></a>
                    <a href="pre" class="page-num"><span>2</span></a>
                    <a href="pre" class="page-num"><span>3</span></a>
                    <p class="three-dots">...</p>
                    <a href="pre" class="page-num"><span>9</span></a>
                    <a href="pre" class="page-num"><span>10</span></a>
                    <a href="pre"><span>Next</span></a>
                </div>
            </div>
        </div>
    </div>
    <?php include("./Template/footer.php") ?>
</body>

<script type="module" src="./modules/result.js"></script>

</html>
<?php include './Template/ajax.php' ?>