<?php
    if(isset($_POST['formlogin'])){
        //On récupere le contenu du POST
         extract($_POST);
        //Si email et password sont remplie lors on effetue la boucle
            if(!empty($lemail) && !empty($lpassword)){
                //on inclue la base de donnée et la variable global db
                include 'database.php';
                global $db;
                //dans db on recherche su l'email correspond à celui d'un utilisateur
                $q = $db->prepare("SELECT * FROM user WHERE email = :email");
                $q->execute(['email' => $lemail]);
                $result = $q->fetch();
                //si le résultat est vrai alors on vérifie le mot de passe si celui associé est le bon
                if($result == true){ 

                    $hashpassword = $result['password'];
                    //Si le mdp est le bon alors on set les variable de session utile pour la facture 
                    if(password_verify($lpassword, $result['password'])){
                        $_SESSION['email'] = $result['email'];
                        $_SESSION['nom'] = $result['nom'];
                        $_SESSION['prenom'] = $result['prenom'];
                        $_SESSION['adresse'] = $result['adresse'];
                        $_SESSION['telephone'] = $result['telephone'];
                        $_SESSION['id'] = $result['id'];
                        echo '<script type="text/JavaScript"> window.refresh(); </script>'; //on actualise la page
                    }else{
                        $message="Le mot de passe n'est pas le bon.";
                        echo '<script type="text/javascript">window.alert("'.$message.'");</script>'; //pop up
                    }

                }else{
                    $message="Le compte portant l'email " . $lemail." n'existe pas";
                    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
                }
            }
    }      
?>