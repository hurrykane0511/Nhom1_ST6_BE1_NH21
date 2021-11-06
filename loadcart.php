<?php
session_start();
include './model/config.php';
include './model/dbconnect.php';
include './model/perfume.php';

$dbc = new Perfume;

//change quatity
if (isset($_GET['idchange']) && isset($_GET['qty'])) {
  isset($_SESSION['cart']) ? $_SESSION['cart'][$_GET['idchange']]['quantity'] = $_GET['qty'] : header('Location: http://localhost/Nhom1_ST6_BE1_NH21/');
  if ($_GET['qty'] == 0) {
    unset($_SESSION['cart'][$_GET['idchange']]);
  }
}

//delete item
if (isset($_GET['del'])) {
  unset($_SESSION['cart'][$_GET['del']]);
}
//Adcart
if (isset($_GET['id'])) {

  $id = explode("-", $_GET['id'])[1];
  $pf = $dbc->getPerfumeByID($id);

  if (isset($_SESSION['cart'])) {
    if (!array_key_exists($id, $_SESSION['cart'])) {
      $item = array(
        'name' => $pf['perfume_name'],
        'image' => $pf['image'],
        'price' => $pf['price'],
        'capicity' => $pf['capicity'],
        'quantity' => 1
      );
      $_SESSION['cart'][$id] = $item;
    } else {
      $_SESSION['cart'][$id]['quantity']++;
    }
  } else {
    $item = array(
      'name' => $pf['perfume_name'],
      'image' => $pf['image'],
      'price' => $pf['price'],
      'capicity' => $pf['capicity'],
      'quantity' => 1
    );
    $_SESSION['cart'][$id] = $item;
  }
}

?>
<?php
if (!empty($_SESSION['cart'])) {
  $sp_cart = $_SESSION['cart'];
  $total = 0;

?>

  <div class="cart__scrollable">
    <div class="cart-items">
      <?php foreach ($sp_cart as $key => $item) {
        $total += $item['price'] * $item['quantity'];
      ?>
        <div class="cart-item">
          <a href="#" class="img-item" style="background-image: url('./assets/images/products/<?php echo $item['image']; ?>')">

          </a>
          <div class="item-contents">
            <div class="item-name"><?php echo $item['name'] ?></div>
            <p>
              <span class="capicity"><?php echo $item['capicity'] ?></span>/
              <span class="price">£<?php echo $item['price'] ?></span>
            </p>
          </div>
          <div class="item-quantity">
            <input type="number" step="1" min="0" value="<?php echo $item['quantity'] ?>" onchange="javascript:qtyChange(<?= $key ?>, this.value)" />
            <a name="remove" class="remove-btn" href="javascript:del_cart(<?php echo $key ?>)">remove</a>
          </div>
        </div>
      <?php } ?>

    </div>
    <div class="cart-note">
      <label for="note">Order note</label>
      <textarea name="note" id="note" cols="30" rows="3"></textarea>
    </div>
  </div>
  <div class="cart-footer">
    <div class="cart-details">
      <div class="cart-title">Subtotal</div>
      <div class="cart-total">£<?php echo $total ?></div>
    </div>
    <p>Shipping, taxes, and discount codes calculated at checkout.</p>
    <button type="submit" name="checkout" id="checkout">
      <span>Check out</span>
    </button>
  </div>

<?php

} else {
?>
  <div class="empty-cart">Your cart is empty now, <a href="">continue buy</a></div>
<?php
}
?>