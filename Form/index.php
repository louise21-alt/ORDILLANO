<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php session_start(); ?>

    <form action="handleForm.php" method="POST">
        <p><input type="text" placeholder="Username here" name="userName"></p>
        <p><input type="password" placeholder="Secret key here" name="secretKey"></p>
        <p><input type="submit" value="Login" name="enterBtn"></p>
        <p><input type="submit" value="Logout" name="leaveBtn"></p>
    </form>

    <?php
    // Display any login message
    if (isset($_SESSION['infoMsg'])) {
        echo '<h2>' . htmlspecialchars($_SESSION['infoMsg']) . '</h2>';
        unset($_SESSION['infoMsg']); // Clear the message after displaying it
    } else {
        // Display user information only if logged in
        if (isset($_SESSION['userName'])) { ?>
            <h2>User logged in: <?php echo htmlspecialchars($_SESSION['userName']); ?></h2>
            <h2>User secret key: <?php echo htmlspecialchars($_SESSION['secretKey']); ?></h2>
        <?php }
    }
    ?>
</body>

</html>