<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stock</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">  
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
 

  
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
        <?php
           $con = mysqli_connect("127.0.0.1","jihad","jihad@2001");
           mysqli_select_db($con,"cafe");                      
        ?>
    

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

      <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card p-4 bg-light">
            <h5 class="p-3 mb-1 text-center fs-4 fw-bold ">Remplir le Stock</h5>                       
              <div class="border">

              <table class="table text-center">
                <thead>
                    <tr>
                        <th class="fs-4 text-danger">Produit</th>
                        <th class="fs-4 text-danger">Quantité</th>
                        <th class="fs-4 text-danger">Action</th>                                    
                    </tr>
                </thead>  
                <tbody>            
                        <tr>
                            <td class="fw-bold fs-5">Cafés  :</td>
                            <td><input style="width:100px;" type="number" value="0" id="cafes" class="form-control"></td>
                            <td class="fw-bold fs-5"><button onclick="miseajour('Cafes')" class="btn btn-primary">Modifier</button></td>                                             
                        </tr>
                        <tr>
                            <td class="fw-bold fs-5">Lait  :</td>
                            <td><input style="width:100px;" type="number" value="0" id="lait" class="form-control"></td>
                            <td class="fw-bold fs-5"><button onclick="miseajour('Lait')" class="btn btn-primary">Modifier</button></td>                                             
                        </tr>
                        <tr>
                            <td class="fw-bold fs-5">Farine  :</td>
                            <td><input style="width:100px;" type="number" value="0" id="farine" class="form-control"></td>
                            <td class="fw-bold fs-5"><button onclick="miseajour('Farine')" class="btn btn-primary">Modifier</button></td>                                             
                        </tr>
                        <tr>
                            <td class="fw-bold fs-5">Gazeuze  :</td>
                            <td><input style="width:100px;" type="number" value="0" min='0' id="gazeuze" class="form-control"></td>
                            <td class="fw-bold fs-5"><button onclick="miseajour('Gazeuze')" class="btn btn-primary">Modifier</button></td>                                             
                        </tr>
                        <tr>
                            <td class="fw-bold fs-5">Eau(1.5L) :</td>
                            <td><input style="width:100px;" type="number" value="0" min='0' id="eau(1.5L)" class="form-control"></td>
                            <td class="fw-bold fs-5"><button onclick="miseajour('Eau(1.5L)')" class="btn btn-primary">Modifier</button></td>                                             
                        </tr>
                        <tr>
                            <td class="fw-bold fs-5">Eau(1L)  :</td>
                            <td><input style="width:100px;" type="number" value="0" min='0'  id="eau(1L)" class="form-control"></td>
                            <td class="fw-bold fs-5"><button onclick="miseajour('Eau(1L)')" class="btn btn-primary">Modifier</button></td>                                             
                        </tr>
                        <tr>
                            <td class="fw-bold fs-5">Eau(0.5L)  :</td>
                            <td><input style="width:100px;" type="number" value="0" min='0' id="eau(0.5L)" class="form-control"></td>
                            <td class="fw-bold fs-5"><button onclick="miseajour('Eau(0.5L)')" class="btn btn-primary">Modifier</button></td>                                             
                        </tr>
                        <tr>
                            <td class="fw-bold fs-5">Oh  :</td>
                            <td><input style="width:100px;" type="number" value="0" min='0'  id="Oh" class="form-control"></td>
                            <td class="fw-bold fs-5"><button onclick="miseajour('Oh')" class="btn btn-primary">Modifier</button></td>                                             
                        </tr>
                        <tr>
                            <td class="fw-bold fs-5">Tropico  :</td>
                            <td><input style="width:100px;" type="number" value="0" min='0'  id="Tropico" class="form-control"></td>
                            <td class="fw-bold fs-5"><button onclick="miseajour('Tropico')" class="btn btn-primary">Modifier</button></td>                                             
                        </tr>
                        <tr>
                            <td class="fw-bold fs-5">Cannette  :</td>
                            <td><input style="width:100px;" type="number" value="0" min='0'  id="Cannette" class="form-control"></td>
                            <td class="fw-bold fs-5"><button onclick="miseajour('Cannette')" class="btn btn-primary">Modifier</button></td>                                             
                        </tr>
                                                          
                </tbody>
            </table>

              </div>              
          </div>
        </div>
        <div class="col-md-6">
          <div class="card p-4">
            <h5 class="p-3 mb-3 text-center"><span class="fw-bold fs-4">Stock Disponible</h5>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th class="fs-4 text-primary">Produit</th>
                        <th class="fs-4 text-primary">Quantité</th>
                        <th class="fs-4 text-primary">Date/Heure Modifié</th>                                    
                    </tr>
                </thead>  
                <tbody>
                    <?php                       
                        $req1 = "select * from stock;";                        
                        $qq =  mysqli_query($con,$req1);  
                        while($ligne = mysqli_fetch_array($qq)){                      
                    ?>                     
                        <tr>
                            <td class="fs-5"><?php echo $ligne["produit"]; ?></td>
                            <?php if($ligne["quantite"]<10) { ?>
                              <td class="fw-bold fs-4 bg-danger"><?php echo $ligne["quantite"]; ?></td>
                            <?php }else{?>
                              <td class="fw-bold fs-4"><?php echo $ligne["quantite"]; ?></td>
                            <?php } ?>
                            <td class="fs-5"><?php echo $ligne["datemodifier"];echo"/"; echo $ligne["timemodifier"]; ?></td>                                             
                        </tr>
                    <?php } ?>                                       
                </tbody>
            </table>
            
          </div>
        </div>
      </div>
      <div class="mt-3">
          <div class="card p-4 bg-light">
            <h5 class="p-3 mb-1 text-center fs-4 fw-bold ">Stock Par date</h5>
            <div class="text-center border p-3 mb-3">
            <input type="date" id="date" class="fs-4"><button class="fs-4 fw-bold" onclick="getStock()">Confirmer</button>
            </div>
            
              <div class="border" id="aff"></div>              
          </div>
        </div>
      </div>
      
    </div>
</div>
<script>

 
 function getStock() {
      date = document.getElementById('date').value;
      const xhr = new XMLHttpRequest();

      // Configure it: POST-request for the URL /search.php
      xhr.open("POST", "stockpardate.php", true);
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

    function miseajour(produit) {
      let value = 0;
      if(produit == "Cafes"){
         value = document.getElementById('cafes').value;
      }else if(produit == "Lait"){
         value = document.getElementById('lait').value;
      }else if(produit == "Farine"){
         value = document.getElementById('farine').value;
      }else if(produit == "Gazeuze"){
         value = document.getElementById('gazeuze').value;
      }else if(produit == "Eau(1.5L)"){
         value = document.getElementById('eau(1.5L)').value;
      }else if(produit == "Eau(1L)"){
         value = document.getElementById('eau(1L)').value;
      }else if(produit == "Eau(0.5L)"){
         value = document.getElementById('eau(0.5L)').value;
      }else if(produit == "Oh"){
         value = document.getElementById('Oh').value;
      }else if(produit == "Tropico"){
         value = document.getElementById('Tropico').value;
      }else if(produit == "Cannette"){
         value = document.getElementById('Cannette').value;
      }
   
      const xhr = new XMLHttpRequest();

      // Configure it: POST-request for the URL /search.php
      xhr.open("POST", "updateStock.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      // Handle the response from the PHP page
      xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
              
              alert("Mise a jour avec succés");
              window.location.reload();
          }
      };

      const params = 
        "produit=" + encodeURIComponent(produit) + 
        "&value=" + encodeURIComponent(value);         

      xhr.send(params);
    }
</script>

</body>
</html>
