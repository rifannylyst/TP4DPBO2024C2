<?php
include_once("models/DB.class.php");
include_once("models/Product.class.php");
include_once("controllers/Member.controller.php");
include_once("models/Template.class.php");

$members = new MemberController();

if (isset($_GET['add'])) {
    $members->addNew();
} else if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $success = $members->delete($id);
} else if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $members->editNew($id);
} else if(isset($_POST['submit'])) {
    $data = array(
        'member_name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'join_date' => $_POST['join_date']
    );
    //print_r($data);
    // Jika tombol submit ditekan, panggil fungsi add dari MemberController
    $members->add($data);
} else if(isset($_POST['edit'])) {
    $data = array(
        'member_name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'join_date' => $_POST['join_date'],
        'member_id' => $_POST['member_id']
    );
    //print_r($data);
    // Jika tombol submit ditekan, panggil fungsi add dari MemberController
    $members->edit($data);
} else {
    $members->index(); // Menggunakan objek $members yang sudah dibuat sebelumnya
}
?>
