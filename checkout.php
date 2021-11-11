<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./assets/sass/style.css">
</head>

<body>

  <div class="checkout-wraper">
    <div class="checkout-box">
      <div class="row">
        <div class="col-50">
          <div class="container">
            <form action="/action_page.php">
              <div class="row">
                <div class="col-100">
                  <h3>Billing Address</h3>
                  <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                  <input type="text" id="fname" name="firstname">
                  <label for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input type="text" id="email" name="email">
                  <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                  <input type="text" id="adr" name="address">
                  <label for="city"><i class="fa fa-institution"></i> City</label>
                  <input type="text" id="city" name="city">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip">
                </div>
              </div>
              <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
              </label>
              <input type="submit" value="Continue to checkout" class="btn">
              <a href="index.php" type="submit" class="buy">Return to cart</a>
            </form>
          </div>
        </div>
        <div class="col-50 gray-light">
          <div class="container">
            <table class="product-table">
              <caption class="visually-hidden">Shopping cart</caption>
              <thead class="product-table__header">
                <tr>
                  <th scope="col"><span class="visually-hidden">Product image</span></th>
                  <th scope="col"><span class="visually-hidden">Description</span></th>
                  <th scope="col"><span class="visually-hidden">Quantity</span></th>
                  <th scope="col"><span class="visually-hidden">Price</span></th>
                </tr>
              </thead>
              <tbody data-order-summary-section="line-items">
                <tr class="product">
                  <td class="product__image">
                    <div class="product-thumbnail ">
                      <div class="product-thumbnail__wrapper">
                        <img alt="Hi There - 50ml - 50ml" class="product-thumbnail__image" src="//cdn.shopify.com/s/files/1/1132/3440/products/image_1c2317ba-525f-4a8f-9763-179fe62cd1a8_small.jpg?v=1591665676">
                      </div>
                      <span class="product-thumbnail__quantity" aria-hidden="true">1</span>
                    </div>
                  </td>
                  <td class="product__description" scope="row">
                    <span class="product__description__name order-summary__emphasis">Hi There - 50ml</span>
                    <span class="product__description__variant order-summary__small-text">50ml</span>
                  </td>
                  <td class="product__price">
                    <span class="order-summary__emphasis skeleton-while-loading">$135.00</span>
                  </td>
                </tr>
              </tbody>
            </table>
            <hr>
            <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>