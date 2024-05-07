<?php

class Order extends DB
{
    
    function getAllOrders()
    {
        $query = "SELECT * FROM orders";
        return $this->execute($query);
    }

    public function getOrderById($id) {
        $query = "SELECT * FROM orders WHERE order_id = $id"; 
        return $this->execute($query);
    }

    function addOrder($data)
    {
        $member_id = $data['member_id'];
        $product_id = $data['product_id'];
        $quantity = $data['quantity'];
        $order_date = $data['order_date'];

        $query = "INSERT INTO orders (member_id, product_id, quantity, order_date) VALUES ('$member_id', '$product_id', '$quantity', '$order_date')";
        return $this->execute($query);
    }

    function editOrder($data)
    {
        $id = $data['order_id'];
        $member_id = $data['member_id'];
        $product_id = $data['product_id'];
        $quantity = $data['quantity'];
        $order_date = $data['order_date'];

        $query = "UPDATE orders SET member_id = '$member_id', product_id = '$product_id', quantity = '$quantity', order_date = '$order_date' WHERE order_id = '$id'";
        return $this->execute($query);
    }

    function deleteOrder($id)
    {
        $query = "DELETE FROM orders WHERE order_id = $id";
        return $this->execute($query);
    }
}

?>
