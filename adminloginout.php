<?php
session_start();

session_destroy();

$url = "home.html";

echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";

?>