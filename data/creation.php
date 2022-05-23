<?php
    

    if(isset($_POST['formsend'])){
        
        extract($_POST);


        if(!empty($password) && !empty($cpassword) && !empty($email) && !empty($nom)){
            

            if($password == $cpassword){
                
                $options = [
                    'cost' => 12,
                ];

                $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

                include 'database.php';
                global $db;

                $c = $db->prepare("SELECT email FROM user WHERE email = :email");
                $c->execute(['email' => $email]);

                $result = $c->rowCount();

                if($result == 0){
                    $q = $db->prepare("INSERT INTO user(nom,email,password) VALUES(:nom,:email,:password)");
                    $q->execute([
                        'nom' => $nom,
                        'email' => $email,
                        'password' => $hashpass
                    ]);
                    header('Location: Menu.php');
                    exit();

                }else{
                    $message="Un compte existe déja avec cette adresse email";
                    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
                }
                
            }
        } else{
            echo "Les champs ne sont pas tous remplies";
        }

    }
    
    
?>