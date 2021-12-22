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
        <h2>Add Range Form</h2>
        <div class="form-body">

            <div class="content">
                <label>
                    Range's name:
                    <input type="text" name="range_name">
                </label>
            </div>
            
        </div>
        <button type="submit" name="addrange" class="addproduct">Add range</button>
    </form>
</div>

<?php include './template/footer.php' ?>