<?php
ob_start();
?>
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
include './model/categories.php';
$paginator = new Paginator;
$brands = new Brand;
$pf = new Perfume;
$ctg = new categories();


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
                    <div class="filter-wraper__inner">
                        <div class="list" role="listbox">
                            <h2>Sort by</h2>
                            <ul class="dropdown-menu">
                                <li>
                                    <label>
                                        <input type="radio" name="sort" onchange="loadProduct();" checked value="pf_name ASC">
                                        <i></i>
                                        <span class="label">A-Z</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="sort" onchange="loadProduct();" value="regular_price desc">
                                        <i></i>
                                        <span class="label">Price from high to low</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="sort" onchange="loadProduct();" value="regular_price ASC">
                                        <i></i>
                                        <span class="label">Price from low to high</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="list" role="listbox">
                            <h2>Brand</h2>
                            <ul class="dropdown-menu">
                                <?php foreach ($brands->getAllBrand() as $key => $row) {
                                ?>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="brand[]" <?= isset($_GET['brand_name']) && $_GET['brand_name'] == $row['brand_name'] ? "checked" : "" ?> onchange="loadProduct()" value="<?= $row['brand_name'] ?>">
                                            <i></i>
                                            <span class="label"><?= $row['brand_name'] ?></span>
                                        </label>
                                    </li>
                                <?php
                                } ?>
                            </ul>
                        </div>
                        <div class="list" role="listbox">
                            <h2>Gender</h2>
                            <ul class="dropdown-menu">
                                <?php foreach ($pf->getGender() as $key => $row) {
                                ?>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="gender[]" <?= isset($_GET['gender']) && $_GET['gender'] == $row['gender'] ? "checked" : "" ?> onchange="loadProduct()" value="<?= $row['gender'] ?>">
                                            <i></i>
                                            <span class="label"><?= $row['gender'] ?></span>
                                        </label>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="list" role="listbox">
                            <h2>Type</h2>
                            <ul class="dropdown-menu">
                                <?php foreach ($ctg->getAllType() as $key => $row) {
                                ?>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="type[]" onchange="loadProduct()" value="<?= $row['type_name'] ?>">
                                            <i></i>
                                            <span class="label"><?= $row['type_name'] ?></span>
                                        </label>
                                    </li>
                                <?php
                                }
                                ?>

                            </ul>

                        </div>
                        <div class="list" role="listbox">
                            <h2>Range</h2>
                            <ul class="dropdown-menu">
                                <?php foreach ($ctg->getAllRange() as $key => $row) {
                                ?>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="range[]" onchange="loadProduct()" value="<?= $row['range_name'] ?>">
                                            <i></i>
                                            <span class="label"><?= $row['range_name'] ?></span>
                                        </label>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="list" role="listbox">
                            <h2>Price</h2>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="range-slider">
                                        <span>
                                            <input type="number" name="min_price" value="0" min="0" max="200">£-
                                            <input type="number" name="max_price" value="200" min="0" max="200">£
                                        </span>
                                        <span>
                                            <input value="0" min="0" max="200" onchange="loadProduct()" step="1" type="range">
                                            <input value="200" min="0" max="200" onchange="loadProduct()" step="1" type="range">
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearArea">
                        <a href="javascript:clearFilter()" class="clearFilter">Clear Filter</a>
                    </div>
                </div>

                <div class="display-product">
                    <div class="display-product__inner">
                        
                    </div>
                </div>
                <div class="content_detail__pagination">

                </div>
            </div>


        </div>
        <div class="test">

        </div>
    </div>

    <?php include("./Template/footer.php") ?>
</body>
<script>
    loadProduct(1);

    function loadProduct(page = 1) {
        let query = makeFilter();
        console.log('loadproducts.php?page=' + page + query);
        var req = new XMLHttpRequest();
        req.responseType = 'json';
        req.open('GET', 'loadproducts.php?page=' + page + query, true);
        req.onload = function() {
            var jsonResponse = req.response;
            let html = '';
            console.log(jsonResponse);
            if (jsonResponse) {
                for (var i = 0; i < jsonResponse.length - 1; i++) {
                    if(jsonResponse[i].status == 1){
                        html += '<div class="pf-cart">';
                    }
                    else{
                        html += '<div class="pf-cart" style="opacity: 0.5;">';
                    }
                    html += '<a href="detail.php?productId=' + jsonResponse[i].pf_id + '" class="img_link">'
                    html += '<img src="./assets/images/products/' + jsonResponse[i].image + '" alt="#">'
                    html += '</a>';
                    html += '<div class="pf-content">';
                    html += '<a href="#" class="pf-brand">';
                    html += '<p>' + jsonResponse[i].brand_name + '</p>';
                    html += '</a>';
                    html += '<a href="detail.php?productId=' + jsonResponse[i].pf_id + '" class="pf-name">'
                    html += '<p>' + jsonResponse[i].pf_name + '</p>';
                    html += '</a>'
                    html += '<p class="price">';

                    if (jsonResponse[i].sales_price) {
                        let reg = jsonResponse[i].regular_price;
                        let sales = jsonResponse[i].sales_price;
                        html += '<del>£' + jsonResponse[i].regular_price + '</del> <big>£ ' + ((reg - ((reg / 100) * sales))) + '</big >';
                    } else {
                        html += '<big>£' + jsonResponse[i].regular_price + '</big>';
                    }

                    html += '</p>';
                    if(jsonResponse[i].status == 1){
                         html += '<a href="javascript:void(0)" onclick="addCart(this);" class="add-cart-link" id="item-' + jsonResponse[i].pf_id + '">Add to cart</a>';
                    }
                    else{
                        html += '<a href="javascript:void(0)" class="add-cart-link" disabled>Sold Out</a>';
                    }
                    html += '</div>';
                    html += '</div>';
                }
                console.log(jsonResponse);

                const productArea = document.querySelector('.display-product__inner');

                productArea.innerHTML = html;
                document.querySelector('.filter-wraper').scrollIntoView({
                    behavior: 'smooth'
                });
                let pageObj = jsonResponse[jsonResponse.length - 1];
                let page_html = '';
                if (pageObj.totalPage > 1) {
                    for (let i = 1; i <= pageObj.totalPage; i++) {
                        if (i != pageObj.currPage) {
                            page_html += '<a href="javascript:loadProduct(' + i + ')" class="page-num"><span>' + i + '</span></a>';
                        } else {
                            page_html += '<a href="?page=' + i + '" class="page-num active "><span>' + i + '</span></a>'
                        }
                    }
                    document.querySelector('.content_detail__pagination').innerHTML = page_html;
                } else {
                    document.querySelector('.content_detail__pagination').innerHTML = '';
                }
                document.querySelector('content_detail__pagination');

            } else {
                document.querySelector('.display-product__inner').innerHTML = "Not found";
            }

        };
        req.send(null);
    }

    function $(selectorAll) {
        let checkboxes = document.getElementsByName(`${selectorAll}[]`);
        let arr = '';
        for (let i = 0, n = checkboxes.length; i < n; i++) {
            if (checkboxes[i].checked) {
                arr += checkboxes[i].value + ',';
            }
        }
        return arr;
    }

    function unchecked(selectorAll) {
        let checkboxes = document.getElementsByName(`${selectorAll}[]`);

        for (let i = 0, n = checkboxes.length; i < n; i++) {
            if (checkboxes[i].checked) {
                checkboxes[i].checked = false;
            }
        }
    }

    function clearFilter() {
        window.location = window.location.href.split("?")[0];
    }

    function makeFilter() {

        let brands = $('brand'),
            type = $('type'),
            range = $('range'),
            gender = $('gender'),
            min = document.getElementsByName('min_price')[0].value,
            max = document.getElementsByName('max_price')[0].value,
            sort = document.querySelector('input[name="sort"]:checked').value,
            kw = document.querySelector('.keyword');

        let query = '';
        if (brands !== '') {
            query += '&brand=' + brands.replace('&', '%26') + '';
        }
        if (type !== '') {
            query += '&type=' + type + '';
        }
        if (range !== '') {
            query += '&range=' + range + '';
        }
        if (gender !== '') {
            query += '&gender=' + gender + '';
        }
        if (sort !== '') {
            query += '&sort=' + sort + '';
        }
        if (kw) {
            query += '&keyword=' + kw.textContent + '';
        }

        query += '&min=' + min + '';
        query += '&max=' + max + '';

        return query;
    }
</script>
<script type="module" src="./modules/result.js"></script>

</html>
<?php include './Template/ajax.php' ?>