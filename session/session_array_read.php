<?php
// session read
session_start();
$i = 1;
while ($i <= 3) {
    echo $_SESSION['username'][$i];
    echo "<br>";
    $i = $i + 1;
}
?>