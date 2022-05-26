<?php
    if(isset($_POST['formlogin'])){
                          
         extract($_POST);

            if(!empty($lemail) && !empty($lpassword)){

                include 'database.php';
                global $db;

                $q = $db->prepare("SELECT * FROM user WHERE email = :email");
                $q->execute(['email' => $lemail]);
                $result = $q->fetch();

                if($result == true){ 

                    $hashpassword = $result['password'];

                    if(password_verify($lpassword, $result['password'])){
                        $_SESSION['email'] = $result['email'];
                        $_SESSION['nom'] = $result['nom'];
                        $_SESSION['prenom'] = $result['prenom'];
                        $_SESSION['adresse'] = $result['adresse'];
                        $_SESSION['telephone'] = $result['telephone'];
                        echo '<script type="text/JavaScript"> location.reload(); </script>';
                    }else{
                        $message="Le mot de passe n'est pas le bon.";
                        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
                    }

                }else{
                    $message="Le compte portant l'email " . $lemail." n'existe pas";
                    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
                }
            }
    }      
?>