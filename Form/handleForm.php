<?php

session_start();

// Check if enterBtn exists
if (isset($_POST['enterBtn'])) {
  // Check if the user is already logged in
  if (isset($_SESSION['userName'])) {
    // User is already logged in
    $_SESSION['infoMsg'] = $_SESSION['userName'] . " is already logged in. Please log out first.";
    header('Location: index.php');
    exit(); // Always good to use exit after header redirect
  }

  // Get the username from index.php
  $userName = $_POST['userName'];

  // Get the secret key from the input field and hash it
  $secretKey = md5($_POST['secretKey']);

  // Set the session variables
  $_SESSION['userName'] = $userName;
  $_SESSION['secretKey'] = $secretKey;

  // Go back to index.php
  header('Location: index.php');
}

if (isset($_POST['leaveBtn'])) {
  session_unset();
  session_destroy();
  header('Location: index.php');
}
