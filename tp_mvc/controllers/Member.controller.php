<?php
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/Order.class.php");
include_once("models/Product.class.php");
include_once("views/Member.php");
include_once("views/Order.php");
include_once("views/Product.php");

class MemberController {
    private $member;
    private $order;
    private $product;

    function __construct(){
        $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->order = new Order(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->product = new Product(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }
  
    public function index() {
        $this->member->open();
        $this->member->getAllMembers();
        $data = array();
        while($row = $this->member->getResult()){
            array_push($data, $row);
        }

        $this->member->close();

        $view = new MemberView();
        $view->render($data);
    }

    public function addNew() {
        // Membuat objek dari MemberView
        $view = new MemberView();
        
        // Memanggil fungsi form dari MemberView
        $view->form();
    }

    public function add($data) {
        $this->member->open();
        //print_r($data);
        $this->member->addMember($data);
        $this->member->close();   
        header("location:index.php"); 
    } 

    public function editNew($id) {
        $this->member->open();
        $this->member->getMemberById($id);
        $data = null;
        $data = $this->member->getResult();        

        $this->member->close();
        // Membuat objek dari MemberView
        $view = new MemberView();
        
        // Memanggil fungsi form dari MemberView
        $view->formEdit($data);
    }

    public function edit($data) {
        $this->member->open();
        $this->member->editMember($data);
        $this->member->close();
        header("location:index.php");
    }

    public function delete($id) {
        $this->member->open();
        $this->member->deleteMember($id);
        $this->member->close();
        header("location:index.php");
    }
}
?>
