<?php
include_once("models/DB.class.php");
include_once("models/Product.class.php");
include_once("controllers/Order.controller.php");
include_once("models/Template.class.php");

$orders = new OrderController();

if (isset($_GET['add'])) {
    $orders->addNew();
} else if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $success = $orders->delete($id);
} else if (!empty($_GET['edit'])) {
    $id = $_GET['edit'];
    $orders->editNew($id);
} else if(isset($_POST['submit'])) {
    $data = array(
        'member_id' => $_POST['member_id'],
        'product_id' => $_POST['product_id'],
        'quantity' => $_POST['quantity'],
        'order_date' => $_POST['order_date']
    );
    //print_r($data);
    // Jika tombol submit ditekan, panggil fungsi add dari MemberController
    $orders->add($data);
} else if(isset($_POST['edit'])) {
    $data = array(
        'member_id' => $_POST['member_id'],
        'product_id' => $_POST['product_id'],
        'quantity' => $_POST['quantity'],
        'order_date' => $_POST['order_date']
    );
    //print_r($data);
    // Jika tombol submit ditekan, panggil fungsi add dari MemberController
    $orders->edit($data);
} else{
    $orders->index(); // Menggunakan objek $members yang sudah dibuat sebelumnya
}
?>
