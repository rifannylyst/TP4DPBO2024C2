<?php

class Product extends DB 
{
    public function getAllProducts() 
    {
        $query = "SELECT * FROM products";
        return $this->execute($query);
    }

    public function getProductById($id) 
    {
        $query = "SELECT * FROM products WHERE product_id = $id";
        return $this->execute($query);
    }

    function addProduct($data)
    {
        $name = $data['name'];
        $price = $data['price'];

        $query = "INSERT INTO products ( name, price) VALUES ('$name', '$price')";
        return $this->execute($query);
    }

    public function editProduct($data) 
    {
        $id = $data['product_id'];
        $name = $data['name'];
        $price = $data['price'];

        $query = "UPDATE products SET name = '$name', price = '$price' WHERE product_id = '$id'";
        return $this->execute($query);
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE product_id = $id";
        return $this->execute($query);
    }
}

?>
