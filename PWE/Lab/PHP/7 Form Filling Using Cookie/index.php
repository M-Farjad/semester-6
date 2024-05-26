<?php
$cookie_name = "user";
$cookie_value = "Farjad";
setcookie($cookie_name, $cookie_value, time() + (10), "/"); // 86400 = 1 day
?>
<html>

<body>

    <?php
    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }
    ?>
    <br /><br /><input type="text" value="<?php if (isset($_COOKIE[$cookie_name])) echo $_COOKIE[$cookie_name]; ?>" />
    <br /><a href="delete.php">Delete this cookie</a>
</body>

</html>