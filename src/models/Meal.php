<?php
include '../dbconfig.php';
class Meal {
    private $name;
    private $price;
    private $user_id;
  
    public function __construct($name, $price, $user_id) {
      $this->name = $name;
      $this->price = $price;
      $this->user_id = $user_id;
    }
  
    // Getter for name
    public function getName() {
      return $this->name;
    }
    
    // Getter for price
    public function getPrice() {
      return $this->price;
    }
    
    // Getter for user id
    public function getUserId() {
      return $this->user_id;
    }

    public static function getAvailableMeals()
    {
      try{
        $connexion =$GLOBALS['connexion']; 
        $stmt = $connexion->prepare('SELECT * FROM meals');
        $stmt->execute();
        $meals=$stmt->fetchAll();
        return $meals;
      } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

    }
    public static function registerMeal($name, $price, $description) {
        try {
          $connexion =$GLOBALS['connexion']; 
          $stmt = $connexion->prepare('INSERT INTO meals (name, price, description) VALUES (?, ?, ?)');
          $stmt->execute([$name, $price, $description]);
          return true;
        } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
          return false;
        }
      }
    public static function getMealsByUserId($user_id) {
      $dsn = 'mysql:host=localhost;dbname=database_name';
      $user = 'username';
      $pass = 'password';
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
      ];
      try {
        $connexion = new PDO($dsn, $user, $pass, $options);
        $stmt = $connexion->prepare('SELECT * FROM meals WHERE user_id = ?');
        $stmt->execute([$user_id]);
        $meals = [];
        while ($row = $stmt->fetch()) {
          $meal = new Meal($row['id'], $row['name'], $row['price'], $row['user_id']);
          $meals[] = $meal;
        }
        return $meals;
      } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    }
  }
  
?>