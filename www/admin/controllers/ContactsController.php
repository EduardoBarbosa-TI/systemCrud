<?php  
    class ContactsController{
        var $ContactsModel;

        public function __construct(){
            if(!isset($_SESSION['user'])){
                header('Location:?controller=main&action=login');
            } 

            require_once('models/ContactsModel.php');
            $this -> ContactsModel= new ContactsModel();
        }
        
        public function registrationContacts(){
          
            $result = $this ->ContactsModel->registrationContacts();

            $arrayContacts =  array();

            while ($contact = $result -> fetch_assoc()) {
                array_push($arrayContacts, $contact);
            }
            require_once('views/templates/header.php');
            require_once('views/templates/offcanva.php');
            require_once('views/templates/home.php');
            require_once('views/contacts/registrationContacts.php');
            require_once('views/templates/footer.php');


        }

        public function listContacts(){
            $result = $this ->ContactsModel->listContacts();

            $arrayContacts =  array();

            while ($contact = $result -> fetch_assoc()) {
                array_push($arrayContacts, $contact);
            }

            require_once('views/templates/header.php');
            require_once('views/templates/offcanva.php');
            require_once('views/templates/home.php');
            require_once('views/contacts/listContacts.php');
            require_once('views/templates/footer.php');

        }
    }
?>