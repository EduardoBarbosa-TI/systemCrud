<?php   
    class ProductsController{

        public function registerProducts(){
            require_once('models/ProductsModel.php');
            $ProductModel= new ProductsModel();

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

                $ProductModel ->registerProducts($arrayProduct);

                
            } 
        }

        public function listProducts(){
            require_once('models/ProductsModel.php');
            $productModel= new ProductsModel();
            $result = $productModel->listProducts();

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
                require_once('models/ProductsModel.php');
                $ProductModel = new ProductsModel();
                $result = $ProductModel->consultProduct($id);
        
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
    
                require_once('models/ProductsModel.php');
                $ProductsModel = new ProductsModel();
                $ProductsModel->editProduct($arrayProduct);
            }
            header('Location:?controller=products&action=listProducts');
        }
        public function deleteProduct(){
            if (empty($_GET['id'])) {
                header('Location: ?controller=products&action=listProducts');
            } else {
                $id = $_GET['id'];
                require_once('models/ProductsModel.php');
                $ProductModel = new ProductsModel();
                $result = $ProductModel->consultProduct($id);
    
                if ($result->num_rows > 0) {
                    $ProductModel->deleteProduct($id);
                } 
                
                header('Location: ?controller=products&action=listProducts'); 
            }
    

        }
    }
?>