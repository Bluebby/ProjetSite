<?php session_start() ?>
<!DOCTYPE html>
<!--son role est de préciser le type de document qui va suivre-->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1,0" />  <!--la largeur prise en compte est la largeur disponible, le zoom de base sera à 1-->
  <title>MenuTD</title>
  <link rel="icon" type="image/jpg" sizes="16x16" href="https://zupimages.net/up/22/05/747m.png" />
  <link rel="stylesheet" href="styleAnubias.css" />
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
      <div id="global">
        <div id="Menu">
          <h1 class="bigTittle">FISH LE CAMP</h1>
        </div>
      </div>
      <div id="tabmenu">
        <ul id="menu-demo2">
          <li>
            <a href="#">Plantes</a>
            <ul>
              <li>
                <a
                  href="https://www.aquaplante.fr/achat-plantes-avant-plan-pour-aquarium/aquaplante-plantes/773-anubias-nana-bonzai.html">Anubias</a>
              </li>
              <li><a href="Bucephalandra.html">Bucephalandra</a></li>
              <li><a href="#">Sous menu 1</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Poissons</a>
            <ul>
              <li><a href="#">Invertébrés d'eau douce</a></li>
              <li><a href="#">Poissons d'eau douce</a></li>
              <li><a href="#">Poissons marins</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Matériel</a>
            <ul>
              <li><a href="#">Aquarium</a></li>
              <li><a href="#">Sous menu 3</a></li>
              <li><a href="#">Sous menu 3</a></li>
              <li><a href="#">Sous menu 3</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Promotion</a>
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
      <div id="secondMenu">
        <li id="titleSndMenu">
          <a href="#" style="color: rgb(125, 177, 80); text-decoration: none">Plantes</a>
          <ul>
            <li id="UnderTitleSndMenu">
              <a href="#" style="color: white; text-decoration: none">Toutes les plantes aquatiques</a>
            </li>
            <li id="UnderTitleSndMenu">
              <a href="Bucephalandra.html" style="color: white; text-decoration: none">Bucephalandra</a>
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

      <div id="product">ANUBIAS
            <center><h1 id="titleProduct">ANUBIAS</h1>
              <div id="underProduct">
                <img id="imgProduct" src="anubias-sp-nangi.jpg">
                <div id="infoPriceProduct">
                    <p id="price" >14,95$</p>
                    <p>Quantité</p>
                    <div id="case_quantity_wanted">
                        <input type="number" min="1" name="qty" id="quantity_wanted" class="text" value="1" style="border: 1px solid rgb(189, 194, 201);">
                    </div>
                        <input class="favorite styled" type="button" value="Add to Basket">
                </div>
                
                  <div id="description">
                      <h4>DESCRIPTION</h4>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad suscipit nihil maxime atque ipsum, quos illo mollitia nulla aliquam dignissimos praesentium deserunt expedita? Cupiditate et dolorem velit similique fugiat necessitatibus?
                  </div>
                
              </div>

            </center>
                
        </div>
        

        <?php include 'data/connec.php'; ?>


<?php

  if(isset($_SESSION['email']) && (isset($_SESSION['nom']))){

?>
  <div id="client">
    <p style="color:white"> Bienvenue <?= $_SESSION['nom']; ?></p>
  </div>
  <?php
  }else{
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
                      <th><h4 class="fas fa-user" style="color:white">  Identifiant :</h4></th>
                      <th><input type="email" name="lemail" id="lemail" placeholder="Votre email" required></th>
                      <th ></th>
                      <th><p style="visibility: hidden;">aaaa</p></th>       
                      <th style="border-left: solid 4px; color: rgb(125, 177, 80);"></th>
                      <th style="text-align:center"><h4 class="fas" style="color:white">Créer votre compte :</h4></th>
                  </tr>
                  <tr>
                      <th><h4 class="fas fa-lock" style="color:white">  Mot de passe :</h4></th>
                      <th><input type="password" name="lpassword" id="lpassword" placeholder="Votre mot de passe" required></th>
                      <th ></th>
                      <th><p style="visibility: hidden;">aaaa</p></th>
                      <th style="border-left: solid 4px; color: rgb(125, 177, 80);"></th>
                      <th><a href="compte.php"><button class="button" style="background-color: rgb(125, 177, 80); color: white; border: 0; font-size: 1.1em;" type="button">Se créer un compte</button></a></th>
                  </tr>
                  <tr></tr>
                      <th colspan="2"><button style="background-color: rgb(125, 177, 80); color: white; border : 0; font-size: 1.1em;" type="submit" name="formlogin" id="formlogin">Se connecter</button></th>
                      <th></th>
                      <th><p style="display:none">aaaa</p></th>  
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

  <!--  <div id="sommaire">
     <p style="font-size: 20px;"><center>Corrections</center><p\> <p><center><a href="TD1.html" style="color:rgb(255, 217, 0)"title="Introduction to HTML 5 Language">TD1</a> </center> </p>
     <p><center><a href="TD2.html" style="color:rgb(255, 217, 0)" title="Introduction to HTML 5 Language">TD2</a></center> </p>
     <p><center><a href="TD3.html" style="color:rgb(255, 217, 0)" title="Introduction to HTML 5 Forms">TD3</a></center> </p> 
     <p><center><a href="TD4.html" style="color:rgb(255, 217, 0)" title="Introduction to HTML 5 Forms">TD4</a></center> </p>
     <p><center><a href="TD5.test.html" style="color:rgb(255, 217, 0)" title="Introduction to HTML 5 Forms">TD5</a></center> </p>
    </div>

    <div id="info">
        <p style="font-style:rgb(255, 166, 0);">Problème de compatibilité rencontré sur différents navigateurs. Mon code marche parfaitement sur operaGX. 
            Je vais l'adapter les technologies employée pour les prochains cours.</p>
    </div>
    -->

</body>
</html>