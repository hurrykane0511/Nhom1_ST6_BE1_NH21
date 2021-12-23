<?php

ob_start();
session_start();

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
            <a href="detail.php?productId=<?= $value['pf_id'] ?>"><img class="item-img" src="./assets/images/products/<?php echo $value['image'] ?>" alt=""></a>
            <a href="result.php?brand_name=<?php echo $value['brand_name'] ?>">
                <p class="item-brand"><?php echo $value['brand_name'] ?></p>
            </a>
            <a href="detail.php?productId=<?= $value['pf_id'] ?>">
                <p class="item-name"><?php echo $value['pf_name'] ?></p>
            </a>
            <div class="link-wrap">
                <a href="#" onclick="addCart(this);" class="addcart" id="item-<?php echo $value['pf_id'] ?>">
                    <p>Add to cart</p>
                </a>
                <a href="detail.php?productId=<?= $value['pf_id'] ?>" class="detail">
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
