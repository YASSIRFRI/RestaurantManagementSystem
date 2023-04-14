
<?php
session_start();
require '../models/Meal.php';
$meals=Meal::getAvailableMeals();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Order Meal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"  crossorigin="anonymous">
  </head>
  <body class="bg-gray-200">
    <div class="container my-5">
      <form action="processOrder.php" method="post" class="bg-white shadow p-4 rounded">
        <div class="form-group">
          <label class="font-weight-bold text-gray-700" for="foodItem">Select Food Item</label>
          <div class="row mt-3">
            <?php
            foreach($meals as $meal)
            {
                echo'
            <div class="col-sm-6 mb-3">
              <div class="card border-0">
                <input type="radio" name="foodItem" value="burger" id="burger" class="sr-only">
                <label for="burger" class="card-body cursor-pointer">
                  <h5 class="card-title font-weight-bold mb-2">'.$meal['name'].'</h5>
                  <p class="card-text text-muted mb-2">'.$meal['description'].'</p>
                  <p class="card-text font-weight-bold text-xl">'.$meal["price"].' Dh</p>
                </label>
              </div>
            </div>';
            }
            ?>
          </div>
        </div>
        <div class="form-group">
          <label class="font-weight-bold text-gray-700" for="quantity">Quantity</label>
          <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
        </div>
        <button type="submit" class="btn btn-primary mt-4">Order Now</button>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
</script>
</body>
</html>


           
