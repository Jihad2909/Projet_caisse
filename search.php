<?php
if (isset($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];

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

    // Escape the search term to prevent SQL injection
    $safeSearchTerm = $mysqli->real_escape_string($searchTerm);

    // Prepare the SQL query with a LIKE operator
    $sql = "SELECT * FROM produit WHERE type LIKE '%$safeSearchTerm%'";
    $result = $mysqli->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        
        // Fetch results and output each as a list item
        while ($row = $result->fetch_assoc()) {
            $name = (string) htmlspecialchars($row['name']);
            if(htmlspecialchars($row['type'])=="cafes"){
                echo '<div class="resultsContainer col-6 col-md-2 product-card border rounded" style="width:50%;height:120px;background-color:#6F4E37   ;" onclick="addToOrder(\'' . htmlspecialchars($row['name']) . '\', ' . htmlspecialchars($row['prix']) . ')">';
                echo '<div class="row d-flex justify-content-between">';
                echo '<div class="col-6"><p style="font-size:21px;" class="border fw-bold text-white ">'.htmlspecialchars($row['name']).'</p><p style="font-size:19px;" class="fw-bold text-white">'.htmlspecialchars($row['prix']).' DT</p></div>';
                echo '<img style="width: 100px;height:100px;" class="rounded col-6" src="'.htmlspecialchars($row['image']).'" alt="crepe">';
                echo '</div>';
                echo '</div>';
            }else
            if(htmlspecialchars($row['type'])=="boisson"){
                echo '<div class="resultsContainer col-6 col-md-2 product-card border rounded" style="width:50%;height:120px;background-color:#FF8C00   ;" onclick="addToOrder(\'' . htmlspecialchars($row['name']) . '\', ' . htmlspecialchars($row['prix']) . ')">';
                echo '<div class="row d-flex justify-content-between">';
                echo '<div class="col-6"><p style="font-size:21px;" class="border fw-bold text-white ">'.htmlspecialchars($row['name']).'</p><p style="font-size:19px;" class="fw-bold text-white">'.htmlspecialchars($row['prix']).' DT</p></div>';
                echo '<img style="width: 100px;height:100px;" class="rounded col-6" src="'.htmlspecialchars($row['image']).'" alt="crepe">';
                echo '</div>';
                echo '</div>';
            }else
            if(htmlspecialchars($row['type'])=="thé"){
                echo '<div class="resultsContainer col-6 col-md-2 product-card border rounded" style="width:50%;height:120px;background-color:#B8860B   ;" onclick="addToOrder(\'' . htmlspecialchars($row['name']) . '\', ' . htmlspecialchars($row['prix']) . ')">';
                echo '<div class="row d-flex justify-content-between">';
                echo '<div class="col-6"><p style="font-size:21px;" class="border fw-bold text-white ">'.htmlspecialchars($row['name']).'</p><p style="font-size:19px;" class="fw-bold text-white">'.htmlspecialchars($row['prix']).' DT</p></div>';
                echo '<img style="width: 100px;height:100px;" class="rounded col-6" src="'.htmlspecialchars($row['image']).'" alt="crepe">';
                echo '</div>';
                echo '</div>';
            }else
            if(htmlspecialchars($row['type'])=="citronnade"){
                echo '<div class="resultsContainer col-6 col-md-2 product-card border rounded" style="width:50%;height:120px;background-color:#FDFF52   ;" onclick="addToOrder(\'' . htmlspecialchars($row['name']) . '\', ' . htmlspecialchars($row['prix']) . ')">';
                echo '<div class="row d-flex justify-content-between">';
                echo '<div class="col-6"><p style="font-size:21px;" class="border fw-bold text-dark ">'.htmlspecialchars($row['name']).'</p><p style="font-size:19px;" class="fw-bold text-dark">'.htmlspecialchars($row['prix']).' DT</p></div>';
                echo '<img style="width: 100px;height:100px;" class="rounded col-6" src="'.htmlspecialchars($row['image']).'" alt="crepe">';
                echo '</div>';
                echo '</div>';
            }else
            if(htmlspecialchars($row['type'])=="jus"){
                echo '<div class="resultsContainer col-6 col-md-2 product-card border rounded" style="width:50%;height:120px;background-color:#B8860B   ;" onclick="addToOrder(\'' . htmlspecialchars($row['name']) . '\', ' . htmlspecialchars($row['prix']) . ')">';
                echo '<div class="row d-flex justify-content-between">';
                echo '<div class="col-6"><p style="font-size:21px;" class="border fw-bold text-white ">'.htmlspecialchars($row['name']).'</p><p style="font-size:19px;" class="fw-bold text-white">'.htmlspecialchars($row['prix']).' DT</p></div>';
                echo '<img style="width: 100px;height:100px;" class="rounded col-6" src="'.htmlspecialchars($row['image']).'" alt="crepe">';
                echo '</div>';
                echo '</div>';
            }else
            if(htmlspecialchars($row['type'])=="cocktail"){
                echo '<div class="resultsContainer col-6 col-md-2 product-card border rounded" style="width:50%;height:120px;background-color:#B8860B   ;" onclick="addToOrder(\'' . htmlspecialchars($row['name']) . '\', ' . htmlspecialchars($row['prix']) . ')">';
                echo '<div class="row d-flex justify-content-between">';
                echo '<div class="col-6"><p style="font-size:21px;" class="border fw-bold text-white ">'.htmlspecialchars($row['name']).'</p><p style="font-size:19px;" class="fw-bold text-white">'.htmlspecialchars($row['prix']).' DT</p></div>';
                echo '<img style="width: 100px;height:100px;" class="rounded col-6" src="'.htmlspecialchars($row['image']).'" alt="crepe">';
                echo '</div>';
                echo '</div>';
            }else
            if(htmlspecialchars($row['type'])=="eau"){
                echo '<div class="resultsContainer col-6 col-md-2 product-card border rounded" style="width:50%;height:120px;background-color:#2389da  ;" onclick="addToOrder(\'' . htmlspecialchars($row['name']) . '\', ' . htmlspecialchars($row['prix']) . ')">';
                echo '<div class="row d-flex justify-content-between">';
                echo '<div class="col-6"><p style="font-size:21px;" class="border fw-bold text-white ">'.htmlspecialchars($row['name']).'</p><p style="font-size:19px;" class="fw-bold text-white">'.htmlspecialchars($row['prix']).' DT</p></div>';
                echo '<img style="width: 100px;height:100px;" class="rounded col-6" src="'.htmlspecialchars($row['image']).'" alt="crepe">';
                echo '</div>';
                echo '</div>';
            }else
            if(htmlspecialchars($row['type'])=="patteserie"){
                echo '<div class="resultsContainer col-6 col-md-2 product-card border rounded" style="width:50%;height:120px;background-color:#c37960   ;" onclick="addToOrder(\'' . htmlspecialchars($row['name']) . '\', ' . htmlspecialchars($row['prix']) . ')">';
                echo '<div class="row d-flex justify-content-between">';
                echo '<div class="col-6"><p style="font-size:21px;" class="border fw-bold text-white ">'.htmlspecialchars($row['name']).'</p><p style="font-size:19px;" class="fw-bold text-white">'.htmlspecialchars($row['prix']).' DT</p></div>';
                echo '<img style="width: 100px;height:100px;" class="rounded col-6" src="'.htmlspecialchars($row['image']).'" alt="crepe">';
                echo '</div>';
                echo '</div>';
            }
            
        }
        
    } else {
        echo "<p>No results found for '" . htmlspecialchars($searchTerm) . "'</p>";
    }

    // Close the database connection
    $mysqli->close();
} else {
    echo "<p>No search term provided.</p>";
}
?>
