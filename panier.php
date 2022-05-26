<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
    $_SESSION['subtotal'] = 0;
}
?>
<!DOCTYPE html>
<!--son role est de préciser le type de document qui va suivre-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1,0" />
    <!--la largeur prise en compte est la largeur disponible, le zoom de base sera à 1-->
    <title>MenuTD</title>
    <link rel="icon" type="image/jpg" sizes="16x16" href="https://zupimages.net/up/22/05/747m.png" />
    <link rel="stylesheet" href="panier.css" />
    <link rel="stylesheet" href="StylePanier.css" />
    <script defer src="menu.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="js/cartAjaxFunctions.js"></script>
</head>

<body>
    <header id="showcase">

    <div id="responsive">
      <div id="opaqueNezo"></div>
      <div id="Menu">
        <h1 class="bigTittle">FISH LE CAMP</h1>
      </div>
      <div id="tabmenu">
        <ul id="menu-demo2">
          <li>
            <a href="Plantes.php">PLANTES</a>
            <ul>
              <li>
                <a href="Anubias.php" id="fontUnderMenu">ANUBIAS</a>
              </li>
              <li><a href="Bucephalandra.php" id="fontUnderMenu">BUCEPHALANDRA</a></li>
              <li><a href="#" id="fontUnderMenu">HYGROPHILA</a></li>
            </ul>
          </li>
          <li>
            <a href="Poissons.php">POISSONS</a>
            <ul>
              <li><a href="#" id="fontUnderMenu">CREVETTE AMANO</a></li>
              <li><a href="#" id="fontUnderMenu">RASBORA BRIGITTAE</a></li>
              <li><a href="#" id="fontUnderMenu">RASBORA GALAXY </a></li>
              <li><a href="#" id="fontUnderMenu">RAMIREZ</a></li>

            </ul>
          </li>
          <li>
            <a href="#">MATERIEL</a>
            <ul>
              <li><a href="#" id="fontUnderMenu">Aquarium</a></li>
            </ul>
          </li>
          <li>
            <a href="#">PROMOTION</a>
            <ul>
              <li><a href="#">Sous menu 4</a></li>
              <li><a href="#">Sous menu 4</a></li>
              <li><a href="#">Sous menu 4</a></li>
              <li><a href="#">Sous menu 4</a></li>
            </ul>
          </li>
        </ul>
        <br />
      </div>

      <?php include 'data/connec.php'; ?>

      <?php

      if (isset($_SESSION['email']) && (isset($_SESSION['nom']))) {

      ?>
        <div id="client" style="border: solid 1px; border-radius: 5px; border: solid 1px #6db33f; background-color: rgb(38, 38, 38); max-height: 30px; margin-top: -6%;">
          <p style="color:white; text-align:center; margin-top: 4%;"> <?= $_SESSION['prenom']; ?></p>
        </div>
      <?php
      } else {
      ?>
      <div id="client" style="margin-top: -6%;">
        <div class="open-btn">
          <button class="open-button" onclick="openForm()">Se connecter</button>
        </div>
        <div class="login-popup">
          <div class="form-popup" id="popupForm">
            <table style="border-collapse:collapse; text-align: center; background-color: rgba(0, 0, 0, 0.4); width: 800px; z-index: 100;">
              <form method="post">
                <tr>
                  <th>
                    <h4 class="fas fa-user" style="color:white"> Email :</h4>
                  </th>
                  <th><input type="email" name="lemail" id="lemail" placeholder="Votre email" required></th>
                  <th></th>
                  <th>
                    <p style="visibility: hidden;">aaaa</p>
                  </th>
                  <th style="border-left: solid 4px; color: rgb(125, 177, 80);"></th>
                  <th style="text-align:center">
                    <h4 class="fas" style="color:white">Créer votre compte :</h4>
                  </th>
                </tr>
                <tr>
                  <th>
                    <h4 class="fas fa-lock" style="color:white"> Mot de passe :</h4>
                  </th>
                  <th><input type="password" name="lpassword" id="lpassword" placeholder="Votre mot de passe" required></th>
                  <th></th>
                  <th>
                    <p style="visibility: hidden;">aaaa</p>
                  </th>
                  <th style="border-left: solid 4px; color: rgb(125, 177, 80);"></th>
                  <th><a href="compte.php"><button class="button" style="background-color: rgb(125, 177, 80); color: white; border: 0; font-size: 1.1em;" type="button">Se créer un compte</button></a></th>
                </tr>
                <tr></tr>
                <th colspan="2"><button style="background-color: rgb(125, 177, 80); color: white; border : 0; font-size: 1.1em;" type="submit" name="formlogin" id="formlogin">Se connecter</button></th>
                <th></th>
                <th>
                  <p style="display:none">aaaa</p>
                </th>
                <th style="border-left: solid 4px; color: rgb(125, 177, 80);"></th>
                </tr>
                <tr>
                  <th colspan="6"><button type="button" style="background-color: rgb(255, 0, 0); color: white; border : 0; font-size: 1.1em;" class="btn cancel" onclick="closeForm()">Fermer</button></th>
                </tr>
              </form>
            </table>
          </div>
        </div>

      </div>

      <?php
      }
      ?>

      <!-- Panier dans l'en-tête du site -->
            
      <div id="hcart">
                    <button id="hcart-button" onclick="window.location.href = 'panier.php'">Mon panier</button>
                    <div id="hcart-products">
                        <!-- Affichage de tous les produits enregistrés dans le panier : -->
                        <?php foreach ($_SESSION['cart'] as $product => $in_cart): ?>
                        <div id="hcart-<?=$product?>">
                            <p><?=$product?></p> <!-- Nom du produit -->
                            <p id="<?=$product?>-qty">Quantité : <?=$in_cart['quantity']?></p> <!-- Quantité dans le panier -->
                            <p id="<?=$product?>-price"><?=$in_cart['price']?> €</p>           <!-- Prix de la quantité -->
                        </div>
                        <?php endforeach; ?>

                        <!-- Affichage du prix total :-->
                        <p>Total : <b id="hcart-subtotal"><?=$_SESSION['subtotal']?> €</b></p>
                </div>
                
      </div>
      <div class="LOGOimage">
        <a href="Menu.php"> <img style="max-width: 6%; margin-right: 60%; margin-top: -4%; z-index: 10;" src="logo/logo.png" /> </a>
      </div>
      

      <div id="secondMenu">
        <li id="titleSndMenu">
          <a href="#" style="color: rgb(125, 177, 80); text-decoration: none">Plantes</a>
          <ul>
            <li id="UnderTitleSndMenu">
              <a href="#" style="color: white; text-decoration: none">Toutes les plantes aquatiques</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="Bucephalandra.php" style="color: white; text-decoration: none">Bucephalandra</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="#" style="color: white; text-decoration: none">Mousses pour aquarium</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="#" style="color: white; text-decoration: none">Plantes Gazonnantes</a>
            </li>
          </ul>
        </li>
        <li id="titleSndMenu">
          <a href="#" style="color: rgb(125, 177, 80); text-decoration: none">Poissons</a>
          <ul>
            <li id="UnderTitleSndMenu">
              <a href="#" style="color: white; text-decoration: none">Invertébrés d'eau douce</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="#" style="color: white; text-decoration: none">Poissons d'eau douce</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="#" style="color: white; text-decoration: none">Poissons marins</a>
            </li>
          </ul>
        </li>
        <li id="titleSndMenu">
          <a href="#" style="color: rgb(125, 177, 80); text-decoration: none">Matériel</a>
          <ul>
            <li id="UnderTitleSndMenu">
              <a href="#" style="color: white; text-decoration: none">Aquarium</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="#" style="color: white; text-decoration: none">Accessoires Aquarium</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="#" style="color: white; text-decoration: none">Filtration aquarium</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="#" style="color: white; text-decoration: none">Eclairage aquarium</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="#" style="color: white; text-decoration: none">Système CO2 d'aquarium</a>
            </li>
          </ul>
        </li>
      </div>

            <div id="product">
                <center>
                    <div style="display: flex">

                    <div style="margin-left: 35px; float: left; color:white">
                        <table>
                            <tr>
                                <th>
                                    <h3>Votre panier</h3>
                                </th>
                            </tr>

                            <!-- Liste de tous les produits enregistrés dans le panier : -->
                            <?php foreach ($_SESSION['cart'] as $product => $in_cart) : ?>
                                <tr id="<?= $product ?>">
                                    <td style="border: 1px solid rgb(136, 176, 93); padding: 3px">
                                        <?= $product ?>
                                        <!-- Affichage nom article -->
                                        <em>Qté : <?= $in_cart['quantity'] ?></em> <!-- Affichage quantité article -->
                                        <br>
                                        <em><?= $in_cart['price'] ?> €</em> <!-- Affichage prix article -->
                                        <!-- Bouton "Supprimer" -->
                                        <br>
                                        <button style="background-color: rgb(136, 176, 93); color: white; border: 0; font-size: 1.1em;" onclick="removeProduct('<?= $product ?>')">
                                            Supprimer
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>

                    <div style="margin-left: 230px; color:white">
                        <h3>Total</h3>
                        <p id="subtotal"><?= $_SESSION['subtotal'] ?> €</p> <!-- Affichage sous-total -->
                        <form action="facture.php" method="POST">
                            <!-- Bouton "Passer la commande" -->
                            <?php
                            if (isset($_SESSION['email']) && (isset($_SESSION['nom']))) {
                            ?>
                                <input style="background-color: rgb(136, 176, 93); color: white; border: 0; font-size: 1.1em;" type="submit" name="checkout" value="Passer la commande" />
                                <!-- <input type="hidden" value="<?= $subtotal ?>" />-->
                            <?php
                            } else {
                            ?>
                                <a href="compte.php"><button class="button" style="background-color: rgb(136, 176, 93); color: white; border: 0; font-size: 1.1em;" type="button">Passer la commande</button></a>
                                <!-- <input type="hidden" value="<?= $subtotal ?>" />-->
                            <?php
                            }
                            ?>
                        </form>
                    </div>

                    </div>
                </center>

            </div>


            
            

            <!--<div id="backBigMenu"></div>-->

            <!--
      <div>
      <img id="imgAquascaping" src="aquascapingBackGround.jpg" />
    </div>
    -->


            <!-- <img id="imgPromo" src="BlueVelvet.jpg" />-->
            <div class="section">



            </div>
    </header>

    <div id="imgcacheBackGround"></div>
    <footer>
    <div class="contenu-footer">
      <div class="bloc footer-contact">
        <h3>Nous contacter</h3>
        <ul class="liste-contact">
          <li><a href="formulaire/contact.php">Formulaire de contact</a></li>
        </ul>
      </div>

      <div class="bloc footer-services">
        <h3>Nos horraires</h3>
        <ul class="liste-services">
          <li>✅ Lun 10h-19h</li>
          <li>✅ Mar 10h-19h</li>
          <li>✅ Mer 10h-19h</li>
          <li>✅ Jeu 10h-19h</li>
          <li>✅ Ven 10h-19h</li>
          <li>❌ Sam fermé</li>
          <li>❌ Dim fermé</li>
        </ul>
      </div>

      <div class="bloc footer-medias">
        <h3>Nos Réseaux</h3>
        <ul class="liste-medias">
          <li><a href="https://www.facebook.com"><img class="logo" src="logo/facebook.png" alt="icones reseaux">Facebook</a></li>
          <li><a href="https://github.com/Bluebby/ProjetSite"><img class="logo" src="logo/github.png" alt="icones reseaux">github</a></li>
          <li><a href="https://www.instagram.com"><img class="logo" src="logo/instagram.png" alt="icones reseaux">instagram</a></li>
          <li><a href="https://twitter.com/?lang=fr"><img class="logo" src="logo/twitter.png" alt="icones reseaux">Twitter</a></li>
        </ul>
      </div>
      
    </div>
  </footer>



</body>

</html>