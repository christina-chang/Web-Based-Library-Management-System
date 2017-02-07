<html>
<body>
<?php
session_start();

unset($_SESSION['cardnumber']);
unset($_SESSION['name']);
unset($_SESSION['BorR']);
unset($_SESSION['message']);
unset($_SESSION['time']);

$url = "borrow.php";

echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";

?>
</body>
</html>