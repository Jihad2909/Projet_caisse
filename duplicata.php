<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Duplicata</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Buttons CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    
    <style>
        body{
       background-color: #C0C0C0;
       font-family: 'Courgette', cursive;  
     }
        @media print {
            body * {
              
                margin: 0 !important; 
                padding: 0 !important;
                visibility: hidden;
            }
            .conteneur-liste, .conteneur-liste * {
                visibility: visible;
            }
            .conteneur-liste {
                position: absolute; 
                top: 0px;
                left: 0px;                               
                width : 100%;
                height : 100%;
            }
          }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg p-3" style="background-color:#A9A9A9;">
    <div class="container-fluid">
      <!-- Logo on the left -->
      <a class="navbar-brand" href="#"><img src="Images/logo.jpg" style="width: 100px;height:100px" class="rounded-pill"></a>
      
      <!-- Center-aligned buttons -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarButtons">
      <a href="recette.php" class="btn btn-dark me-2 fs-4 fw-bold" type="button">Recette</a>
      <a href="duplicata.php" class="btn btn-dark me-2 fs-4 fw-bold" type="button">Duplicata</a>
        <a href="caisse.php" class="btn btn-dark me-2 fs-4 fw-bold" type="button">Caisse</a>
        <a href="stock.php" class="btn btn-dark me-2 fs-4 fw-bold" type="button">Stock</a>
      </div>
      
      <!-- Logout button on the right -->
      <div class="d-flex ms-auto">
        <button class="btn btn-outline-light" type="button">Logout</button>
      </div>
    </div>
</nav>
  <?php
    $con = mysqli_connect("127.0.0.1","jihad","jihad@2001");
    mysqli_select_db($con,"cafe");

    $req = "select * from commande";
    $res = mysqli_query($con,$req);   
    ?>

  <div class="container">
    <div class="row">
        <div class="col-6 bg-light" >
            <h2 class="p-3 mb-3 text-center">Tickets </h2>
            <table id="example" class="display table border text-center" style="width:100%">
                <thead>
                    <tr>
                    
                        <th class="fs-4 text-success">NUM TICKETS</th> 
                        <th class="fs-4 text-success">Action</th>                       
                    </tr>
                </thead>
                <tbody>
                    <?php while($ligne = mysqli_fetch_array($res)){ ?>
                        <tr>
                            <td class="fw-bold fs-5"><?php echo $ligne["id"]; ?></td>  
                            <td class="fw-bold fs-5"><button class="btn btn-dark" onclick="affiche(<?php echo $ligne['id']; ?>)">Afficher</button></td>                
                        </tr>
                    <?php } ?>   
                </tbody>
            </table>
        </div>
                        
        <div class="col-6 border bg-light">
            <div id="ticket"></div>   
        </div>     
    </div>
  </div>

  <script>
    function affiche(str){
        // Create a new XMLHttpRequest object
        const xhr = new XMLHttpRequest();

        // Configure it: POST-request for the URL /search.php
        xhr.open("POST", "getTicket.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Handle the response from the PHP page
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Update the result div with the response
                document.getElementById("ticket").innerHTML = xhr.responseText;
            }
        };

        // Send the request with the search term data
        xhr.send("idcmd=" + encodeURIComponent(str));
    }




        $(document).ready(function() {
            $('#example').DataTable();
        });
    


        function imprimer() {
            window.print();                
        }
    </script>
</body>
</html>


</body>
</html>