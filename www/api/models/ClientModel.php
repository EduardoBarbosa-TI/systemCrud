<?php
   class ClientModel{  
      var $connection;

      public function __construct(){
         require_once('db/ConetionClass.php');
         $ConnectClass = new ConetionClass();
         $ConnectClass->openConetion();
         $this -> connection = $ConnectClass->getConn();
  
      }

      public function registerClient($arrayClient){ 
      
         $sql= "
            INSERT INTO clients (name,email,phone,address) 
            VALUES (
               '{$arrayClient['name']}',
               '{$arrayClient['email']}',
               '{$arrayClient['phone']}',
               '{$arrayClient['address']}')
         "; 
   
         return $this -> connection -> query($sql);
      }
      
      public function consultClient($idClient){

         $sql = "
            SELECT * FROM clients 
            WHERE 
               idClient= $idClient
         "; 
         return $this -> connection -> query($sql);
      }

      public function updateClient($idClient,$arrayClient){
     
         $sqlUpdate = "
            UPDATE clients SET
               name = '{$arrayClient['name']}',
               email = '{$arrayClient['email']}',
               phone = '{$arrayClient['phone']}',
               address = '{$arrayClient['address']}'
            WHERE
               idClient={$idClient}";

         return $this -> connection -> query($sqlUpdate);
      }

      public function deleteClient($id){
         
         $sql = "
            DELETE FROM clients 
            WHERE 
               idClient= $id
         "; 
         return $this -> connection -> query($sql);
      }
         
      public function listClients(){ 

         $sql = "
            SELECT * FROM clients
         "; 
   
         return $this -> connection -> query($sql);
      }
   }
?>