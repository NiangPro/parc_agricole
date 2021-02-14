<?php

$errors = [];

if (isset($_POST['ajouter'])) {
    extract($_POST);

    if ($fct->notEmpty([$culture, $codeculture, $departement, $codedepartement, $type, $superficie, $annee, $rendement, $production])) {
        if ($db->addProduct($culture, $codeculture, $departement, $codedepartement, $type, $superficie, $annee, $rendement, $production)) {
            
            $errors[] = "Produit ajouté avec succès";
            $fct->errors($errors, "success");
            return header('Location: ?page=list');
        }
    }else{
        $errors[] = "Veuillez remplir tous les champs";
    }

    if(count($errors) > 0){
        $fct->errors($errors, "danger");
        return header('Location: ?page=addProduct');
    }
}

if (isset($_POST['modifier'])) {
    extract($_POST);

    if ($fct->notEmpty([$culture, $codeculture, $departement, $codedepartement, $type, $superficie, $annee, $rendement, $production])) {
        if ($db->editProduct($id, $culture, $codeculture, $departement, $codedepartement, $type, $superficie, $annee, $rendement, $production)) {
            
            $errors[] = "Produit mis à jour avec succès";
            $fct->errors($errors);
            return header('Location: ?page=list');
        }
    }else{
        $errors[] = "Veuillez remplir tous les champs";
    }

    if(count($errors) > 0){
        $fct->errors($errors, "danger");
        return header('Location: ?page=editProduct');
    }
}



return header('Location: ?page=logout');