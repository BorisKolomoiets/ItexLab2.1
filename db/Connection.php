<?php
error_log(E_ALL);
try {
    $db = new PDO('mysql:host=localhost;dbname=itexlab2_1',
        'root',
        'root',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}