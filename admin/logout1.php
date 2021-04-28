<?php
session_start();
unset($_SESSION["user"]);
//header("location:kitchenlogin.php");
echo '<meta http-equiv="refresh" content="1; URL=kitchenlogin.php" />';
?>