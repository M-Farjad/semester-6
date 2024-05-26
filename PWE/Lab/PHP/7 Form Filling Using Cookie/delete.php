<?php
// set the expiration date to one hour ago
setcookie("user", "", time() - 3600);
?>
<html>

<body>

    <?php
    echo "Cookie 'user' is deleted.";
    ?>

    <br>
    <a href="index.php">Go back to index.php</a>

</body>

</html>