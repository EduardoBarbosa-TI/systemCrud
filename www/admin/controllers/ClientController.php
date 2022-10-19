<?php
class ClientController
{
    var $ClientModel;
    
    public function __construct(){
        if(!isset($_SESSION['user'])){
            header('Location:?controller=main&action=login');
        }

        require_once('models/ClientModel.php');
        $this -> ClientModel = new ClientModel();  
    }

    public function registerClient(){

        require_once('views/templates/header.php');
        require_once('views/templates/offcanva.php');
        require_once('views/templates/home.php');
        require_once('views/client/registerClient.php');
        require_once('views/templates/footer.php');  

    }

    public function registerClientAction(){

        if(isset($_POST['submit'])){
            $client = array(
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'address' => $_POST['address'], 
            );
         $idInsertClient = $this -> ClientModel ->registerClient($client); 
         $_FILES     
        }   
        $_SESSION['submit'] = true;
        header('Location: ?controller=client&action=registerClient');
    }

    public function editClient(){

        if (empty($_GET['id'])) {
            header('Location: ?controller=client&action=listClients');
        } else {

            $id = $_GET['id'];

            $result = $this -> ClientModel->consultClient($id);

            $arrayClients =  array();

            if ($result->num_rows > 0) {

                while ($client = $result->fetch_assoc()) {
                    array_push($arrayClients, $client);
                    $nome = $client['name'];
                    $phone = $client['phone'];
                    $email = $client['email'];
                    $adreess = $client['address'];
                }

                require_once('views/templates/header.php');
                require_once('views/templates/offcanva.php');
                require_once('views/templates/home.php');
                require_once('views/client/editClient.php');
                require_once('views/templates/footer.php');

            } else {
                header('Location: ?controller=client&action=listClients');
            }
        }
    }

    public function saveEditClient(){
        if(isset($_POST['update'])){
            $id = $_POST['idClient'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];

            $arrayClient = array($name,$phone,$email,$address,$id);

            $this -> ClientModel->saveEditClient($arrayClient);
            
        }
        header('Location:?controller=client&action=listClients');
    }

    public function deleteClient(){
        if (empty($_GET['id'])) {
            header('Location: ?controller=client&action=listClients');
        } else {
            $id = $_GET['id'];
    
            $result = $this -> ClientModel->consultClient($id);

            if ($result->num_rows > 0) {
                $this -> ClientModel->deleteClient($id);
            } 
            
            header('Location: ?controller=client&action=listClients');
            
        }

    }

    public function registerView(){
        if (isset($_POST['accept'])) {
            $accept = true;
            $acceptView = 'O termo foi aceito';
        } else {
            $accept = false;
            $acceptView = 'O termo não foi aceito';
        }

        $arrayClient = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'cel' => $_POST['cel'],
            'gender' => $_POST['gender'],
            'accept' => $accept,
            'acceptView' => $acceptView
        );
        require_once('views/templates/header.php');
        require_once('views/client/registerView.php');
        require_once('views/templates/footer.php');
    }

    public function listClients(){
        $result = $this -> ClientModel->listClients();


        $arrayClients =  array();

        while ($client = $result->fetch_assoc()) {
            array_push($arrayClients, $client);
        }

        require_once('views/templates/header.php');
        require_once('views/templates/offcanva.php');
        require_once('views/templates/home.php');
        require_once('views/client/listClients.php');
        require_once('views/templates/footer.php');
    }
}
