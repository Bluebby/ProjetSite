<?php
  session_start();

  // La case du produit est supprimée de la variable "panier".
  unset($_SESSION['cart'][$_POST['product']]);

  // Re-calcul du sous-total.
  $_SESSION['subtotal'] = 0;
  foreach ($_SESSION['cart'] as $product) {
    $_SESSION['subtotal'] += $product['price'];
  }

  echo $_SESSION['subtotal'];
?>