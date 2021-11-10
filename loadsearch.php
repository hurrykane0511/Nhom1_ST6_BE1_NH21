<?php
include './model/dbconnect.php';
include './model/config.php';
include './model/perfume.php';

$pf = new Perfume();
if (isset($_GET['kw'])) {
    $keyword = $_GET['kw'];
    $result = $pf->getPerfumeSearch($keyword);
?>
    <div class="display-search-items">
        <?php foreach ($result as $value) {?>
        <div class="item">
            <a href="#"><img class="item-img" src="./assets/images/products/<?php echo $value['image'] ?>" alt=""></a>
            <a href="#">
                <p class="item-brand">Armani</p>
            </a>
            <a href="#">
                <p class="item-name"><?php echo $value['pf_name'] ?></p>
            </a>
            <div class="link-wrap">
                <a href="#" class="addcart">
                    <p>Add to cart</p>
                </a>
                <a href="#" class="detail">
                    <p>See detail...</p>
                </a>
            </div>
        </div>
       <?php
        }
        ?>

    </div>

<?php

}
?>