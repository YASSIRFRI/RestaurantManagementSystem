<?php


session_start();
if(!isset($_SESSION['user']) && $_SESSION['role']!=='admin')
{
    header('Location: /src/views/Login.php');
}
include '../models/Order.php';

$orders=Order::getCurrentOrders($_SESSION['user']);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Current Restaurant Orders</h1>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Customer</th>
					<th>Items</th>
					<th>Total</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($orders as $order): ?>
				<tr>
					<td><?php echo $order['id']; ?></td>
					<td><?php echo $order['user_email']; ?></td>
					<td><?php echo implode(", ", $order['name']); ?></td>
					<td>$<?php echo number_format($order['total'], 2); ?></td>
					<td><?php echo $order['status']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>
</html>
