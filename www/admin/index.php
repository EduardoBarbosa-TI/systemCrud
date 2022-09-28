<?php
session_start();
if (!isset($_GET['controller'])) {
    require_once('controllers/MainController.php');
    $MainController = new MainController();
    $MainController->index();
} else {
    switch ($_REQUEST['controller']) {
        case 'main':
            require_once('controllers/MainController.php');
            $MainController = new MainController();
            if (!isset($_GET['action'])) {
                $MainController->index();
            } else {
                switch ($_REQUEST['action']) {
                    case 'login':
                        $MainController->login();
                        break;
                    case 'logout':
                        $MainController->logout();
                        break;
                }
            }
        break;

        case 'user':
            require_once('controllers/UserController.php');
            $UserController = new UserController();
            if (!isset($_GET['action'])) {
            } else {
                switch ($_REQUEST['action']) {
                    case 'validationLogin':
                        $UserController->validationLogin();
                    break;
                }
            }
        break;

        case 'client':
            require_once('controllers/ClientController.php');
            $ClientController = new ClientController();
            if (!isset($_GET['action'])) {
                $ClientController->index();
            } else {
                switch ($_REQUEST['action']) {
                    case 'registerClient':
                        $ClientController->registerClient();
                    break;
                    case 'registerClientAction':
                        $ClientController->registerClientAction();
                    break;
                    case 'editClient':
                        $ClientController->editClient();
                    break;
                    case 'saveEditClient':
                        $ClientController->saveEditClient();  
                    break;
                    case 'deleteClient':
                        $ClientController->deleteClient();
                        break;
                    case 'listClients':
                        $ClientController->listClients();
                        break;
                    case 'registerView':
                        $ClientController->registerView();
                        break;
                }
            }
        break;

        case 'contacts':
            require_once('controllers/ContactsController.php');
            $contact = new ContactsController();
            if (!isset($_GET['action'])) {
                $contact->listContacts();
            } else {
                switch ($_REQUEST['action']) {
                    case 'registrationContacts':
                        $contact->registrationContacts();
                        break;
                    case 'listContacts':
                        $contact->listContacts();
                        break;
                }
            }

        break;
        
        case 'products':
            require_once('controllers/ProductsController.php');
            $products = new ProductsController();
            if (isset($GET['action'])) {
                $products->listProducts();
            } else {
                switch ($_REQUEST['action']) {
                    case 'registerProducts':
                        $products->registerProducts();
                        break;
                    case 'listProducts':
                        $products->listProducts();
                    break;
                    case 'consultProduct':
                        $products ->consultProducts();
                    break;
                    case 'editProduct':
                        $products ->editProduct();
                    break;
                    case 'deleteProduct':
                        $products ->deleteProduct();
                    break;
                }
            }
        break;
    }
}
