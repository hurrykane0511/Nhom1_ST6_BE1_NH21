<?php
ob_start();
session_start();

include './template/header.php';
if (!isset($_SESSION['admin'])) {
    header('location: login.php?rs=3');
}

?>

<div id="form-addproduct">
    <form action="update.php" method="POST" enctype="multipart/form-data" class="form-add-product">
        <h2>Update Type Form</h2>
        <div class="form-body">
        <input type="hidden" name="type_id" value="<?= $_GET['type_id'] ?>">
            <div class="content">
                <label>
                    Type's name:
                    <input type="text" name="type_name">
                </label>
            </div>
        </div>
        <button type="submit" name="updatetype" class="addproduct">Update type</button>
    </form>
</div>

<?php include './template/footer.php' ?>