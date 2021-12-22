<?php
ob_start();
session_start();
include './template/header.php';
if (!isset($_SESSION['admin'])) {
    header('location: login.php?rs=3');
}
$brands = new Brand;
$item;
if (isset($_GET['brand_id'])) {
    $item = $brands->getBrandById($_GET['brand_id']);
    if (!$item) {
        echo "<script>alert('Invalid ID!!');history.go(-1)</script>";
        exit();
    }
}

?>

<div id="form-addproduct">
    <form action="update.php" method="POST" enctype="multipart/form-data" class="form-add-product">
        <h2>Update Brand Form</h2>
        <div class="form-body">
            <input type="hidden" name="brand_id" value="<?= $_GET['brand_id'] ?>">
            <div class="drop-zone">
                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                <input type="file" name="image" class="drop-zone__input" accept="image/png, image/gif, image/jpeg" multiple>
            </div>
            <div class="content">
                <label>
                    Brand's name:
                    <input type="text" name="brand_name" value="<?=  $item[0]['brand_name']  ?>">
                </label>
            </div>
        </div>
        <button type="submit" name="updatebrand" class="addproduct">Update brand</button>
    </form>
</div>

<script>
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