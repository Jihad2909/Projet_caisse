<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recette : Aujourd'hui <?php echo date("l,j F, Y");  ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<!-- JSZip (for Excel export) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<!-- PDFMake (for PDF export) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<!-- Buttons HTML5 Export JS -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<!-- Buttons Print JS -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>


  <style>
    /* Styles personnalisés */
    body{
       background-color: #C0C0C0;
       font-family: 'Courgette', cursive;  
    }
    .sidebar {
      background-color: #f1e4db;
      padding: 20px;
      height: 100vh;
    }
    .sidebar a {
      color: #333;
      font-weight: bold;
      text-decoration: none;
      display: flex;
      align-items: center;
      padding: 10px 0;
    }
    .sidebar a:hover {
      color: #e27d60;
    }
    .content {
     
      padding-left: 30px;
      padding-right: 30px;
    }
    .card {
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="content">
    

    <!-- Contenu principal -->
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
                       
            ?>              
     <div class="container">
     <div class="row">
        <div class="col-md-6">
          <div class="card p-4 bg-light">
            <h5 class="p-3 mb-1 text-center fs-4 fw-bold ">Recette par date</h5>
            <div class="text-center border p-3 mb-3">
            <input type="date" id="date" class="fs-4"><button class="fs-4 fw-bold" onclick="getRecette()">Confirmer</button>
            </div>
            
              <div class="border" id="aff"></div>              
          </div>
        </div>
        <div class="col-md-6">
          <div class="card p-4">
            <h5 class="p-3 mb-3 text-center bg-light"><span class="fw-bold fs-4">Recette</span> : Aujourd'hui <?php echo date("l,j F, Y");  ?></h5>
            <table id="example2" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th class="fs-4 text-primary">Produit</th>
                        <th class="fs-4 text-primary">PRIX GAGNÉ</th>
                        <th class="fs-4 text-primary">TOTAL</th>                                    
                    </tr>
                </thead>  
                <tbody>
                    <?php
                        
                        $date = date('Y-m-d');
                        $req1 = "select DISTINCT cmd_name, sum(quantity) as total,SUM(price*quantity) as prix from orders where date='$date' GROUP BY cmd_name;";
                        
                        $qq =  mysqli_query($con,$req1);                  
                        $somme = 0;
                    ?>              
                    <?php  while($ligne = mysqli_fetch_array($qq)){ 
                          $somme = $somme + $ligne["prix"];
                      ?>
                        <tr>
                            <td class="fw-bold fs-5"><?php echo $ligne["cmd_name"]; ?></td>
                            <td><?php echo $ligne["prix"]; ?> DT</td>
                            <td class="fw-bold fs-5"><?php echo $ligne["total"]; ?></td>                                             
                        </tr>
                    <?php } ?>                                       
                </tbody>
            </table>
            <div class="border p-2 text-center fw-bold fs-2"> Total PRIX : <?php echo $somme ?> DT</div>
          </div>
        </div>
      </div>
     </div>
      

    </div>
</div>
<script>
         $(document).ready(function() {
            $('#example2').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
        });
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
        });




    function getRecette() {
      date = document.getElementById('date').value;
      const xhr = new XMLHttpRequest();

      // Configure it: POST-request for the URL /search.php
      xhr.open("POST", "recettepardate.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      // Handle the response from the PHP page
      xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
              // Update the result div with the response
              document.getElementById("aff").innerHTML = xhr.responseText;
          }
      };

      // Send the request with the search term data
      xhr.send("date=" + encodeURIComponent(date));
    }
</script>

</body>
</html>
