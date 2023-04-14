<?php


include '../dbconfig.php';

class Order {
    private $id;
    private $total_price;
    private $user_email;
    private $meals;
    private $status;
    public function __construct($id, $total_price, $user_email, $meals, $status) {
      $this->id = $id;
      $this->total_price = $total_price;
      $this->user_email = $user_email;
      $this->meals = $meals;
      $this->status = $status;
    }
    // Getter for id
    public function getId() {
      return $this->id;
    }
    // Getter for total price
    public function getTotalPrice() {
      return $this->total_price;
    }
    // Getter for user email
    public function getUserEmail() {
      return $this->user_email;
    }
    // Getter for meals
    public function getMeals() {
      return $this->meals;
    }
    // Getter for status
    public function getStatus() {
      return $this->status;
    }
    public static function getOrdersByUserId($user_email)
    {
      try{
        $connexion=$GLOBALS['connexion'];
        $stmt = $connexion->prepare('SELECT * FROM orders INNER JOIN meals WHERE user_email = ?');
        $stmt->execute([$user_email]);
        $orders=$stmt->fetchAll();
        return $orders;
      } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

    }

    public static function getCurrentOrders()
    {
      try{
        $connexion=$GLOBALS['connexion'];
        $stmt = $connexion->prepare('SELECT * FROM orders WHERE  status = ?');
        $stmt->execute(['pending']);
        $order=$stmt->fetch();
        return $order;
      } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    }
    public static function registerOrder($total_price, $user_email, $meals) {
        try {
          $connexion =$GLOBALS['connexion']; 
          $stmt = $connexion->prepare('INSERT INTO orders (total_price, user_email, meals) VALUES (?, ?, ?)');
          $stmt->execute([$total_price, $user_email, $meals]);
          return true;
        } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
          return false;
        }
      }
    public static function updateOrderStatus($status, $id) {
        try {
          $connexion =$GLOBALS['connexion']; 
          $stmt = $connexion->prepare('UPDATE orders SET status = ? WHERE id = ?');
          $stmt->execute([$status, $id]);
          return true;
        } catch (PDOException $e) {
          echo "Connection failed: ";
}
    }

}


?>