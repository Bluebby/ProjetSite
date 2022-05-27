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

<!DOCTYPE html> <!--son role est de préciser le type de document qui va suivre-->
<html lang="en">

<head > 

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MenuTD</title>
<link rel="icon" type="image/jpg" sizes="16x16" href="https://zupimages.net/up/22/05/747m.png">   
<link rel="stylesheet" href="css/BucephalandraStyle.css">


<body >
    
        
    <!--video playsinline autoplay muted loop id="bgvid">
        <source type="video/mp4" src="lave.mp4" >
    </video>-->
    <div id="global">
        <div id="Menu"><h1>AQUAPLANTE</h1></div>
    </div>
    <div id="tabmenu">
            
                <ul id="menu-demo2">
                    <li><a href="#">Plantes</a>
                        <ul >
                            <li><a href="https://www.aquaplante.fr/achat-plantes-avant-plan-pour-aquarium/aquaplante-plantes/773-anubias-nana-bonzai.html">Anubias</a></li>
                            <li><a href="#">Sous menu 1</a></li>
                            <li><a href="#">Sous menu 1</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Poissons</a>
                        <ul>
                            <li><a href="#">Sous menu 2</a></li>
                            <li><a href="#">Sous menu 2</a></li>
                            <li><a href="#">Sous menu 2</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Invertébrés</a>
                        <ul>
                            <li><a href="#">Sous menu 3</a></li>
                            <li><a href="#">Sous menu 3</a></li>
                            <li><a href="#">Sous menu 3</a></li>
                            <li><a href="#">Sous menu 3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Matériel</a>
                        <ul>
                            <li><a href="#">Sous menu 4</a></li>
                            <li><a href="#">Sous menu 4</a></li>
                            <li><a href="#">Sous menu 4</a></li>
                            <li><a href="#">Sous menu 4</a></li>
                        </ul>
                    </li>
                </ul>
                <br>
</div>
<div id="secondMenu">
    <li id="titleSndMenu"><a href="#" style="color:rgb(125, 177, 80); text-decoration:none">Plantes</a>
        <ul>
            <li id="UnderTitleSndMenu"><a href="#" style="color:white; text-decoration:none">Toutes les plantes aquatiques</a></li>
            <li id="UnderTitleSndMenu"><a href="#" style="color:white; text-decoration:none">Bucephalandra</a></li>
            <li id="UnderTitleSndMenu"><a href="#" style="color:white; text-decoration:none">Mousses pour aquarium</a></li>
            <li id="UnderTitleSndMenu"><a href="#" style="color:white; text-decoration:none">Plantes Gazonnantes</a></li>
        </ul>
    </li>
    <li id="titleSndMenu"><a href="#" style="color:rgb(125, 177, 80); text-decoration:none">Poissons</a>
        <ul>
            <li id="UnderTitleSndMenu"><a href="#" style="color:white; text-decoration:none">Invertébrés d'eau douce</a></li>
            <li id="UnderTitleSndMenu"><a href="#" style="color:white; text-decoration:none">Poissons d'eau douce</a></li>
            <li id="UnderTitleSndMenu"><a href="#" style="color:white; text-decoration:none">Poissons marins</a></li>
        </ul>
    </li>
    <li id="titleSndMenu"><a href="#" style="color:rgb(125, 177, 80); text-decoration:none">Matériel</a>
        <ul>
            <li id="UnderTitleSndMenu"><a href="#" style="color:white; text-decoration:none">Accessoires Aquarium</a></li>
            <li id="UnderTitleSndMenu"><a href="#" style="color:white; text-decoration:none">Filtration aquarium</a></li>
            <li id="UnderTitleSndMenu"><a href="#" style="color:white; text-decoration:none">Eclairage aquarium</a></li>
            <li id="UnderTitleSndMenu"><a href="#" style="color:white; text-decoration:none">Système CO2 d'aquarium</a></li>
        </ul>
    </li>
</div>

<div id="product">
    <h1 id="titleProduct"><center>BUCEPHALANDRA</center></h1>
        <img id="imgProduct" src="pl01_bucephalandra.jpg">
        <div id="infoPriceProduct">
            <p id="price" >14,95</p>
            <p>Quantité</p>
        </div>
</div>
<div id="case_quantity_wanted">
    <input type="number" min="1" name="qty" id="quantity_wanted" class="text" value="1" style="border: 1px solid rgb(189, 194, 201);">
</div>
<div>
    <input type="">
</div>



<div id="client">
    client
</div>

<div id="backBigMenu">
</div>
<div id="imgBackGround">
</div>

<div>
    <img id="imgAquascaping" src="aquascapingBackGround.jpg">
</div>




</body>