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
    $sql = "select * from stockhistory where date='$date';";
    $result = $mysqli->query($sql);

    
    if ($result->num_rows > 0) {

        echo '
            <table id="exampleee" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th class="fs-4 text-primary">Produit</th>
                        <th class="fs-4 text-primary">Quantitié</th>
                        <th class="fs-4 text-primary">Heure</th> 
                        <th class="fs-4 text-primary">Date</th>                                    
                    </tr>
                </thead>  
                <tbody>
        ';
        
        while ($row = $result->fetch_assoc()) {
            
            echo'
                
                        <tr>
                            <td class="fw-bold fs-5">'.htmlspecialchars($row['produit']).'</td>
                            <td class="fw-bold fs-5">'.htmlspecialchars($row['quantity']).'</td>
                            <td class="fw-bold fs-5">'.htmlspecialchars($row['time']).'</td>
                            <td class="fw-bold fs-5">'.htmlspecialchars($row['date']).'</td>                                             
                        </tr>           
                                                                   
                
            ';                  
        }
        echo '
            </tbody>
              </table>              
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
