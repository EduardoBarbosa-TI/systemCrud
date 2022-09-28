<?php
    class ContactsModel{
       var $ConnectClass;
       var $Connection;

        public function __contruct(){
            require_once('db/ConetionClass.php');
            $this -> ConnectClass = new ConetionClass();
            $this -> ConnectClass->openConetion();
            $this -> Connection = $this -> ConnectClass->getConn();
        }

        public function registrationContacts(){
            $sql = "SELECT * FROM contacts"; 
    
            return $this -> Connection -> query($sql);
        }


        public function listContacts(){
            $sql = "SELECT * FROM contacts"; 
    
            return $this -> Connection -> query($sql);
        }
    }
?>