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
                                <td class="c"><a href="delbrand.php?id=<?php echo $row['brand_id'] ?>" class="del">
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

<div class="back-cover ">
    <div class="title">
        <h2>Product Order Form</h2>
    </div>
    <div class="d-flex">
        <form action="" method="">
            <label>
                <span class="fname">First Name <span class="required">*</span></span>
                <input type="text" name="fname" />
            </label>
            <label>
                <span class="lname">Last Name <span class="required">*</span></span>
                <input type="text" name="lname" />
            </label>
            <label>
                <span>Company Name (Optional)</span>
                <input type="text" name="cn" />
            </label>
            <label>
                <span>Country <span class="required">*</span></span>
                <select name="selection">
                    <option value="select">Select a country...</option>
                    <option value="AFG">Afghanistan</option>
                    <option value="ZMB">Zambia</option>
                    <option value="ZWE">Zimbabwe</option>
                </select>
            </label>
            <label>
                <span>Street Address <span class="required">*</span></span>
                <input type="text" name="houseadd" placeholder="House number and street name" required />
            </label>
            <label>
                <span>&nbsp;</span>
                <input type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)" />
            </label>
            <label>
                <span>Town / City <span class="required">*</span></span>
                <input type="text" name="city" />
            </label>
            <label>
                <span>State / County <span class="required">*</span></span>
                <input type="text" name="city" />
            </label>
            <label>
                <span>Postcode / ZIP <span class="required">*</span></span>
                <input type="text" name="city" />
            </label>
            <label>
                <span>Phone <span class="required">*</span></span>
                <input type="tel" name="city" />
            </label>
            <label>
                <span>Email Address <span class="required">*</span></span>
                <input type="email" name="city" />
            </label>
        </form>
    </div>
</div>
<div class="back-cover">
    <form class="product-infor__inner" action="addtype" enctype="multipart/form-data" method="POST">
        <h2>Add Type</h2>
        <div class="row">
            <label>
                Type name
                <input type="text" class="item-name" name="type_name">
            </label>
        </div>
        <div class="row">
            <button type="submit" name="addtype">Submit</button>
        </div>
    </form>
</div>
<div class="back-cover">
    <form class="product-infor__inner" action="addbrand" enctype="multipart/form-data" method="POST">
        <h2>Add Brand</h2>
        <div class="row">
            <label>
                Brand name:
                <input type="text" class="item-name" name="brand_name">
            </label>

        </div>
        <div class="row">
            <label>
                Image:
                <textarea name="brand_image" cols="30" rows="10"></textarea>
            </label>
        </div>
        <div class="row">
            <label>
                Item image:
                <input type="file" name="fileToUpload" id="fileToUpload">
            </label>
        </div>
        <div class="row">
            <button type="submit" name="addbrand">Submit</button>
        </div>
    </form>
</div>
<script>

</script>
<?php include './template/footer.php';
