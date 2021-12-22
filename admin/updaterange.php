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
        <h2>Update Range Form</h2>
        <div class="form-body">
            <input type="hidden" name="range_id" value="<?= $_GET['range_id'] ?>">
            <div class="content">
                <label>
                    Range's name:
                    <input type="text" name="range_name">
                </label>
            </div>
            
        </div>
        <button type="submit" name="updaterange" class="addproduct">Update range</button>
    </form>
</div>

<?php include './template/footer.php' ?>