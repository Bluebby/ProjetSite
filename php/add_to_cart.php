<?php
  session_start();

  if ($_POST['quantity'] > 0) {
    // Si le produit n'a pas encore été ajouté au panier, on initialise une nouvelle case.
    if (!isset($_SESSION['cart'][$_POST['product']])) {
      $_SESSION['cart'][$_POST['product']] = array(
        'quantity' => 0,
        'price' => 0
      );
    }

    // Actualisation de la quantité.
    $_SESSION['cart'][$_POST['product']]['quantity'] += $_POST['quantity'];
    // Prix de la nouvelle quantité.
    $_SESSION['cart'][$_POST['product']]['price'] = $_SESSION['cart'][$_POST['product']]['quantity'] * $_POST['price'];

    // Calcul du sous-total.
    $_SESSION['subtotal'] = 0;
    foreach ($_SESSION['cart'] as $product) {
      $_SESSION['subtotal'] += $product['price'];
    }
  }
?>