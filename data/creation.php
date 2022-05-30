<?php


if (isset($_POST['formsend'])) {
    //on récupere le contenu du POST 
    extract($_POST);

    //si tous les champs sont rempli alors on effectue la boucle 
    if (!empty($password) && !empty($cpassword) && !empty($email) && !empty($nom) && !empty($prenom) && !empty($adresse) && !empty($telephone)) {

        //si le mdp correspond à la comfirmation du mdp alors on continue
        if ($password == $cpassword) {

            $options = [
                'cost' => 12, //difficultée du mdp crypté
            ];
            // hashpass est le mdp crypté on le crypte grace à password_hash
            $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);
            //on importe la connection à la base de donnée qui se trouve sur phpmyadmin, on s'y connecte et on importe la variable db
            include 'database.php';
            global $db;
            // on va compter si l'email utiliser existe deja ou pas
            $c = $db->prepare("SELECT email FROM user WHERE email = :email");
            $c->execute(['email' => $email]);

            $result = $c->rowCount();
            //si result = 0 alors le mail n'existe pas dans la base de donnée on peut donc créer le compte
            if ($result == 0) {
                $q = $db->prepare("INSERT INTO user(nom,email,password,prenom,adresse,telephone) VALUES(:nom,:email,:password,:prenom,:adresse,:telephone)");
                //on insert dans la base de donnée les différentes variables renseigné par l'utilisateur
                $q->execute([
                    'nom' => $nom,
                    'email' => $email,
                    'password' => $hashpass,
                    'prenom' => $prenom,
                    'adresse' => $adresse,
                    'telephone' => $telephone
                ]);
                echo '<script type="text/javascript">window.alert("Votre compte a bien été crée");</script>'; //pop up
                header("Location: '../Menu.php'"); // retour vers le menu qui ne focntionne pas car Menu n'est pas dans le meme dossier
                exit();
            } else {
                $message = "Un compte existe déja avec cette adresse email";
                echo '<script type="text/javascript">window.alert("' . $message . '");</script>';
            }
        }
    } else {
        echo "Les champs ne sont pas tous remplies";
    }
}
