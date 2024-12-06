<?php
date_default_timezone_set("Africa/Tunis");
// Database connection
$servername = "localhost";
$username = "jihad";
$password = "jihad@2001";
$dbname = "cafe";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve order data from POST request
$data = json_decode(file_get_contents("php://input"), true);
if (isset($data['order'])) {
    $orderItems = json_decode($data['order'], true);
    $date = date('Y-m-d');
    $time = date('G:i:s');
    $sql2 = "insert into commande (date,time) values('$date','$time');";
    if ($conn->query($sql2)){
        $last_id = $conn->insert_id;
        foreach ($orderItems as $item) {
            $name = $conn->real_escape_string($item['name']);
            $quantity = $item['quantity'];
            $price = $item['price'];
            $total = $item['total'];           
            $date = date('Y-m-d');
            $time = date('G:i:s');
            

            if($name == 'Gazeuse'){
                $upgaz = "update stock set quantite = quantite - $quantity, datemodifier = '$date', timemodifier = '$time' where produit = 'Gazeuze'; ";
                $insertHistory = "insert into stockhistory(produit,quantity,time,date) values('$name',$quantity,'$time','$date');";
                $conn->query($upgaz);
                $conn->query($insertHistory);
            }else if($name == 'Eau(1.5L)'){
                $upgaz = "update stock set quantite = quantite - $quantity, datemodifier = '$date', timemodifier = '$time' where produit = '$name'; ";
                $insertHistory = "insert into stockhistory(produit,quantity,time,date) values('$name',$quantity,'$time','$date');";
                $conn->query($upgaz);
                $conn->query($insertHistory);
            }else if($name == 'Eau(1L)'){
                $upgaz = "update stock set quantite = quantite - $quantity, datemodifier = '$date', timemodifier = '$time' where produit = '$name'; ";
                $insertHistory = "insert into stockhistory(produit,quantity,time,date) values('$name',$quantity,'$time','$date');";
                $conn->query($upgaz);
                $conn->query($insertHistory);
            }else if($name == 'Eau(0.5L)'){
                $upgaz = "update stock set quantite = quantite - $quantity, datemodifier = '$date', timemodifier = '$time' where produit = '$name'; ";
                $insertHistory = "insert into stockhistory(produit,quantity,time,date) values('$name',$quantity,'$time','$date');";
                $conn->query($upgaz);
                $conn->query($insertHistory);
            }else if($name == 'Cannette'){
                $upgaz = "update stock set quantite = quantite - $quantity, datemodifier = '$date', timemodifier = '$time' where produit = '$name'; ";
                $insertHistory = "insert into stockhistory(produit,quantity,time,date) values('$name',$quantity,'$time','$date');";
                $conn->query($upgaz);
                $conn->query($insertHistory);
            }else if($name == 'Oh'){
                $upgaz = "update stock set quantite = quantite - $quantity, datemodifier = '$date', timemodifier = '$time' where produit = '$name'; ";
                $insertHistory = "insert into stockhistory(produit,quantity,time,date) values('$name',$quantity,'$time','$date');";
                $conn->query($upgaz);
                $conn->query($insertHistory);
            }else if($name == 'Tropico'){
                $upgaz = "update stock set quantite = quantite - $quantity, datemodifier = '$date', timemodifier = '$time' where produit = '$name'; ";
                $insertHistory = "insert into stockhistory(produit,quantity,time,date) values('$name',$quantity,'$time','$date');";
                $conn->query($upgaz);
                $conn->query($insertHistory);
            }
            
            $sql = "insert into orders (cmd_name,id_cmd,quantity,price,total_prix,date,time) values('$name',$last_id,$quantity,$price,$total,'$date','$time');";
            if ($conn->query($sql)) {   
                             
                $sql222 = "select count(*) as total from orders where id_cmd = $last_id;";
                if($reseul = mysqli_query($conn,$sql222)){
                    $rs = mysqli_fetch_assoc($reseul);
                    $taille = $rs['total'];
                    $sql33 = "update commande set taille = $taille where id=$last_id;";
                    $conn->query($sql33);
                }                
            }
        }
    }    

    echo "success";
} else {
    echo "No order data received.";
}

$conn->close();
?>
