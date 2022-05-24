<<<<<<< Updated upstream:compte.php
<?php session_start(); 

    $_SESSION['pseudo'] = "Math";
?>
=======
<?php session_start(); ?>
>>>>>>> Stashed changes:compte.html
<!DOCTYPE html> <!--son role est de préciser le type de document qui va suivre-->
<html lang="en">

<head > 

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Compte</title>
<link rel="icon" type="image/jpg" sizes="16x16" href="https://zupimages.net/up/22/05/747m.png">   
<link rel="stylesheet" href="compte.css">
<script defer src="menu.js"></script>




<body >

    <div id="global">
        <div id="Menu"><h1>AQUAPLANTE</h1></div>
    </div>
    

<div id="compte">
    <table style="margin: auto;">
    <form method="post">
        <tr>
            <th><label>Prénom :</label></th>
            <th><input type="text" name="nom" id="nom" placeholder="Votre nom" required></th>
        </tr>
        <tr>
            <th><label>Adresse Mail :</label></th>
            <th><input type="email" name="email" id="email" placeholder="Votre email" required></th>
        </tr>
        <tr>
            <th><label>Mot De Passe :</label></th>
            <th><input type="password" name="password" id="password" placeholder="Votre mot de passe" required></th>
        </tr>
        <tr>
            <th><label>Confirmation :</label></th>
            <th><input type="password" name="cpassword" id="cpassword" placeholder="Confirmer votre mot de passe" required></th>
        </tr>
        <th colspan = 2><button style="background-color: rgb(125, 177, 80); color: white; border: 0; font-size: 1.1em;" type="submit" name="formsend" id="formsend">Créer votre compte</button></th>
    </table>
    </form>
</div>

<?php include 'data/creation.php' ?>


<div id="backBigMenu">
</div>


<div>
    <img id="imgAquascaping" src="aquascapingBackGround.jpg">
</div>

</body>