<?php
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/Order.class.php");
include_once("models/Product.class.php");
include_once("views/Order.php");
include_once("views/Member.php");
include_once("views/Product.php");
include_once("models/DB.class.php"); 

class OrderController {
    private $order;
    private $product;
    private $member;

    function __construct() {
        $this->order = new Order(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->product = new Product(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->order->open();
        $this->order->getAllOrders();
        $data = array();
        while($row = $this->order->getResult()) {
            array_push($data, $row);
        }
        $this->order->close();

        $view = new OrderView();
        $view->render($data);
    }

    public function addNew() {
        // Membuat objek dari MemberView
        $view = new OrderView();
        
        // Memanggil fungsi form dari MemberView
        echo $view->formOrder();
    }

    public function add($data) {
        $this->order->open();
        //print_r($data);
        $this->order->addOrder($data);
        $this->order->close();   
        header("location:order.php"); 
    } 

    public function editNew($id) {
        $this->order->open();
        $this->order->getOrderById($id);
        $data = null;
        $data = $this->order->getResult();        

        $this->order->close();
        // Membuat objek dari MemberView
        $view = new OrderView();
        
        // Memanggil fungsi form dari MemberView
        $view->formEdit($data);
    }

    public function edit() {
        $this->order->open();
        $this->order->editOrder($id);
        $this->order->close();
        header("location:order.php");
    }

    public function delete($id) {
        $this->order->open();
        $this->order->deleteOrder($id);
        $this->order->close();
        header("location:order.php");
    }  
}
?>
