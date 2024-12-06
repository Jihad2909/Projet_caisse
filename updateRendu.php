<?php
if (isset($_POST['rendu'])) {
    $rendu = $_POST['rendu'];
    $billet = $_POST['billet'];
    $id = $_POST['id'];

    // Database connection variables
    $host = 'localhost';
    $dbname = 'cafe';
    $username = 'jihad';
    $password = 'jihad@2001';

    // Create a new MySQLi connection
    $mysqli = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $sql2 = "update commande set rendu=$rendu, billet= $billet where id = $id ;";
    $sql = "update orders set rendu=$rendu, billet= $billet where id_cmd = $id ;";
    $result = $mysqli->query($sql2);
    $result2 = $mysqli->query($sql);

}
?>
