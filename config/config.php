<!-- <?php
define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PASS", '');
define("DB_NAME", 'sneaker');
?> -->

<?php
    $conn = mysqli_connect('localhost','root','','sneaker');
    mysqli_set_charset($conn, "utf8");

?>
