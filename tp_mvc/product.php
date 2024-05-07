<?php
include_once("models/DB.class.php");
include_once("models/Template.class.php");
include_once("models/Product.class.php");
include_once("controllers/Product.controller.php");

$products = new ProductController();

if (isset($_GET['add'])) {
    $products->addNew();
} else if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $success = $products->delete($id);
} else if (!empty($_GET['edit'])) {
    $id = $_GET['edit'];
    $products->editNew($id);
} else if(isset($_POST['submit'])) {
    $data = array(
        'name' => $_POST['name'],
        'price' => $_POST['price']
    );
    //print_r($data);
    // Jika tombol submit ditekan, panggil fungsi add dari MemberController
    $products->add($data);
} else if(isset($_POST['edit'])) {
    $data = array(
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'member_id' => $_POST['member_id']
    );
    //print_r($data);
    // Jika tombol submit ditekan, panggil fungsi add dari MemberController
    $products->edit($data);
}else{
    $products->index(); // Menggunakan objek $members yang sudah dibuat sebelumnya
}
?>