<?php 
include '../model/config.php';
include '../model/dbconnect.php';
include '../model/perfume.php';
include '../model/brand.php';
$pf = new Perfume();
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
                    <td class="r">£ <?= $row['regular_price'] ?></td>
                    <td class="r"><?= $row['sales_price'] == null ? "none" : "£ ".$row['sales_price']?></td>
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

    <div class="popup">
        <div class="popup-template">
            <div class="popup-close" onclick="close_pop()">
                <ion-icon name="close-outline"></ion-icon>
            </div>
            <div class="popup-form">
                <div class="form-row">
                    <div class="form-row1">
                        <h1>First Name</h1>
                        <input type="text" name="" id="">
                    </div>
                    <div class="form-row1">
                        <h1>Last Name</h1>
                        <input type="text" name="" id="">
                    </div>
                    <div class="form-row1">
                        <h1>Email</h1>
                        <input type="text" name="" id="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-row1">
                        <h1>Phone</h1>
                        <input type="text" name="" id="">
                    </div>
                    <div class="form-row1">
                        <h1>City</h1>
                        <input type="text" name="" id="">
                    </div>
                    <div class="form-row1">
                        <h1>Country</h1>
                        <input type="text" name="" id="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-row1">
                        <h1>Address</h1>
                        <textarea name="" id=""></textarea>
                    </div>
                    <div class="form-row1">
                        <h1>Message</h1>
                        <textarea name="" id=""></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-row1"><button class="submit-popup">Submit</button></div>
                </div>
            </div>
        </div>
    </div>
</div>