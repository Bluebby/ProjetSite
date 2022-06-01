<?php
  session_start();

  // Mise à jour du stock dans la base de données :
  foreach ($_SESSION["products_data"] as $category => $product) {
    foreach ($product as $id => $data) {
      if (strcmp($_POST["product"], $data["name"]) == 0) {
        $_SESSION["products_data"][$category][$id]["stock"] += $_SESSION["cart"][$_POST["product"]]["quantity"];
      }
    }
  }
  file_put_contents("../data/products-data.json", json_encode($_SESSION["products_data"]));
  
  // La case du produit est supprimée du panier.
  unset($_SESSION["cart"][$_POST["product"]]);
  
  // Re-calcul du sous-total :
  $_SESSION["subtotal"] = 0;
  foreach ($_SESSION["cart"] as $product) {
    $_SESSION["subtotal"] += $product["price"];
  }

  echo $_SESSION["subtotal"];
?>