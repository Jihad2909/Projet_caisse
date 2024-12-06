<?php
if (isset($_POST['date'])) {
    $date = $_POST['date'];

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

    // Prepare the SQL query with a LIKE operator
    $sql = "select DISTINCT cmd_name, sum(quantity) as total,SUM(price*quantity) as prix from orders where date='$date' GROUP BY cmd_name;";
    $result = $mysqli->query($sql);

    $sommme = 0;
    if ($result->num_rows > 0) {

        echo '
            <table id="example" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th class="fs-4 text-primary">Produit</th>
                        <th class="fs-4 text-primary">PRIX GAGNÉ</th>
                        <th class="fs-4 text-primary">TOTAL</th>                                    
                    </tr>
                </thead>  
                <tbody>
        ';
        
        while ($row = $result->fetch_assoc()) {
            $sommme = $sommme + $row["prix"];
            echo'
                
                        <tr>
                            <td class="fw-bold fs-5">'.htmlspecialchars($row['cmd_name']).'</td>
                            <td>'.htmlspecialchars($row['prix']).' DT</td>
                            <td class="fw-bold fs-5">'.htmlspecialchars($row['total']).'</td>                                             
                        </tr>           
                                                                   
                
            ';                  
        }
        echo '
            </tbody>
              </table>
              <div class="border p-2 text-center fw-bold fs-2"> Total PRIX : '.$sommme.' DT</div>
        ';

        
    } else {
        echo "<p>No results found for '" . htmlspecialchars($searchTerm) . "'</p>";
    }

    // Close the database connection
    $mysqli->close();
} else {
    echo "<p>No search term provided.</p>";
}
?>
