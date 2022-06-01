<?php
  session_start();

  if ($_POST["quantity"] > 0) {

    // Récupération de toutes les données nécessaires du produit ajouté au panier.
    $product_data = $_SESSION["products_data"][$_POST["category"]][$_POST["id"]];
    $product_incart = $product_data["name"];

    // Si le produit n'a pas encore été ajouté au panier, on initialise une nouvelle case.
    if (!isset($_SESSION["cart"][$product_data["name"]])) {
      $_SESSION["cart"][$product_data["name"]] = array(
        "quantity" => 0,
        "price" => 0
      );
    }

    // Mise à jour du stock dans la base de données :
    $_SESSION["products_data"][$_POST["category"]][$_POST["id"]]["stock"] -= $_POST["quantity"];
    file_put_contents("../data/products-data.json", json_encode($_SESSION["products_data"]));

    // Actualisation de la quantité dans le panier :
    $_SESSION["cart"][$product_incart]["quantity"] += $_POST["quantity"];
    // Actualisation du prix de la nouvelle quantité dans le panier :
    $_SESSION["cart"][$product_incart]["price"] = $_SESSION["cart"][$product_incart]["quantity"] * $product_data["price"];

    // Calcul du sous-total :
    $_SESSION["subtotal"] = 0;
    foreach ($_SESSION["cart"] as $product) {
      $_SESSION["subtotal"] += $product["price"];
    }
  }

  // Renvoi des données vers la requête Ajax :
  $quantity = $_SESSION["cart"][$product_incart]["quantity"];
  $price = $_SESSION["cart"][$product_incart]["price"];
  $subtotal = $_SESSION["subtotal"];

  echo "$quantity,$price,$subtotal";
?>