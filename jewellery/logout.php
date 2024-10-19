<?php
session_start();
session_destroy();
if(isset($_COOKIE['qty'])) {
    // Delete the session cookie
    setcookie("qty", "", time() - 1);
}
header("Location:index.php");
?>