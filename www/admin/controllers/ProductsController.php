<?php   
    class ProductsController{
        var $ProductModel;
        
        public function __construct(){
            if(!isset($_SESSION['user'])){
                header('Location:?controller=main&action=login');
            } 

            require_once('models/ProductsModel.php');
            $this -> ProductModel= new ProductsModel();

        }

        public function registerProducts(){
            require_once('views/templates/header.php');
            require_once('views/templates/home.php');
            require_once('views/templates/offcanva.php');
            require_once('views/products/registerProducts.php');
            require_once('views/templates/footer.php');

            if(isset($_POST['update'])){
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $category= $_POST['category'];

                $arrayProduct =  array($name,$price,$description,$category);

                $this -> ProductModel ->registerProducts($arrayProduct);

                
            } 
        }

        public function listProducts(){
            $result = $this -> ProductModel->listProducts();

            $arrayProducts =  array();

            while ($product = $result -> fetch_assoc()) {
                array_push($arrayProducts, $product);
            }

            require_once('views/templates/header.php');
            require_once('views/templates/home.php');
            require_once('views/templates/offcanva.php');
            require_once('views/products/listProducts.php');
            require_once('views/templates/footer.php');

        }

        public function consultProducts(){
            if (empty($_GET['id'])) {
                header('Location: ?controller=products&action=listProducts');
            } else {
                $id = $_GET['id'];
                $result = $this -> ProductModel->consultProduct($id);
        
                $arrayProducts =  array();
    
                if ($result->num_rows > 0) {
                    while ($product = $result->fetch_assoc()) {
                        array_push($arrayProducts, $product);
                        $name = $product['name'];
                        $price = $product['price'];
                        $description = $product['description'];
                        $category = $product['idCategory'];
                    }
                    require_once('views/templates/header.php');
                    require_once('views/templates/offcanva.php');
                    require_once('views/templates/home.php');
                    require_once('views/products/editProduct.php');
                    require_once('views/templates/footer.php');
                } else {
                    header('Location: ?controller=products&action=listProducts');
                }
            }
        }

        public function editProduct(){

            if(isset($_POST['update'])){
                $id = $_POST['idProduct'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $category = $_POST['category'];
              
              
                $arrayProduct = array($id,$price,$name,$description,$category);
    
          
                $this -> ProductsModel->editProduct($arrayProduct);
            }
            header('Location:?controller=products&action=listProducts');
        }
        
        public function deleteProduct(){
            if (empty($_GET['id'])) {
                header('Location: ?controller=products&action=listProducts');
            } else {
                $id = $_GET['id'];
                $result = $this -> ProductModel->consultProduct($id);
    
                if ($result->num_rows > 0) {
                    $this -> ProductModel->deleteProduct($id);
                } 
                
                header('Location: ?controller=products&action=listProducts'); 
            }
    

        }
    }
?>