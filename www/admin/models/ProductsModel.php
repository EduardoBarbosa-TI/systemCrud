<?php
class ProductsModel
{
    var $ConnectClass;
    var $Connection;

    public function __contruct(){
        require_once('db/ConetionClass.php');
        $this -> ConnectClass = new ConetionClass();
        $this -> ConnectClass->openConetion();
        $this -> Connection = $this -> ConnectClass->getConn();
    }

    public function registerProducts($arrayProduct)
    {

        $sql = "INSERT products SET name='$arrayProduct[0]', price='$arrayProduct[1]', description='$arrayProduct[2]', idCategory='$arrayProduct[3]'";

        return $this -> Connection->query($sql);
    }

    public function listProducts()
    {
        $sql = "SELECT * FROM products";

        return $this -> Connection->query($sql);
    }

    public function consultProduct($id)
    {

        $sql = "SELECT * FROM products WHERE idProduct= $id";

        return $this -> Connection->query($sql);
    }

    public function editProduct($arrayProduct)
    {
        $sqlUpdate = "UPDATE products SET name='$arrayProduct[1]',price='$arrayProduct[2]',description='$arrayProduct[3]',idCategory='$arrayProduct[4]' WHERE idProduct='$arrayProduct[0]'"; 

        return $this -> Connection -> query($sqlUpdate);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE idProduct= $id";

        return $this -> Connection->query($sql);
    }
}
