<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
    $_SESSION['subtotal'] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon panier</title>
    <script src="js/cartAjaxFunctions.js"></script>
</head>

<body>


    <!-- Panier dans l'en-tête du site -->
    <ul id="hcart">
        <li><a href="cart.php">Mon panier</a>
            <ul id="hcart-products">

                <!-- Affichage de tous les produits enregistrés dans le panier : -->
                <?php foreach ($_SESSION['cart'] as $product => $in_cart) : ?>
                    <li id="hcart-<?= $product ?>">
                        <p><?= $product ?></p> <!-- Nom du produit -->
                        <p id="<?= $product ?>-qty">Quantité : <?= $in_cart['quantity'] ?></p> <!-- Quantité dans le panier -->
                        <p id="<?= $product ?>-price"><?= $in_cart['price'] ?> €</p> <!-- Prix de la quantité -->
                    </li>
                <?php endforeach; ?>

                <!-- Affichage du prix total :-->
                <li>Total : <b id="hcart-subtotal"><?= $_SESSION['subtotal'] ?> €</b></li>

            </ul>
        </li>
    </ul>





    <div style="display: flex">

        <div style="margin-left: 35px; float: left;">
            <table>
                <tr>
                    <th>
                        <h3>Votre panier</h3>
                    </th>
                </tr>

                <!-- Liste de tous les produits enregistrés dans le panier : -->
                <?php foreach ($_SESSION['cart'] as $product => $in_cart) : ?>
                    <tr id="<?= $product ?>">
                        <td style="border: 1px solid black; padding: 3px">
                            <?= $product ?>
                            <!-- Affichage nom article -->
                            <p>Qté : <?= $in_cart['quantity'] ?></p> <!-- Affichage quantité article -->
                            <p><?= $in_cart['price'] ?> €</p> <!-- Affichage prix article -->
                            <!-- Bouton "Supprimer" -->
                            <button onclick="removeProduct('<?= $product ?>')">
                                Supprimer
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div style="margin-left: 230px;">
            <h3>Total</h3>
            <p id="subtotal"><?= $_SESSION['subtotal'] ?> €</p> <!-- Affichage sous-total -->
            <form action="account_check.php" method="POST">
                <!-- Bouton "Passer la commande" -->
                <input type="submit" name="checkout" value="Passer la commande" />
                <input type="hidden" value="<?= $subtotal ?>" />
            </form>
        </div>

    </div>

</body>

</html>