<?php
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/Order.class.php");
include_once("models/Product.class.php");
include_once("views/Product.php");
include_once("views/Order.php");
include_once("views/Member.php");
include_once("models/DB.class.php"); 

class ProductController {
  private $db;
  private $product;
  private $order;
  private $member;

  // Konstruktor
  public function __construct() {
      $this->db = new DB(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name); // Sediakan parameter yang diperlukan untuk DB
      $this->product = new Product(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
      $this->order = new Order(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
      $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->product->open();
    $this->product->getAllProducts();
    $data = array();
    while($row = $this->product->getResult()){
      array_push($data, $row);
    }

    $this->product->close();

    $view = new ProductView();
    $view->render($data);
  }

  public function addNew() {
        // Membuat objek dari MemberView
        $view = new ProductView();
        
        // Memanggil fungsi form dari MemberView
        echo $view->formProduct();
    }

    public function add($data) {
        $this->product->open();
        //print_r($data);
        $this->product->addProduct($data);
        $this->product->close();   
        header("location:product.php"); 
    } 

    public function editNew($id) {
      $this->product->open();
      $this->product->getProductById($id);
      $data = null;
      $data = $this->product->getResult();        

      $this->product->close();
      // Membuat objek dari MemberView
      $view = new ProductView();
      
      // Memanggil fungsi form dari MemberView
      $view->formEdit($data);
  }

    public function edit() {
        $this->product->open();
        $this->product->editProduct($id);
        $this->product->close();
        header("location:product.php");
    }

    public function delete($id) {
        $this->product->open();
        $this->product->deleteProduct($id);
        $this->product->close();
        header("location:product.php");
    }  
}
?>
