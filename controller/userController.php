<?php

$errors = [];

if(isset($_POST['connexion'])){
    extract($_POST);

    if($fct->notEmpty([$pseudo, $password])){

        $user = $db->connexion($pseudo, $password);

        if($user){
            $_SESSION['user'] = $user;
            return header('Location: ?page=home');
        }else{
            $errors[] = "Pseudo ou mot de passe incorrect";
           return header('Location: ?page=login');
        }

    }else{
        $errors[] = "Veuillez remplir tous les champs";
    }

    if(count($errors) > 0){
        $fct->errors($errors, "danger");
    }
    
}

if(isset($_POST['inscription'])){
    extract($_POST);

    if($fct->notEmpty($pseudo, $email, $password, $password_confirm)){
        if($password == $password_confirm){
            if($db->inscription($email, $pseudo, $password)){
                $errors[] = "Compte activé avec succès";
                $fct->errors($errors, "success");
                return header('Location: ?page=login');
            }
        } else{
            $errors[] = "Les deux mot de passe sont différents";
        }
    }else{
        $errors[] = "Veuillez remplir tous les champs";
    }

    if(count($errors) > 0){
        $fct->errors($errors, "danger");
        return header('Location: ?page=register');
    }
}

if (isset($_POST['change'])) {
    extract($_POST);

    if ($fct->notEmpty([$password, $new_password, $password_confirm])) {
        if ($db->getUserByPassword($password) > 0) {
            if ($new_password == $password_confirm) {
            
                if ($db->changePassword($_SESSION['user']->id, $password)) {
                    $errors[] = "Mot de passe changé avec succès";
                    $fct->errors($errors);
                    return header('Location: ?page=home');
                }
            }else{
                $errors[] = "Les deux mots de passe sont différents";
            }
        } else {
            $errors[] = "Mot de passe inéxistant";
        }
        
    }else{
        $errors[] = "Veuillez remplir tous les champs";
    }

    if(count($errors) > 0){
        $fct->errors($errors, "danger");
        return header('Location: ?page=home');
    }
}

return header('Location: ?page=login');