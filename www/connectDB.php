<?php

$userDB = "user";
$passDB = "test";

try {
    $conn = new PDO('mysql:host=db;dbname=myDb',$userDB, $passDB, array(
        PDO::ATTR_PERSISTENT => true
    ));
    /* foreach($conn->query('SELECT * FROM Person') as $row) {
        print_r($row);
    } */
} catch (PDOException $e) {
    print "Erreur! : " . $e->getMessage() . "<br />";
    die();
}