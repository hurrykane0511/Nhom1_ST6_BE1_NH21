<?php
//if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
//{
include '../model/config.php';
include '../model/dbconnect.php';
include '../model/perfume.php';
include '../model/brand.php';
$pf = new Perfume();
$ct = new categories();
$brands = new Brand();
?>
<div class="product-panel">
    <div class="product-table">
        <h2>Product table</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th class="c">Image</th>
                    <th class="r">Regular price</th>
                    <th class="r">Sales off</th>
                    <th class="r">Capicity</th>
                    <th class="r">Active</th>
                    <th class="c">Delete</th>
                    <th class="c">Edit</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($pf->getAllPerfumes() as $key => $row) {
                ?>
                    <tr>
                        <td><?= $row['pf_id'] ?></td>
                        <td><?= $row['pf_name'] ?></td>
                        <td class="c"><img src="../assets/images/products/<?= explode("#", $row['image'])[0] ?>" alt=""></td>
                        <td class="r">£ <?= $row['regular_price'] ?></td>
                        <td class="r"><?= $row['sales_price'] == null ? "none" : "£ " . $row['sales_price'] ?></td>
                        <td class="r"><?= $row['capacity'] ?></td>
                        <td class="status r"><?= $row['status'] == 1 ? "available" : "sold out" ?></td>
                        <td class="c"><a href="#" class="del">
                                <ion-icon name="trash-outline"></ion-icon>
                            </a></td>
                        <td class="c"><a href="#" class="edit">
                                <ion-icon name="create-outline"></ion-icon>
                            </a></td>
                    </tr>
                <?php
                } ?>
            </tbody>

        </table>
        <a href="javascript:onPopup()" class="add-product">Add product <ion-icon name="add-circle-outline"></ion-icon></a>
    </div>

    <div class="brand-table">
        <h2>Brand table</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Brand</th>
                    <th class="c">Delete</th>
                    <th class="c">Edit</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($brands->getAllBrand() as $key => $row) {
                ?>
                    <tr>
                        <td><?= $row['brand_id'] ?></td>
                        <td><?= $row['brand_name'] ?></td>
                        <td class="c"><a href="#" class="del">
                                <ion-icon name="trash-outline"></ion-icon>
                            </a></td>
                        <td class="c"><a href="#" class="edit">
                                <ion-icon name="create-outline"></ion-icon>
                            </a></td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="categories-panel">
    <div class="type-table">
        <h2>Type table</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type name</th>
                    <th class="c">Delete</th>
                    <th class="c">Edit</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($ct->getAllType() as $key => $row) {
                ?>

                <?php
                } ?>
            </tbody>
        </table>
    </div>
    <div class="range-table">
        <h2>Range table</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Range name</th>
                    <th class="c">Delete</th>
                    <th class="c">Edit</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($ct->getAllRange() as $key => $row) {
                ?>
                    <tr>
                        <td><?= $row['range_id'] ?></td>
                        <td><?= $row['range_name'] ?></td>
                        <td class="c"><a href="#" class="del">
                                <ion-icon name="trash-outline"></ion-icon>
                            </a></td>
                        <td class="c"><a href="#" class="edit">
                                <ion-icon name="create-outline"></ion-icon>
                            </a></td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>
//<<<<<<< Updated upstream //<?php
//} else {
 //  die("Chặn truy cập");
//=======
//<?php 
//}
 //else {
  //  die ("Chặn truy cập trực tiếp");
//>>>>>>> Stashed changes
//} 
