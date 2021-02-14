<?php

session_start();

require_once('views/partials/_header.php');
require_once('model/DataBase.php');
require_once('model/Fonction.php');


$db = new DataBase();
$fct = new Fonction();

if (isset($_GET['page'])) {

    switch ($_GET['page']) {
        case 'login':
            require_once('views/connexion.php');
            break;
        case 'loginController':
            require_once('controller/userController.php');
            break;
        case 'saveProduct':
            require_once('controller/productController.php');
            break;
        case 'updateProduct':
            require_once('controller/productController.php');
            break;
        case 'addUser':
            require_once('controller/userController.php');
            break;
        case 'changePassword':
            require_once('controller/userController.php');
            break;
        case 'register':
            require_once('views/inscription.php');
            break;
        case 'list':
            $products = $db->listProducts();
            require_once('views/list.php');
            break;
        case 'home':
            require_once('views/home.php');
            break;
        case 'addProduct':
            require_once('views/ajoutProduit.php');
            break;
        case 'editProduct':
            $product = $db->getProduct($_GET['id']);
            require_once('views/editProduit.php');
            break;
        case 'deleteProduct':
            $db->deleteProduct($_GET['id']);
            header('Location:?page=home');
            break;
        case 'logout':
            require_once('views/logout.php');
            break;
        case 'search':
            $codedeps = $db->getCodesDepartement();
            $codecultures = $db->getCodesCulture();
            $codetc = $db->getCodesTypeCulture();

            require_once('views/search.php');
            break;
        default:
            header('Location:?page=login');
            break;
    }
}else{
    require_once('views/connexion.php');
}

require_once('views/partials/_footer.php');
