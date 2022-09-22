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

    public function editProduct($id,$price,$name,$description)
    {
        require_once('db/ConetionClass.php');
        $connectClass = new ConetionClass();
        $connectClass->openConetion();
        $connection = $connectClass->getConn();

        $sqlUpdate = "UPDATE products SET name='$name',price='$price',description='$description' WHERE idProduct='$id'"; 

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
