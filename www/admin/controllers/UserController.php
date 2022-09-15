<?php
    class UserController{
        public function validationLogin(){
            $userName = $_POST['userName'];
            $password = $_POST['password'];
            require_once('models/UserModel.php');
            $UserModel = new UserModel();

            $result = $UserModel -> consultUser($userName);

            if($line = $result->fetch_assoc()){
                if($password == $line['password']){
                    $_SESSION['user'] = $line;
                    header('Location: index.php');
                }else{ 
                    $_SESSION['messageInvalidPassword'] = true;
                    require_once('MainController.php');
                    $MainController = new MainController();
                    $MainController->index();
                }
            }else{
                $_SESSION['messageInvalidNameAndPassword'] = true;
                require_once('MainController.php');
                $MainController = new MainController();
                $MainController->index();
                
            }
        }
    }
