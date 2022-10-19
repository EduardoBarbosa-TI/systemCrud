<?php
   class ClientModel{  
      var $ConnectClass;
      var $Connection;

      public function __construct(){
         require_once('db/ConetionClass.php');
         $this ->ConnectClass = new ConetionClass();
         $this ->ConnectClass->openConetion();
         $this -> Connection = $this ->ConnectClass->getConn();
  
      }

      public function registerClient($client){ 
      
         $sql= "INSERT clients SET name='$client[name]',phone='$client[phone]',email='$client[email]',address='$client[address]'"; 
   
         $this -> Connection -> query($sql);

         return $this -> Connection -> insert_id;
      }
      
      public function consultClient($id){

         $sql = "SELECT * FROM clients WHERE idClient= $id"; 
   
         return $this -> Connection -> query($sql);
      }

      public function saveEditClient($arrayClient){
     
         $sqlUpdate = "UPDATE clients SET name='$arrayClient[0]',phone='$arrayClient[1]',email='$arrayClient[2]',address='$arrayClient[3]' WHERE idClient='$arrayClient[4]'"; 

         return $this -> Connection -> query($sqlUpdate);
      }

      public function deleteClient($id){
         
         $sql = "DELETE FROM clients WHERE idClient= $id"; 
   
         return $this -> Connection -> query($sql);

      }
         
      public function listClients(){ 

         $sql = "SELECT * FROM clients"; 
   
         return $this -> Connection -> query($sql);
      }
   }
?>