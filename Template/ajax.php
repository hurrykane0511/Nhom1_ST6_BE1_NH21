<script>
  "use strict";

  const cart = document.querySelector('#cart-container');

  function addCart(item) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      document.querySelector('#cart_inner').innerHTML = this.responseText;
    }
    cart.classList.add("active");
    xhttp.open("POST", "loadcart.php?id=" + item.getAttribute("id"), true);
    xhttp.send();

    document.querySelector('body').addEventListener('click', function(event) {
      if (event.target.id.toLowerCase() === 'drawer__close-button') {
        cart.classList.remove("active");
      }
    });
  }

  function del_cart(id) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      document.querySelector('#cart_inner').innerHTML = this.responseText;
    }
    cart.classList.add("active");
    xhttp.open("POST", "loadcart.php?del=" + id, true);
    xhttp.send()

  }

  function qtyChange(id, newQty) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      document.querySelector('#cart_inner').innerHTML = this.responseText;
    }
    cart.classList.add("active");
    xhttp.open("POST", `loadcart.php?idchange=${id}&qty=${newQty}`, true);
    xhttp.send()
  }

  function showHint(str) {
    const rs = document.querySelector(".product-search__inner");
    if (str.length == 0) {
      rs.innerHTML = "";
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          rs.innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "loadsearch.php?kw=" + str, true);
      xmlhttp.send();
    }
  }

  (function() {
    document.querySelector('#cart-link').addEventListener('click', () => {
      cart.classList.add("active");
      var xhttp;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        document.querySelector('#cart_inner').innerHTML = this.responseText;
      }
      cart.classList.add("active");
      xhttp.open("POST", `loadcart.php`, true);
      xhttp.send();
      document.querySelector('body').addEventListener('click', function(event) {
        if (event.target.id.toLowerCase() === 'drawer__close-button') {
          cart.classList.remove("active");
        }
      });
    })
  })();
</script>