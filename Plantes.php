<?php
session_start();

// On crée un panier vide s'il n'y en a pas dans la session en cours.
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
  $_SESSION['subtotal'] = 0;
}

// Lecture de la base de donnée liée aux produits.
$_SESSION['products_data'] = json_decode(file_get_contents('data/products-data.json'), true);
?>

<!DOCTYPE html>
<!--son role est de préciser le type de document qui va suivre-->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1,0" />
  <!--la largeur prise en compte est la largeur disponible, le zoom de base sera à 1-->
  <title>Boutique plantes</title>
  <link rel="icon" type="image/jpg" sizes="16x16" href="https://zupimages.net/up/22/05/747m.png" />
  <link rel="stylesheet" href="css/stylePlantes.css" />
  <link rel="stylesheet" href="css/stylePanier.css" />
  <script defer src="js/menu.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="js/cartAjaxFunctions.js"></script>
</head>

<body>
  <header id="showcase">

  <div id="responsive">
      <div id="opaqueNezo"></div>
      <div id="Menu">
        <a href="index.php">
          <a style="text-decoration:none; color:#eae4e4" href="index.php">
            <h1 class="bigTittle">FISH LE CAMP</h1>
          </a>
        </a>
      </div>
      <div id="tabmenu">
        <ul id="menu-demo2">
          <li>
            <a href="plantes.php">PLANTES</a>
            <ul>
              <li>
                <a href="Anubias.php" id="fontUnderMenu">ANUBIAS</a>
              </li>
              <li><a href="Bucephalandra.php" id="fontUnderMenu">BUCEPHALANDRA</a></li>
              <li><a href="Hygrophila.php" id="fontUnderMenu">HYGROPHILA</a></li>
              <li><a href="Panes.php" id="fontUnderMenu">PANES</a></li>
              <li><a href="Titouman.php" id="fontUnderMenu">TITOUMAN</a></li>
            </ul>
          </li>
          <li>
            <a href="poissons.php">POISSONS</a>
            <ul>
              <li><a href="CrevetteAmano.php" id="fontUnderMenu">CREVETTE D'AMANO</a></li>
              <li><a href="RasboraBrigittae.php" id="fontUnderMenu">RASBORA BRIGITTAE</a></li>
              <li><a href="RasboraGalaxy.php" id="fontUnderMenu">RASBORA GALAXY </a></li>
              <li><a href="Ramirezi.php" id="fontUnderMenu">RAMIREZI</a></li>
              <li><a href="Pictichromis.php" id="fontUnderMenu">PICTICHROMIS</a></li>
            </ul>
          </li>
          <li>
            <a href="materiel.php">MATERIEL</a>
            <ul>
              <li><a href="Aquarium.php" id="fontUnderMenu">AQUARIUM</a></li>
              <li><a href="Filtre.php" id="fontUnderMenu">FILTRE</a></li>
              <li><a href="LED.php" id="fontUnderMenu">ECLAIRAGE LED</a></li>
              <li><a href="SubstratAdaYellow.php" id="fontUnderMenu">ADA ver.1</a></li>
              <li><a href="SubstratAdaOrange.php" id="fontUnderMenu">ADA ver.2</a></li>
              <li><a href="DiffuseurCO2.php" id="fontUnderMenu">DIFFUSEUR CO2</a></li>
            </ul>
          </li>
          <li>
            <a href="Actu.php">ACTUALITE</a>
            <ul>

            </ul>
          </li>
        </ul>
        <br />
      </div>

      <?php include 'data/connec.php'; ?>

      <?php

      if (isset($_SESSION['email']) && (isset($_SESSION['nom']))) { //cas dans lequel un utilisateur est connecté on affiche son prénom avec la variable de session

      ?>
        <div id="client" style="border: solid 1px; border-radius: 5px; border: solid 1px #6db33f; background-color: rgb(38, 38, 38); max-height: 30px;">
          <p style="color:white; text-align:center; margin-top: 4%;"> <?= $_SESSION['prenom']; ?></p>
        </div>
      <?php
      } else { // cas dans le quel l'utilisateur n'est pas connecté on affiche le bouton se connecter avec la pop up de connexion
      ?>
        <div id="client">
          <div class="open-btn">
            <button class="open-button" onclick="openForm()">Se connecter</button> <!-- boutton de connexion -->
          </div>
          <div class="login-popup">
            <!-- Pop Up -->
            <div class="form-popup" id="popupForm">
              <table style="border-collapse:collapse; text-align: center; background-color: rgba(0, 0, 0, 0.4); width: 800px; z-index: 100;">
                <!-- la pop up est sous forme de tableau -->
                <form method="post">
                  <tr>
                    <th>
                      <h4 class="fas fa-user" style="color:white"> Email :</h4> <!-- affichage du bonhomme et de email -->
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
                      <h4 class="fas fa-lock" style="color:white"> Mot de passe :</h4> <!-- affichage du cadenas et de mot de passe -->
                    </th>
                    <th><input type="password" name="lpassword" id="lpassword" placeholder="Votre mot de passe" required></th>
                    <th></th>
                    <th>
                      <p style="visibility: hidden;">aaaa</p>
                    </th>
                    <th style="border-left: solid 4px; color: rgb(125, 177, 80);"></th> <!-- ligne verte qui sépare la connexion de lacréation de compte -->
                    <th><a href="compte.php"><button class="button" style="background-color: rgb(125, 177, 80); color: white; border: 0; font-size: 1.1em;" type="button">Se créer un compte</button></a></th> <!-- bouton de création de compte -->
                  </tr>
                  <tr></tr>
                  <th colspan="2"><button style="background-color: rgb(125, 177, 80); color: white; border : 0; font-size: 1.1em;" type="submit" name="formlogin" id="formlogin">Se connecter</button></th> <!-- boutton de connexion -->
                  <th></th>
                  <th>
                    <p style="display:none">aaaa</p>
                  </th>
                  <th style="border-left: solid 4px; color: rgb(125, 177, 80);"></th>
                  </tr>
                  <tr>
                    <th colspan="6"><button type="button" style="background-color: rgb(255, 0, 0); color: white; border : 0; font-size: 1.1em;" class="btn cancel" onclick="closeForm()">Fermer</button></th> <!-- bouton permetant de fermer la page -->
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
          <?php foreach ($_SESSION['cart'] as $product => $in_cart) : ?>
            <div id="hcart-<?= $product ?>">
              <p><?= $product ?></p> <!-- Nom du produit -->
              <p id="<?= $product ?>-qty">Quantité : <?= $in_cart['quantity'] ?></p> <!-- Quantité dans le panier -->
              <p id="<?= $product ?>-price"><?= $in_cart['price'] ?> €</p> <!-- Prix de la quantité -->
            </div>
          <?php endforeach; ?>

          <!-- Affichage du prix total :-->
          <p>Total : <b id="hcart-subtotal"><?= $_SESSION['subtotal'] ?> €</b></p>
        </div>
      </div>

      <div class="LOGOimage">
        <!-- Affichage su logo -->
        <a href="index.php"> <img style="max-width: 6%; margin-right: 60%; margin-top: -4%; z-index: 10;" src="img/icons/logo.png" /> </a>
      </div>

      <?php

      if (isset($_SESSION['email']) && (isset($_SESSION['nom']))) { //cas ou utilisateur est connecté on affiche le bouton de déconnexion

      ?>
        <div id="deco" style="border: solid 1px; border-radius: 5px; border: solid 1px #6db33f; background-color: rgb(38, 38, 38); max-height: 30px;">
          <button onclick="window.location.href = 'logout.php'" style="color: white; background-color: rgb(38, 38, 38); border: none; outline: none; cursor: pointer;">Deconnexion</button> <!-- bouton de déconexion -->
        </div>
      <?php
      }
      ?>

<div id="secondMenu">
        <li id="titleSndMenu">
          <a href="Plantes.php" style="color: rgb(125, 177, 80); text-decoration: none">Plantes</a>
          <ul>
            <li id="UnderTitleSndMenu">
              <a href="Anubias.php" style="color: white; text-decoration: none">Anubias</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="Bucephalandra.php" style="color: white; text-decoration: none">Bucephalandra</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="Hygrophila.php" style="color: white; text-decoration: none">Hygrophila</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="Panes.php" style="color: white; text-decoration: none">Panes</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="Titouman.php" style="color: white; text-decoration: none">Titouman</a>
            </li>
          </ul>
        </li>
        <li id="titleSndMenu">
          <a href="Poissons.php" style="color: rgb(125, 177, 80); text-decoration: none">Poissons</a>
          <ul>
            <li id="UnderTitleSndMenu">
              <a href="CrevetteAmano.php" style="color: white; text-decoration: none">Crevette d'amano</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="RasboraGalaxy.php" style="color: white; text-decoration: none">Rasbora galaxy</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="Ramirezi.php" style="color: white; text-decoration: none">Ramirezi</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="Pictichromis.php" style="color: white; text-decoration: none">Pictichromis</a>
            </li>
          </ul>
        </li>
        <li id="titleSndMenu">
          <a href="materiel.php" style="color: rgb(125, 177, 80); text-decoration: none">Matériel</a>
          <ul>
            <li id="UnderTitleSndMenu">
              <a href="Aquarium.php" style="color: white; text-decoration: none">Aquarium</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="Filtre.php" style="color: white; text-decoration: none">Filtre</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="LED.php" style="color: white; text-decoration: none">Eclairage LED</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="SubstratAdaYellow.php" style="color: white; text-decoration: none">ADA ver.1</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="SubstratAdaOrange.php" style="color: white; text-decoration: none">ADA ver.2</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="DiffuseurCO2.php" style="color: white; text-decoration: none">Diffuseur CO2</a>
            </li>
          </ul>
        </li>
        <li id="titleSndMenu">
          <a href="Actu.php" style="color: rgb(125, 177, 80); text-decoration: none">Actualité</a>
        </li>
      </div>

      <!-- Liste des produits mis en vente. -->
      <div class="product">
        <h1 class="titleProduct" style="color:white">Plantes</h1>
        <div class="underProduct">

          <!-- Affichage des produits à partir de la base de données. -->
          <?php foreach ($_SESSION['products_data']['plantes'] as $id => $data) : ?>
            <?php if ($data['stock'] > 0) : ?>
              <div class="infoPriceProduct">
                <div class="case_quantity_wanted">
                  <a href="<?= $id ?>.php">
                    <img class="imgProduct" src="<?= $data['img'] ?>" />
                  </a>
                  <p class="nameProduct" style="color:white"><?= $data['name'] ?></p>
                  <p class="price"><?= $data['price'] ?> €</p>
                  <input id="<?= $data['name'] ?>-add-qty" type="number" min="1" value=1 class="quantity_wanted" class="text" style="border: 1px solid rgb(189, 194, 201);" name="<?= $data['stock'] ?>" />
                  <button onclick="addToCart('plantes', '<?= $id ?>', '<?= $data['name'] ?>', document.getElementById('<?= $data['name'] ?>-add-qty').value, document.getElementById('<?= $data['name'] ?>-add-qty').name)" class="favorite styled">Ajouter au panier</button>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>

        </div>
      </div>

      <div class="section">



      </div>
  </header>

  <div id="imgcacheBackGround"></div>

  <footer>
    <div class="contenu-footer">
      <div class="bloc footer-contact">
        <h3>Nous contacter</h3>
        <ul class="liste-contact">
          <li><a href="contact.php">Formulaire de contact</a></li>
        </ul>
      </div>

      <div class="bloc footer-services">
        <h3>Nos horaires</h3>
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
          <li><a href="https://www.facebook.com"><img class="logo" src="img/icons/facebook.png" alt="icones reseaux">Facebook</a></li>
          <li><a href="https://github.com/Bluebby/ProjetSite"><img class="logo" src="img/icons/github.png" alt="icones reseaux">github</a></li>
          <li><a href="https://www.instagram.com"><img class="logo" src="img/icons/instagram.png" alt="icones reseaux">instagram</a></li>
          <li><a href="https://twitter.com/?lang=fr"><img class="logo" src="img/icons/twitter.png" alt="icones reseaux">Twitter</a></li>
        </ul>
      </div>

    </div>
  </footer>



</body>

</html>