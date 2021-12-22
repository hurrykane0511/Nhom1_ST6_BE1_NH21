<?php
ob_start();
session_start();

include './template/header.php';
if (!isset($_SESSION['admin'])) {
    header('location: login.php?rs=3');
}

?>

<div id="form-addproduct">
    <form action="process.php" method="POST" enctype="multipart/form-data" class="form-add-product">
        <h2>Add Product Form</h2>

        <div class="form-body">

            <div class="drop-zone">
                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                <input type="file" name="image" class="drop-zone__input" accept="image/png, image/gif, image/jpeg" multiple>
            </div>


            <div class="content">
                <label>
                    Perfume's name:
                    <input type="text" name="pf_name">
                </label>
                <label>
                    Gender:
                    <select name="gender">
                        <?php
                        foreach ($pf->getGender() as $row) {
                        ?>
                            <option value="<?= $row['gender'] ?>"><?= $row['gender'] ?></option>
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
                            <option value="<?= $row['brand_id'] ?>"><?= $row['brand_name'] ?></option>
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
                            <option value="<?= $row['type_id'] ?>"><?= $row['type_name'] ?></option>
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
                            <option value="<?= $row['range_id'] ?>"><?= $row['range_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </label>

                <div class="price-group">
                    <label>
                        Regular price(£):
                        <input type="number" name="regular_price" value="0" min="0">
                    </label>
                    <label>
                        Sales price(%):
                        <input type="number" name="sales_price" value="0" min="0">
                    </label>
                </div>
                <label>
                    Capacity(ml):
                    <input type="number" name="capacity" value="100">
                </label>
                <div>
                    Description:
                    <textarea name="description" id="editor"></textarea>
                </div>
            </div>

        </div>

        <button type="submit" name="addproduct" class="addproduct">Add product</button>

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