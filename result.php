<!DOCTYPE html>
<html lang="en">
<?php

define("header_here", true);

include './Template/head.php';
include './model/config.php';
include './model/dbconnect.php';
include './model/perfume.php';
include './model/pagitation.php';
include './model/brand.php';

$paginator = new Paginator;
$brands = new Brand;
$pf = new Perfume;
?>

<body>
    <div class="wraper">
        <div class="wrap">
            <div class="visual-page">
                <?php include './Template/header.php' ?>
                <div class="search-title">
                    <?php if (isset($_GET['keyword'])) {

                    ?>
                        <p>Search result for <span class="keyword"><?= $_GET['keyword'] ?></span></p>
                    <?php
                    }
                    ?>
                </div>
                <div class="filter-wraper">
                    <div class="filter-inner">
                        <div class="select-boxs">
                            <div class="select-box">

                                <select id="selected_brand">
                                    <option selected disabled hidden value="all">-- Brand --</option>
                                    <?php
                                    foreach ($brands->getAllBrand() as $key => $value) {
                                    ?>
                                        <option value="<?= $value['brand_id'] ?>"><?= $value['brand_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="select-box">

                                <select id="selected_gender">
                                    <option value="all" selected disabled hidden>-- Gender --</option>
                                    <?php
                                    foreach ($pf->getGender() as $key => $value) {
                                    ?>
                                        <option value="<?= $value['gender'] ?>"><?= $value['gender'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="select-box">

                                <select id="selected_category">
                                    <option value="all" selected disabled hidden>-- Categories --</option>

                                </select>

                            </div>
                            <div class="select-box">

                                <select id="selected_type">
                                    <option value="all" selected disabled hidden>-- Perfume type --</option>
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
                        <?php
                        $cur_page = 1;
                        if (isset($_GET['page'])) {
                            $cur_page = $_GET['page'];
                        }
                        foreach ($paginator->getData($cur_page) as $key => $row) {
                        ?>
                            <div class="pf-cart">

                                <a href="#" class="img_link">
                                    <img src="./assets/images/products/<?= explode("#", $row['image'])[0]; ?>" alt="#">
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
                        <?php

                        }
                        ?>
                    </div>
                </div>
                <div class="content_detail__pagination">

                    <?php
                    if ($cur_page != 1) {
                    ?>
                        <a href="?page=<?= ($cur_page - 1) ?>"><span>Pre</span></a>
                        <?php
                    }
                    for ($i = 1; $i <= $paginator->getPage(); $i++) {
                        if ($cur_page != $i) {
                        ?>
                            <a href="?page=<?= $i ?>" class="page-num"><span><?= $i ?></span></a>
                        <?php
                        } else {


                        ?>
                            <a href="?page=<?= $i ?>" class="page-num active"><span><?= $i ?></span></a>
                        <?php
                        }
                    }
                    if ($cur_page != $paginator->getPage()) {
                        ?>
                        <a href="?page=<?= ($cur_page + 1) ?>"><span>Next</span></a>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <?php include("./Template/footer.php") ?>
</body>
<script>

</script>
<script type="module" src="./modules/result.js"></script>

</html>
<?php include './Template/ajax.php' ?>