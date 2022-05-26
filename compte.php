<?php session_start() ?>
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
  <link rel="stylesheet" href="styleMenu.css" />
  <script defer src="menu.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
  <!--video playsinline autoplay muted loop id="bgvid">
        <source type="video/mp4" src="lave.mp4" >
    </video>-->


  <!--responsive      margin: auto;
    max-width;
  width:...%
    typo en responsive
    font-size: 5vw;-->


  <!--problème avec la pub qui se balade sans mon avis ducoup on regle probleme de pourquoi elle est en bas alors que je la positionne a aucun moment et lui trouver une place cool
    faire en sorte que le se connecter ne passe pas derriere le menu-->
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
      

      <div id="panier"> <img id="imgCart" src="cart.png" alt="" />

      </div>

      <div id="compte" style="padding: 150px 0 100px;">
            <table style="background-color: rgb(38,38,38);  border: solid 1px rgb(125, 177, 80); border-radius: 10px; margin: auto; color:white">
            <form method="post">
                <tr>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                    <th><label>Nom :</label></th>
                    <th><input type="text" name="nom" id="nom" placeholder="Votre nom" required></th>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                </tr>
                <tr>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                    <th><label>Prénom :</label></th>
                    <th><input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required></th>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                </tr>
                <tr>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                    <th><label>Adresse :</label></th>
                    <th><input type="text" name="adresse" id="adresse" placeholder="Votre adresse" required></th>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                </tr>
                <tr>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                    <th><label>Téléphone :</label></th>
                    <th><input type="text" name="telephone" id="telephone" placeholder="Votre numéro de téléphone" required></th>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                </tr>
                <tr>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                    <th><label>Adresse mail :</label></th>
                    <th><input type="email" name="email" id="email" placeholder="Votre email" required></th>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                </tr>
                <tr>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                    <th><label>Mot de passe :</label></th>
                    <th><input type="password" name="password" id="password" placeholder="Votre mot de passe" required></th>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                </tr>
                <tr>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                    <th><label>Confirmation :</label></th>
                    <th><input type="password" name="cpassword" id="cpassword" placeholder="Confirmer votre mot de passe" required></th>
                    <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                </tr>
                <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
                <th colspan = 2><button style="background-color: rgb(125, 177, 80); color: white; border: 0; font-size: 1.1em;" type="submit" name="formsend" id="formsend">Créer votre compte</button></th>
                <th style="color: rgb(38, 38, 38)">aaaaaaa</th>
            </table>
            </form>
        </div>

<?php include 'data/creation.php' ?>





      <!--<div id="backBigMenu"></div>-->

      <!--
      <div>
      <img id="imgAquascaping" src="aquascapingBackGround.jpg" />
    </div>
    -->

      <div id="promo">
        
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