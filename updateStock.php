<?php
if (isset($_POST['produit'])) {
    $pr = $_POST['produit'];
    $vl = $_POST['value'];
    date_default_timezone_set("Africa/Tunis");

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
    $date = date('Y-m-d');
    $time = date('G:i:s');
    $sql2 = "update stock set quantite= quantite + $vl,datemodifier='$date', timemodifier = '$time' where produit = '$pr' ;";
    $result = $mysqli->query($sql2);
    if($result){
        $insertHistory = "insert into stockhistory(produit,quantity,time,date) values('$pr',$vl,'$time','$date');";
        $mysqli->query($insertHistory);
    }
    

}
?>