<?php
session_start();

$prices = [
  "burger" => 50,
  "fries" => 75,
  "steak" => 150
];

// Get the selected food and quantity from the form
$selected_food = isset($_GET['foods']) ? $_GET['foods'] : null;
$quantity = isset($_GET['quantity']) ? (int) $_GET['quantity'] : 0;
$cash = isset($_GET['cash']) ? (float) $_GET['cash'] : 0;

// Calculate total price
$total_price = isset($prices[$selected_food]) ? $prices[$selected_food] * $quantity : 0;

// Calculate change
$change = $cash - $total_price;

// Get current date and time
$date_time = date("Y-m-d H:i:s");

// Start HTML output
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Receipt</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #f3e6e8, #e7d5d7);
      font-family: 'Helvetica Neue', Arial, sans-serif;
    }

    .receipt {
      background: white;
      border-radius: 10px;
      padding: 40px;
      width: 350px;
      text-align: center;
      box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
    }

    .receipt h2 {
      margin-bottom: 20px;
      font-size: 2rem;
      color: #444;
      font-weight: bold;
      letter-spacing: 2px;
    }

    .receipt p {
      margin: 10px 0;
      font-size: 1.2rem;
      color: #555;
    }

    .receipt a {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      font-size: 1rem;
      color: white;
      background-color: #444;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .receipt a:hover {
      background-color: #666;
    }

    .highlight {
      font-size: 1.4rem;
      font-weight: bold;
      color: #333;
    }

    .receipt-footer {
      margin-top: 30px;
      font-size: 0.9rem;
      color: #999;
    }
  </style>
</head>

<body>
  <div class="receipt">
    <h2>RECEIPT</h2>
    <p>Total Price: ₱<?php echo number_format($total_price, 2); ?></p>
    <p>You Paid: ₱<?php echo number_format($cash, 2); ?></p>
    <p>Change: ₱<?php echo number_format($change, 2); ?></p>
    <p><?php echo $date_time; ?></p>
    <a href="index.php">Return to Menu</a>
  </div>
</body>

</html>