<?php
$mysqli = new mysqli("localhost","2343721","c4jfg9","db2343721");
if ($mysqli -> connect_errno) {
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}
?>