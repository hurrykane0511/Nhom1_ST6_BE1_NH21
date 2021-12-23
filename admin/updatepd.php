<?php
ob_start();
session_start();

include './template/header.php';
if (!isset($_SESSION['admin'])) {
    header('location: login.php?rs=3');
}
$pf = new Perfume;
$item;
if (isset($_GET['pf_id'])) {
    $item = $pf->getPerfumeByID($_GET['pf_id']);
    if (!$item) {
        echo "<script>alert('Invalid ID!!');history.go(-1)</script>";
        exit();
    }
} else {
    header('location: index.php');
}
?>

<div id="form-addproduct">
    <form action="update.php" method="POST" enctype="multipart/form-data" class="form-add-product">
        <h2>Edit Product Form</h2>

        <div class="form-body">
            <input type="hidden" name="pf_id" value="<?= $item['pf_id'] ?>">
            <div class="drop-zone">
                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                <input type="file" data-default-file="../assets/images/products/<?=explode('#',$item['image'])[0]?>" name="image" class="drop-zone__input" id="image" accept="image/png, image/gif, image/jpeg">
            </div>
       
            <div class="content">
                <label>
                    Perfume's name:
                    <input type="text" name="pf_name" value="<?= $item['pf_name'] ?>">
                </label>
                <label>
                    Gender:
                    <select name="gender">
                        <?php
                        foreach ($pf->getGender() as $row) {
                        ?>
                            <option value="<?= $row['gender']; ?>" <?= $row['gender'] == $item['gender'] ?  'selected="selected"' : '' ?>"><?= $row['gender'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </label>
                <label>
                    Brand:
                    <select name="brand">
                        <?php
                        foreach ($brands->getAllBrand() as $row) {
                        ?>
                            <option value="<?= $row['brand_id'] ?>" <?= $row['brand_id'] == $item['brand_id'] ?  'selected="selected"' : '' ?>><?= $row['brand_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </label>
                <label>
                    Type:
                    <select name="type">
                        <?php
                        foreach ($ct->getAllType() as $row) {
                        ?>
                            <option value="<?= $row['type_id'] ?>" <?= $row['type_id'] == $item['type_id'] ?  'selected="selected"' : '' ?>><?= $row['type_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </label>
                <label>
                    Range:
                    <select name="range">
                        <?php
                        foreach ($ct->getAllRange() as $row) {
                        ?>
                            <option value="<?= $row['range_id'] ?>" <?= $row['range_id'] == $item['range_id'] ?  'selected="selected"' : '' ?>><?= $row['range_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </label>

                <div class="price-group">
                    <label>
                        Regular price(£):
                        <input type="number" name="regular_price" value="<?= $item['regular_price'] ?>" min="0" step="0.1">
                    </label>
                    <label>
                        Sales price(%):
                        <input type="number" name="sales_price" value="<?= $item['sales_price'] ?>" min="0" step="0.1">
                    </label>
                </div>
                <label>
                    Status:
                    <select name="status">
                        
                            <option value="1" <?= $item['status'] == 1 ?  'selected="selected"' : '' ?>>Available</option>
                            <option value="0" <?= $item['status'] == 0 ?  'selected="selected"' : '' ?>>Sold Out</option>
                    </select>
                </label>
                <label>
                    Capacity(ml):
                    <input type="number" name="capacity" value="<?= intval($item['capacity']) ?>">
                </label>
                <div>
                    Description:
                    <textarea name="description" id="editor"><?= $item['description'] ?></textarea>
                </div>
            </div>

        </div>

        <button type="submit" name="updateproduct" class="addproduct">Edit product</button>

    </form>
</div>
<script>

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
        const dropZoneElement = inputElement.closest(".drop-zone");

        dropZoneElement.addEventListener("click", (e) => {
            inputElement.click();
        });

        inputElement.addEventListener("change", (e) => {
            if (inputElement.files.length) {
                updateThumbnail(dropZoneElement, inputElement.files[0]);
            }
        });

        dropZoneElement.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropZoneElement.classList.add("drop-zone--over");
        });

        ["dragleave", "dragend"].forEach((type) => {
            dropZoneElement.addEventListener(type, (e) => {
                dropZoneElement.classList.remove("drop-zone--over");
            });
        });

        dropZoneElement.addEventListener("drop", (e) => {
            e.preventDefault();

            if (e.dataTransfer.files.length) {
                inputElement.files = e.dataTransfer.files;
                updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
            }

            dropZoneElement.classList.remove("drop-zone--over");
        });
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} dropZoneElement
     * @param {File} file
     */

    function updateThumbnail(dropZoneElement, file) {
        let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

        // First time - remove the prompt
        if (dropZoneElement.querySelector(".drop-zone__prompt")) {
            dropZoneElement.querySelector(".drop-zone__prompt").remove();
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("drop-zone__thumb");
            dropZoneElement.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files
        if (file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = () => {
                thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
            };
        } else {
            thumbnailElement.style.backgroundImage = null;
        }
    }
</script>
<?php include './template/footer.php' ?>