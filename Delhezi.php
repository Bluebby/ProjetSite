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
    <title>Rasbora Brigittae</title>
    <link rel="icon" type="image/jpg" sizes="16x16" href="https://zupimages.net/up/22/05/747m.png" />
    <link rel="stylesheet" href="css/styleActuProduct.css" />
    <link rel="stylesheet" href="css/stylePanier.css" />
    <script defer src="js/menu.js"></script>
    <script src="js/cartAjaxFunctions.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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

      if (isset($_SESSION['email']) && (isset($_SESSION['nom']))) {

      ?>
        <div id="client" style="border: solid 1px; border-radius: 5px; border: solid 1px #6db33f; background-color: rgb(38, 38, 38); max-height: 30px;">
          <p style="color:white; text-align:center; margin-top: 4%;"> <?= $_SESSION['prenom']; ?></p>
        </div>
      <?php
      } else {
      ?>
        <div id="client">
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

      <?php

      if (isset($_SESSION['email']) && (isset($_SESSION['nom']))) {

      ?>
        <div id="deco" style="border: solid 1px; border-radius: 5px; border: solid 1px #6db33f; background-color: rgb(38, 38, 38); max-height: 30px;">
          <button onclick="window.location.href = 'logout.php'" style="color: white; background-color: rgb(38, 38, 38); border: none; outline: none; cursor: pointer;">Deconnexion</button>
        </div>
      <?php
      }
      ?>

      <div class="LOGOimage">
        <a href="index.php"> <img style="max-width: 6%; margin-right: 60%; margin-top: -4%; z-index: 10;" src="img/icons/logo.png" /> </a>
      </div>

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

            <div class="product">
                <center>
                    <?php
                    $category = "Actu";
                    $id = "Delhezi";
                    $name = $_SESSION['products_data'][$category][$id]['name'];
                    $stock = $_SESSION['products_data'][$category][$id]['stock'];
                    $img = $_SESSION['products_data'][$category][$id]['img'];
                    $price = $_SESSION['products_data'][$category][$id]['price'];
                    ?>
                    <h1 id="titleProduct" style="color: white; text-transform: uppercase"><?= $name ?></h1>
                    <div class="underProduct">
                        <div class="imgProduct">
                            <img src="<?= $img ?>">
                        </div>

                        <div class="infoPriceProduct">
                            <p class="price"><?= $price ?>€</p>
                            <p style="color: rgb(187, 40, 32)">PRODUIT À VENIR</p>
                            <div class="case_quantity_wanted">
                                <input id="<?= $name ?>-add-qty" type="number" min="1" value="1" class="quantity_wanted" class="text" style="border: 1px solid rgb(189, 194, 201);" name="<?= $stock ?>" />
                            </div>
                            <button onclick="addToCart('<?= $category ?>', '<?= $id ?>', '<?= $name ?>', document.getElementById('<?= $name ?>-add-qty').value, document.getElementById('<?= $name ?>-add-qty').name)" class="favorite styled">Precommander</button>

                        </div>

                        <div id="firstDescription">
                            <div style="width:100%">
                                <h4 style="color: white">CARACTERISTIC</h4>
                            </div>
                            <p id="fontDescription">
                            <div class="characteristic">
                                <h id="tittleCharacteristic">Taille</h>
                                <div id="fontCharacteristic">30-45cm</div>
                            </div>
                            <div class="characteristic">
                                <h id="tittleCharacteristic">PH MAXIMUM</h>
                                <div id="fontCharacteristic">7</div>
                            </div>
                            <div class="characteristic">
                                <h id="tittleCharacteristic">PH MINIMIUM</h>
                                <div id="fontCharacteristic">6</div>
                            </div>
                            <div class="characteristic">
                                <h id="tittleCharacteristic">GH MAXIMUM</h>
                                <div id="fontCharacteristic">15</div>
                            </div>
                            <div class="characteristic">
                                <h id="tittleCharacteristic">GH MINIMIUM</h>
                                <div id="fontCharacteristic">5</div>
                            </div>
                            <div class="characteristic">
                                <h id="tittleCharacteristic">TEMPERATURE</h>
                                <div id="fontCharacteristic">22 A 28°C</div>
                            </div>
                            <div class="characteristic">
                                <h id="tittleCharacteristic">ORIGINE GÉOGRAPHIQUE</h>
                                <div id="fontCharacteristic">ASIE</div>
                            </div>

                            <div class="characteristic">
                                <h id="tittleCharacteristic">Status IUCN</h>
                                <div id="fontCharacteristic">LC (mineure)</div>
                            </div>

                            </p>
                        </div>

                        <div id="secondDescription">
                            <h4>DESCRIPTION</h4>
                            <p id="fontDescription">Ce superbe petit tétraodon à changé de nom en 1999 et s'appelle désormais "Carinotetraodon travancoricus" bien que la plupart des aquariophiles le connaissent sous son ancienne dénomination de "tétraodon travancoricus".poisson est aussi beau et intéressant qu'il est rare dans le commerce aquariophile.

                                Originaire d'une zone spécifique de l'Inde où on le retrouve dans différentes rivières, il est considéré comme vulnérable dans son habitat naturel.
                                Il est donc désormais primordial de se tourner vers des animaux issus d'élevage pour préserver le milieu sauvage.
                            </p>
                        </div>

                        <div id="thirdDescription">
                            <div style="width:100%">
                                <h4>LES AUTRES ONT AIME</h4>
                            </div>
                            <div id="underOtherProduct">

                                <div id="infoOtherPriceProduct">

                                    <img id="imgOtherProduct" src="img/crevette_amano.jpg">
                                    <p id="nameOtherProduct">CREVETTE AMANO</p>
                                    <p id="priceOther">2,95 €</p>

                                    <div id="Othercase_quantity_wanted">
                                        <input type="number" min="1" name="qty" id="Crevette Amano" class="Otherquantity_wanted" class="text" value="1" style="border: 1px solid rgb(189, 194, 201);">
                                    </div>
                                    <button onclick="addToCart('Crevette Amano', 2.95, document.getElementById('Crevette Amano').value)" class="favorite Otherstyled">Ajouter au panier</button>


                                </div>
                                <div id="infoOtherPriceProduct">

                                    <img id="imgOtherProduct" src="img/anubias.jpg">
                                    <p id="nameOtherProduct">ANUBIAS</p>
                                    <p id="priceOther">3,50 €</p>
                                    <div id="Othercase_quantity_wanted">
                                        <input type="number" min="1" name="qty" id="Anubias" class="Otherquantity_wanted" class="text" value="1" style="border: 1px solid rgb(189, 194, 201);">
                                    </div>
                                    <button onclick="addToCart('Anubias', 3.50, document.getElementById('Anubias').value)" class="favorite Otherstyled">Ajouter au panier</button>

                                </div>
                                <div id="infoOtherPriceProduct">

                                    <img id="imgOtherProduct" src="img/rasbora_galaxy.jpg">
                                    <div id="underInfoPriceProduct">
                                        <p id="nameOtherProduct">RASBORA GALAXY</p>
                                        <p id="priceOther">3.50 €</p>
                                        <div id="Othercase_quantity_wanted">
                                            <input type="number" min="1" name="qty" id="Rasbora galaxy" class="Otherquantity_wanted" class="text" value="1" style="border: 1px solid rgb(189, 194, 201);">
                                        </div>
                                        <button onclick="addToCart('Rasbora galaxy', 3.50 , document.getElementById('Rasbora galaxy').value)" class="favorite Otherstyled">Ajouter au panier</button>

                                    </div>
                                </div>

                                <div id="infoOtherPriceProduct">

                                    <img id="imgOtherProduct" src="img/ramirezi.jpg">
                                    <div id="underOtherInfoPriceProduct">
                                        <p id="nameOtherProduct">RAMIREZ</p>
                                        <p id="priceOther">15,50 €</p>
                                        <div id="Othercase_quantity_wanted">
                                            <input type="number" min="1" name="qty" id="Ramirez" class="Otherquantity_wanted" class="text" value="1" style="border: 1px solid rgb(189, 194, 201);">
                                        </div>
                                        <button onclick="addToCart('Ramirez', 15.50, document.getElementById('Ramirez').value)" class="favorite Otherstyled">Ajouter au panier</button>

                                    </div>
                                </div>


                            </div>
                        </div>
                </center>
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