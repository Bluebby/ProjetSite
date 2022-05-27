<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// define variables and set to empty values
$errorTab = [
  "nomErr" => "",
  "prenomErr" => "",
  "emailErr" => "",
  "mesageErr" => "",
];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nom"])) {
    $nomErr = "Mettez le nom";
  } else {
    $nom = test_input($_POST["nom"]);
    // vérifications que des lettres et espaces 
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nom)) {
      $errorTab["nomErr"] = "Entrez un nom correcte";
    }
  }
}

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["prenom"])) {
      $prenomErr = "Mettez le prenom";
    } else {
      $prenom = test_input($_POST["prenom"]);
      // vérifications que des lettres et espaces 
      if (!preg_match("/^[a-zA-Z-' ]*$/",$prenom)) {
        $errorTab["prenomErr"] = "Entrez un prénom correcte";
      }
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errorTab["emailErr"] = "format email Invalide ";
    }
  }
  if (empty($_POST["message"])) {
    $errorTab["messageErr"] = "Ecrivez qq chose";
  } else {
    $message = test_input($_POST["message"]);
  }

  if(!empty($nom) && !empty($prenom) && !empty($email)&&!empty($sujet)&&!empty($message)){
    $msg="Votre message a bien été envoyé !";
  }
  else{
      $msg="Tous les champs doivent être complétés !";
  }
  if(!empty($errorTab)){
    header("Location email.php");
  }
?>
<!DOCTYPE html>

<head>
<title>Aquaplante</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/formulaire.css">
    <script src="js/form_verif.js" defer>  </script>
</head>

<style>
.error {color: #FF0000;}
</style>

<body>

<div class="contactez-nous">

<!-- formulaire methode post avec action vers email.php-->
  <h1>Contactez-nous</h1>
  <h2>Veuillez remplir le formulaire</h2>
  <form action="email.php" method="post" id="Form" >
  <input type="date" class="real-input" name="ContactDate" id="ContactDate" placeholder="dd/mm/yyyy" required/>
    <div>
      <label for="nom">Votre nom</label>
      <input type="text" id="nom" name="nom" placeholder="Patoche" value= " <?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>"  required/> <!-- ligne php évite de tout réecrire / required case obligatoirement complété -->
      
    </div>
    <div>
      <label for="prenom">Votre prénom</label>
      <input type="text" id="prenom" name="prenom" placeholder="Patrick" value ="<?php if(isset($_POST['prenom'])) { echo $_POST['prenom']; } ?>"  required/>
      
    </div>
    <div>
      <label for="email">Votre e-mail</label>
      <input type="email" id="email" name="email" placeholder="monadresse@mail.com" value = "<?php if(isset($_POST['Email'])) { echo $_POST['Email']; } ?>" required/>
      
    </div>
    <div>
      <label for="sujet">Quel est le sujet de votre message ?</label>
      <select name="sujet" id="sujet" required>
          <option value="" disabled selected hidden>Choisissez le sujet de votre message</option>
          <option>Problème avec mon compte</option>
          <option>Question à propos d’un produit</option>
          <option>Suivi de ma commande</option>
          <option>Autre...</option>
       </select>
    </div>
    <div>
      <label for="message">Votre message</label>
      <textarea id="message" name="message" placeholder="Bonjour, je vous contacte car...." <?php if(isset($_POST['message'])) { echo $_POST['message']; } ?> required></textarea>
     
    </div>
    <div class="button">
    <input type="submit"name="formsend" id="formsend">
</form>
 </div>
</div>
</body>
</head>