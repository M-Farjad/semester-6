<?php
// Clear the username cookie by setting its expiration to an hour ago
setcookie("username", "", time() - 3600);

// Redirect back to the login page
header("Location: index.html");
exit();
?>
