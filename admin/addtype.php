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
        <h2>Add Type Form</h2>
        <div class="form-body">

            <div class="content">
                <label>
                    Type's name:
                    <input type="text" name="type_name">
                </label>
            </div>
        </div>
        <button type="submit" name="addtype" class="addproduct">Add type</button>
    </form>
</div>

<?php include './template/footer.php' ?>