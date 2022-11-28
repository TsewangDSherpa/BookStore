<?php
$dsn = 'mysql:host=localhost;dbname=bookstore';
$username = 'bookManager';
$password = 'pa55word';

try {
    $db = new PDO($dsn, $username, $password);
    // echo '<h6> You are connected to the database!</h6>';

} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo 'ERROR';
    exit();
}

?>