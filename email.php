<!DOCTYPE html>

<head>
<title>Aquaplante</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/email.css">
</head>

<body>
<div>
  
<?php



// fonction php 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$errorTab = [];



    if ($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST)==6) { // vérification de la méthode post + nbr d'element dans le post
  if (empty($_POST["nom"])) {
    $nomErr = "Mettez le nom";
  } else {
    $nom = test_input($_POST["nom"]);
    // vérifications que des lettres et espaces 
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nom)) { // contrainte 
      $errorTab["nomErr"] = "Entrez un nom correcte";
    }
  }

   if (empty($_POST["prenom"])) {
      $prenomErr = "Mettez le prenom";
    } else {
      $prenom = test_input($_POST["prenom"]);
      // vérifications que des lettres et espaces 
      if (!preg_match("/^[a-zA-Z-' ]*$/",$prenom)) { // contrainte sans chiffre 
        $errorTab["prenomErr"] = "Entrez un prénom correcte";
      }
    }
  
  if (empty($_POST["email"])) {
    $errorTab["emailErr"] = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // filtre php pour mail
      $errorTab["emailErr"] = "format email Invalide ";
    }
  }
  if (empty($_POST["message"])) {
    $errorTab["messageErr"] = "Ecrivez qq chose"; // mail pas vide 
  } else {
    $message = test_input($_POST["message"]);
  }

  if(!empty($nom) && !empty($prenom) && !empty($email)&&!empty($sujet)&&!empty($message)){ // pas de post vide = message envoyé
    $msg="Votre message a bien été envoyé !";
  }
 // else{
    //  $msg="Tous les champs doivent être complétés !";
  //}

  
  //  else{
       // $msg="Tous les champs doivent être complétés !";
      //  echo $msg."<br>";
    }
  
  //print_r($errorTab);
  echo '<script type="text/javascript">window.alert("Votre message a bien été envoyé !");</script>'; // pop up de bienvenu 

  if(empty($errorTab)){ // si le tableau d'érreur est vide alors on affiche les variables 
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $sujet=$_POST["sujet"];
    $message=$_POST['message'];

        $msg="Votre message a bien été envoyé !";
        //echo $msg."<br>";
      ?>
      <div class="bubble">
      <p style="font-size:20%; color:white">Email provenant de : <?= $email; ?> <br>Bonjour, je suis <?= $nom; ?> <?= $prenom; ?>, <br>Je vous ecris au sujet de <?= $sujet; ?> car <?= $message; ?> </p>
      </div>
      <div style="text-align:center">
      <a href="menu.php"><button class="button" style="background-color: rgb(38, 38, 38); color: white; border: 0; font-size: 1.1em;" type="button">Retour</button></a>  <!-- retour sur le formulaire-->
      </div>
      <?php
  }      
?>
</body>
</html>
