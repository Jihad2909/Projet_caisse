<?php
echo"hellloo";

$con = mysqli_connect("127.0.0.1","jihad","jihad@2001");
mysqli_select_db($con,"cafe");


$req ="insert into orders (cmd_name,quantity,price,total_prix,date,time) values('cafe',5,12.2,2.2,'2001/10/12','10:25');";

$result = mysqli_query($con,$req);
if($result){
    echo"ajout avec succes";
}else{
    echo"non";
}

?>

<?php
 $con = mysqli_connect("127.0.0.1","jihad","jihad@2001");
 mysqli_select_db($con,"cafe");

 $req = "select * from commande";
 $res = mysqli_query($con,$req);

 while($ligne = mysqli_fetch_array($res)>0){}

 $row = $result->fetch_assoc()
?>