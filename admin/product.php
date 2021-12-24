<?php
ob_start();
session_start();
include './template/header.php';
if (!isset($_SESSION['admin'])) {
    header('location: login.php');
}

?>
<div class="wraper">
    <div class="product-panel">
        <div class="product-table">
            <h2>Product table</h2>
            <div class="scrollable-table">
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
                                <td class="r"><?= $row['sales_price'] == null ? "none" :  $row['sales_price'].'%' ?></td>
                                <td class="r"><?= $row['capacity'] ?></td>
                                <td class="status r"><?= $row['status'] == 1 ? "available" : "sold out" ?></td>
                                <td class="c"><a href="del.php?delpf=<?= $row['pf_id'] ?>" class="del">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a></td>
                                <td class="c"><a href="updatepd.php?pf_id=<?= $row['pf_id']  ?>" class="edit">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a></td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
            <a href="addproduct.php" class="add-btn">Add product <ion-icon name="add-circle-outline"></ion-icon></a>
        </div>

        <div class="brand-table">
            <h2>Brand table</h2>
            <div class="scrollable-table">
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
                                <td class="c"><a href="del.php?delbr=<?php echo $row['brand_id'] ?>" class="del">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a></td>
                                <td class="c"><a href="updatebrand.php?brand_id=<?= $row['brand_id'] ?>" class="edit">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a></td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
            <a href="addbrand.php" class="add-btn">Add Brand <ion-icon name="add-circle-outline"></ion-icon></a>
        </div>
    </div>
    <div class="categories-panel">
        <div class="type-table">
            <h2>Type table</h2>
            <div class="scrollable-table">
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
                            <tr>
                                <th><?= $row['type_id'] ?></th>
                                <th><?= $row['type_name'] ?></th>
                                <td class="c"><a href="del.php?deltype=<?= $row['type_id'] ?>" class="del">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a></td>
                                <td class="c"><a href="updatetype.php?type_id=<?= $row['type_id'] ?>" class="edit">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a></td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
            <a href="addtype.php" class="add-btn">Add Type <ion-icon name="add-circle-outline"></ion-icon></a>
        </div>
        <div class="range-table">
            <h2>Range table</h2>
            <div class="scrollable-table">
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
                                <td class="c"><a href="del.php?delrange=<?=$row['range_id']?>" class="del">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a></td>
                                <td class="c"><a href="updaterange.php?range_id=<?= $row['range_id'] ?>" class="edit">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a></td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
            <a href="addrange.php" class="add-btn">Add Range <ion-icon name="add-circle-outline"></ion-icon></a>
        </div>
    </div>
</div>

<?php include './template/footer.php';
if (isset($_GET['addrs'])) {

    if ($_GET['addrs'] == 1) {
        echo "<script>alert('Add data successfully !!');</script>";
    } else {
        echo "<script>alert('Add data failed !!');</script>";
    }
}

if (isset($_GET['delrs'])) {
    if ($_GET['delrs'] == 1) {
        echo "<script>alert('Delete data successfully !!');</script>";
    } else {
        echo "<script>alert('Delete data failed !!');</script>";
    }
}
if (isset($_GET['uprs'])) {
    if ($_GET['uprs'] == 1) {
        echo "<script>alert('Update data successfully !!');</script>";
    } else {
        echo "<script>alert('Update data failed !!');</script>";
    }
}

if (!isset($_SESSION['admin'])) {
    header('location: login.php');
}

?>