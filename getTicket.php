<?php
date_default_timezone_set("Africa/Tunis");
if (isset($_POST['idcmd'])) {
    $searchTerm = $_POST['idcmd'];

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
    $sql = "SELECT * FROM orders WHERE id_cmd = $safeSearchTerm";
    $result = $mysqli->query($sql);
    $totalpp = 0;
    $billetr = 0.0;
    $renduu = 0.0;
    $date = "";
    $time = "";
    // Check if there are results
    if ($result->num_rows > 0) {
            echo'
                <div class="mt-3 border rounded p-3" style="background-color: #FFEFD5;">
                    <div class="conteneur-liste">
                    <p class="text-center"><img src="Images/logo.jpg" style="width: 100px;height:100px" class="rounded-pill"></p>
                    <h3 class="text-center mb-3 fw-bold">Duplicata</h3>
                    <h4 class="text-center ">Ticket N° <span class="fw-bold fs-5">';echo $searchTerm; echo'</span></h4>
                    <div class="mb-3">
                    <span style="font-size: 14px;" class="fw-bold  d-flex justify-content-between">MF/ 4564646646: </span>
                    <span style="font-size: 14px;" class="fw-bold d-flex justify-content-between">Adresse: Av.H Bourguiba Ajim </span>
                    <div class="fw-bold text-center border">Bienvenu Chez Nous</div>
                    </div>       
                    <div class="fw-bold d-flex justify-content-between  ">
                        <p>Designation</p>
                        <p>Qte</p>
                        <p>Montant</p>
                    </div>
                    <ul class="list-group order-summary mb-3 " id="order-list">
                ';
                    while ($row = $result->fetch_assoc()) {
                        $totalpp = $totalpp + htmlspecialchars($row['total_prix']);
                        $billetr = htmlspecialchars($row['billet']);
                        $renduu = htmlspecialchars($row['rendu']);
                        $date = htmlspecialchars($row['date']);
                        $time = htmlspecialchars($row['time']);
                        echo'
                        <li class="list-group-item">
                          <table style="width:100%;"><tr><td style="width:33%" >'.htmlspecialchars($row['cmd_name']).'</td> <td style="width:33%" class="text-center">'.htmlspecialchars($row['quantity']).'</td> <td style="width:33%" class="text-end">'.htmlspecialchars($row['total_prix']).' DT</td></tr></table>
                        </li>                       
                            ';
                    }
                    echo'
                    </ul>
                        <!-- Totals -->         
                        <div class="d-flex justify-content-between fw-bold">
                        <span>Total:</span><span id="total">'.$totalpp.' DT</span>
                        </div>
                        <div class="d-flex justify-content-between fw-bold">
                        <span>Piéce donnée:</span><span id="billet">'.$billetr.' DT</span>
                        </div>  
                        <div class="d-flex justify-content-between fw-bold">
                        <span>Rendu :</span><span id="rendu">'.$renduu.' DT</span>
                        </div>       
                        <div class="text-center"><button class="btn btn-white btn-full fw-bold fs-4 " id="cash-button"> Total : '.$totalpp.' DT</button></div>                   
                        <div>Le : '.$date.'</div>
                        <div>A  : '.$time.'</div>
                        <div class="fw-bold text-center border mb-3 mt-3">Merci, Au revoir</div>
                        
                        </div>
                <button class="btn btn-danger btn-full fw-bold fs-4" onclick="imprimer()"> Imprimer Duplicata</button>
                ';                
                      
        }
        
    } else {
        echo "<p>No results found for '" . htmlspecialchars($searchTerm) . "'</p>";
    }
?>
