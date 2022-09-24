<?php
   class ClientModel{  

      

      public function registerClient($arrayClient){ 
         require_once('db/ConetionClass.php');
         $connectClass = new ConetionClass();
         $connectClass->openConetion();
         $connection = $connectClass->getConn();

      
         $sql= "INSERT clients SET name='$arrayClient[0]',phone='$arrayClient[1]',email='$arrayClient[2]',address='$arrayClient[3]'"; 
   
         return $connection -> query($sql);
      
      }
      public function consultClient($id){
         require_once('db/ConetionClass.php');
         $connectClass = new ConetionClass();
         $connectClass->openConetion();
         $connection = $connectClass->getConn();

      
         $sql = "SELECT * FROM clients WHERE idClient= $id"; 
   
         return $connection -> query($sql);
      }

      public function saveEditClient($arrayClient){
         require_once('db/ConetionClass.php');
         $connectClass = new ConetionClass();
         $connectClass->openConetion();
         $connection = $connectClass->getConn();

         $sqlUpdate = "UPDATE clients SET name='$arrayClient[0]',phone='$arrayClient[1]',email='$arrayClient[2]',address='$arrayClient[3]' WHERE idClient='$arrayClient[4]'"; 

         return $connection -> query($sqlUpdate);
      }

      public function deleteClient($id){
         require_once('db/ConetionClass.php');
         $connectClass = new ConetionClass();
         $connectClass->openConetion();
         $connection = $connectClass->getConn();

      
         $sql = "DELETE FROM clients WHERE idClient= $id"; 
   
         return $connection -> query($sql);

      }
         
      public function listClients(){ 
         require_once('db/ConetionClass.php');
         $connectClass = new ConetionClass();
         $connectClass->openConetion();
         $connection = $connectClass->getConn();


         $sql = "SELECT * FROM clients"; 
   
         return $connection -> query($sql);
      }
   }
?>