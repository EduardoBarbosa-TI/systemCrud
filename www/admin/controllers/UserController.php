<?php
    class UserController{
        
        var $UserModel;
        var $MainController;

        public function __construct(){
            require_once('models/UserModel.php');
            $this -> UserModel = new UserModel();

            require_once('MainController.php');
            $this -> MainController = new MainController();
        }


        public function validationLogin(){
            $userName = $_POST['userName'];
            $password = $_POST['password'];
            
            $result = $this -> UserModel -> consultUser($userName);

            if($line = $result->fetch_assoc()){
                if($password == $line['password']){
                    $_SESSION['user'] = $line;
                    header('Location: index.php');
                }else{ 
                    $_SESSION['messageInvalidPassword'] = true;
                    $this -> MainController->index();
                }
            }else{
                $_SESSION['messageInvalidNameAndPassword'] = true;
        
                $this -> MainController->index();
                
            }
        }

    }
