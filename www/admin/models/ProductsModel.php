<?php
class ProductsModel
{

    public function registerProducts($name, $price, $description, $category)
    {
        require_once('db/ConetionClass.php');
        $connectClass = new ConetionClass();
        $connectClass->openConetion();
        $connection = $connectClass->getConn();


        $sql = "INSERT products SET name='$name', price='$price', description='$description', idCategory='$category'";

        return $connection->query($sql);
    }

    public function listProducts()
    {
        require_once('db/ConetionClass.php');
        $connectClass = new ConetionClass();
        $connectClass->openConetion();
        $connection = $connectClass->getConn();


        $sql = "SELECT * FROM products";

        return $connection->query($sql);
    }

    public function consultProduct($id)
    {
        require_once('db/ConetionClass.php');
        $connectClass = new ConetionClass();
        $connectClass->openConetion();
        $connection = $connectClass->getConn();


        $sql = "SELECT * FROM products WHERE idProduct= $id";

        return $connection->query($sql);
    }

    public function editProduct($arrayProduct)
    {
        require_once('db/ConetionClass.php');
        $connectClass = new ConetionClass();
        $connectClass->openConetion();
        $connection = $connectClass->getConn();

        $sqlUpdate = "UPDATE products SET name='$arrayProduct[1]',price='$arrayProduct[2]',description='$arrayProduct[3]' WHERE idProduct='$arrayProduct[0]'"; 

        return $connection -> query($sqlUpdate);
    }

    public function deleteProduct($id)
    {
        require_once('db/ConetionClass.php');
        $connectClass = new ConetionClass();
        $connectClass->openConetion();
        $connection = $connectClass->getConn();


        $sql = "DELETE FROM products WHERE idProduct= $id";

        return $connection->query($sql);
    }
}
