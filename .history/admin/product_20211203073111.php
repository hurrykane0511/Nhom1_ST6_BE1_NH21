<?php
include './template/header.php';
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
            </div>
            <a href="#" class="add-btn">Add product <ion-icon name="add-circle-outline"></ion-icon></a>
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
            <a href="#" class="add-btn">Add Brand <ion-icon name="add-circle-outline"></ion-icon></a>
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
            <a href="#" class="add-btn">Add Type <ion-icon name="add-circle-outline"></ion-icon></a>
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
            <a href="#" class="add-btn">Add Range <ion-icon name="add-circle-outline"></ion-icon></a>
        </div>
    </div>
</div>

<div class="back-cover">
    <form class="product-infor__inner" action="addproduct" enctype="multipart/form-data" method="POST">
        <h2>Add product</h2>
        <div class="row">
            <label>
                Item name:
                <input type="text" class="item-name" name="itemName">
            </label>
            <label>
                Item gender:
                <select name="gender">
                    <option value="woment">woment</option>
                    <option value="man">man</option>
                    <option value="unisex">unisex</option>
                </select>
            </label>
            <label>
                Capacity:
                <input type="number" name="capacity" min="0" step="1">
            </label>
        </div>
        <div class="row">
            <label>Brand:
                <select name="brand">
                    <?php foreach ($brands->getAllBrand() as $key => $value) {
                    ?>
                        <option value="<?= $value['brand_id'] ?>"><?= $value['brand_name'] ?></option>
                    <?php
                    } ?>
                </select>
            </label>
            <label>Type:
                <select name="type">
                    <?php foreach ($ct->getAllType() as $key => $value) {
                    ?>
                        <option value="<?= $value['type_id'] ?>"><?= $value['type_name'] ?></option>
                    <?php
                    } ?>
                </select>
            </label>
            <label>Range:
                <select name="range">
                    <?php foreach ($ct->getAllRange() as $key => $value) {
                    ?>
                        <option value="<?= $value['range_id'] ?>"><?= $value['range_name'] ?></option>
                    <?php
                    } ?>
                </select>
            </label>
        </div>
        <div class="row">
            <label>
                Regular price:
                <input type="number" name="regular_price" min="0" step="0.5">
            </label>
            <label>
                Regular price:
                <input type="number" name="sales_price" min="0" step="0.5">
            </label>
        </div>

        <div class="row">
            <label>Status:
                <input type="number" name="status" max="1" min="0">
            </label>
            <label>Create at:
                <input type="date" name="create_at">
            </label>
            <label>Quantity:
                <input type="number" name="sales_qty" step="1">
            </label>
        </div>
        <div class="row">
            <label>
                Image:
                <textarea name="image_src" cols="30" rows="10"></textarea>
            </label>
        </div>
        <div class="row">
            <label>
                Description:
                <textarea name="description" cols="30" rows="10"></textarea>
            </label>
            <label>
                Item image:
                <input type="file" name="fileToUpload" id="fileToUpload">
            </label>
        </div>
        <div class="row">
            <button type="submit" name="addproduct">Submit</button>
        </div>
    </form>
</div>
<div class="back-cover">
    <form class="product-infor__inner" action="addproduct" enctype="multipart/form-data" method="POST">
        <h2>Add Type</h2>
        <div class="row">
            <label>
                Type name
                <input type="text" class="item-name" name="typename">
            </label>
        </div>
        <div class="row">
            <button type="addtype" name="addproduct">addtype</button>
        </div>
    </form>
</div>
<script>

</script>
<?php include './template/footer.php';
