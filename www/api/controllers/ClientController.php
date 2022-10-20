<?php
class ClientController
{
    var $ClientModel;

    public function __construct()
    {
        require_once('models/ClientModel.php');
        $this->ClientModel = new ClientModel();
    }

    public function registerClient()
    {
        $client = json_decode(file_get_contents("php://input"));
        $arrayClient = (array) $client;
        $this -> ClientModel -> registerClient($arrayClient);
        header('Content-Type: application/json');
        echo('{
            "success" : "1",
            "message" : "Cliente inserido!"
        }');
       
    }

    public function updateClient($idClient)
    {
        $client = json_decode(file_get_contents("php://input"));
        $arrayClient = (array) $client;
        $this -> ClientModel -> registerClient($idClient, $arrayClient);
        header('Content-Type: application/json');
        echo('{
            "error" : "1",
            "message" : "Cliente alterado!"
        }'
    );     
    }

    public function deleteClient($idClient)
    {
        $this -> ClientModel -> deleteClient($idClient);
        header('Content-Type: application/json');
        echo('
            {
                "success" : "3",
                "message" : "Cliente deletado"   
            }
        ');
    }

    public function listClients()
    {
        $result = $this->ClientModel->listClients();
        $arrayClients =  array();

        while ($client = $result->fetch_assoc()) {
            array_push($arrayClients, $client);
        }

        header('Content-Type: application/json');
        echo json_encode($arrayClients);
    }

    public function consultClient($idClient)
    {
        $result = $this->ClientModel->consultClient($idClient);

        if($arrayClient = $result->fetch_assoc()) {
            header('Content-Type: application/json');
            echo json_encode($arrayClient);
        }else{
            header('Content-Type: application/json');
            echo('{
                "error" : "1",
                "message" : "Cliente não encontrado!"
            }');
        } 
    }
}
