<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POS System</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">  
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
  <?php  date_default_timezone_set("Africa/Tunis"); ?>
  <style>
    .product-card { cursor: pointer; padding: 10px; text-align: center; }
    .product-card img { width: 70px; height: 70px; object-fit: cover; }
    .order-summary { max-height: 100%; overflow-y: auto;}
    .btn-full { width: 100%; margin-top: 10px; }
   
    body{
       background-color: #C0C0C0;
       font-family: 'Courgette', cursive;  
    }
    .sticky-div {
            max-height: 600px;
            background-color: green;
            position: sticky;
            top: 0px;
            padding: 10px 0px;
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

  <script>
    let orderItems = [];
    let rendu = 0.0;
    let billet = 0.0;
    
    function saveOrder() {
    if(orderItems.length===0){
      alert("Non commande trouvée!!")
    }else{    
      idnumCmd = document.getElementById('num').value;  
      const orderData = JSON.stringify(orderItems);
      console.log(orderData);
    fetch('save_order.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ order: orderData })
    })
    .then(response => response.text())
    .then(data => {
      if (data.includes("success")) {
        
        alert("Ajouter avec successs");
        updateRendu(rendu,billet,idnumCmd);
        clearOrder();
        window.location.reload();
      } else {
        alert("Failed to save the order. Please try again.");
      }
    });
    }    
  }

    function updateRendu(rendu,billet,id){
      const xhr = new XMLHttpRequest();

    // Configure it: POST-request for the URL /search.php
    xhr.open("POST", "updateRendu.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Handle the response from the PHP page
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            alert("mise a jour avec succes");
        }
    };
    const params = 
        "rendu=" + encodeURIComponent(rendu) + 
        "&billet=" + encodeURIComponent(billet) + 
        "&id=" + encodeURIComponent(id);
    // Send the request with the search term data
    xhr.send(params);
    }

    function say(str) {

    // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();

    // Configure it: POST-request for the URL /search.php
    xhr.open("POST", "search.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Handle the response from the PHP page
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Update the result div with the response
            document.getElementById("resultsContainer").innerHTML = xhr.responseText;
        }
    };

    // Send the request with the search term data
    xhr.send("searchTerm=" + encodeURIComponent(str));
 }
  </script>
</head>


<body onload="say('cafe')" class="">
<?php
 $con = mysqli_connect("127.0.0.1","jihad","jihad@2001");
 mysqli_select_db($con,"cafe");

 $req = "select id from commande order by id DESC limit 1;";
 $res = mysqli_query($con,$req);
 $row = $res->fetch_assoc();
 $numticket = $row['id']+1; 
?>


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

<div class="container my-3 principal bg-trasparent">
  <div class="row">
    <!-- Left Side: Order Summary -->
    <div class="col-5 border rounded p-3" style="background-color: #FFEFD5;">
        <div class="conteneur-liste">
        <p class="text-center"><img src="Images/logo.jpg" style="width: 100px;height:100px" class="rounded-pill"></p>
        <div class="mb-3">
          <input id="num" type="hidden" value="<?php echo $numticket; ?>">
        <div style="width:100%; font-size: 17px;" class="fw-bold text-center ">Ticket N° <span class="fw-bold fs-5"><?php echo $numticket; ?></span></div>
          <span style="font-size: 14px;" class="fw-bold  d-flex justify-content-between">MF/ 4564646646: </span>
          <span style="font-size: 14px;" class="fw-bold d-flex justify-content-between">Adresse: Av.H Bourguiba Ajim </span>
          <div style="width:100%; font-size: 14px;" class="fw-bold text-center border">Bienvenu Chez Nous</div>
        </div>       
        <div class="fw-bold d-flex justify-content-between  ">
            <p>Designation</p>
            <p>Qte</p>
            <p>Montant</p>
        </div>
        <ul class="list-group order-summary mb-3 " id="order-list"></ul>
        <!-- Totals -->         
        <div class="d-flex justify-content-between fw-bold">
          <span>Total:</span><span id="total">0.00 DT</span>
        </div>
        <div class="d-flex justify-content-between fw-bold">
          <span>Piéce donnée:</span><span id="billet">0.000 DT</span>
        </div>  
        <div class="d-flex justify-content-between fw-bold">
          <span>Rendu :</span><span id="rendu">0.000 DT</span>
        </div>       
        <button class="btn btn-white btn-full fw-bold fs-4" id="cash-button"> 0.00 DT</button>
        <div>Le  : <?php echo date("Y-m-d");  ?></div>
        <div>A  : <?php echo date("G:i:s");  ?></div>
        <div style="width:100%; font-size: 14px;" class="fw-bold text-center border mt-3">Merci au revoirs</div>
      </div>
      <!-- Action Buttons -->
         
      <div class="d-flex mt-2">        
        <button class="btn btn-danger flex-fill me-1 fw-bold fs-5" onclick="clearOrder()">Annuler</button>
        <button id="rendubtn" class="btn flex-fill ms-1 fw-bold fs-5 text-white" style="background-color:#B8860B;"  onclick="calRendu()">Rendu</button>        
      </div>
      <button id="printBtn" class="btn fw-bold fs-5 bg-success text-white mt-1 w-100" onclick="imprimer()">Imprimer Ticket</button>
      <div id="btnc"></div>      
    </div>
    <div class="col-1"> 

    </div>
    <!-- Right Side: Product Selection -->
    <div class="col-6 pt-2 mr-4 sticky-div"style="background-color: #FFEFD5;border: 4mm ridge rgba(211, 220, 50, .6);">
      <h5 class="fw-bold text-center fs-2 text-dark p-2" style="background-color: #FFEFD5;">Nos Produits</h5> 
      <div class="p-3 mb-2">
        <button onclick="say('cafes')">Cafés</button>
        <button onclick="say('thé')">Thé</button>
        <button onclick="say('eau')">Eau</button> 
        <button onclick="say('boisson')">Boisson</button>
        <button onclick="say('citronnade')">Citronnade</button>
        <button onclick="say('jus')">Jus</button>
        <button onclick="say('cocktail')">Cocktail</button>
        <button onclick="say('patteserie')">Patteserie</button>              
      </div>
      <div id="resultsContainer" class="row p-3">
      
      </div>
    </div>
  </div>  
</div>


<script>
        stickyElem = document.querySelector(".sticky-div");

        /* Gets the amount of height
        of the element from the
        viewport and adds the
        pageYOffset to get the height
        relative to the page */
        currStickyPos = stickyElem.getBoundingClientRect().top
            + window.pageYOffset;
        window.onscroll = function () {

            /* Check if the current Y offset
            is greater than the position of
            the element */
            if (window.pageYOffset > currStickyPos) {
                stickyElem.style.position = "fixed";
                stickyElem.style.top = "0px";
                stickyElem.style.right = "0px";
            } else {
                stickyElem.style.position = "relative";
                stickyElem.style.top = "initial";
            }
        }
  </script>

  <script>
    
  
function calRendu(){
  if(orderItems.length ===0){
    alert("Vous Devez Ajouté un Produit");
  }else{
  let userInput = prompt("Donner une billet:");
  let number = parseFloat(userInput);
  let total = 0;
  orderItems.forEach(item => {
    total += item.total;
  });
  
  if (!isNaN(number)) {
    rendu = number-total;
    billet = number;
    document.getElementById('billet').textContent = `${billet} DT`;
    document.getElementById('rendu').textContent = `${(rendu).toFixed(3)} DT`;   
  } else {
      alert("No input provided.");
  }
  }
  
} 
 


function addToOrder(itemName, price) {
  
  let item = orderItems.find(i => i.name === itemName);
  if (item) {
    item.quantity += 1;
    item.total = item.quantity * price;
  } else {
    orderItems.push({ name: itemName.toString(), price: price, quantity: 1, total: price });
  }    
  updateOrderSummary();
  
}

function updateOrderSummary() {
  const orderList = document.getElementById('order-list');
  orderList.innerHTML = '';
  let subtotal = 0;

  orderItems.forEach(item => {
    subtotal += item.total;
    const listItem = document.createElement('li');
    listItem.className = 'list-group-item ';
    listItem.innerHTML = `<table style="width:100%;"><tr><td style="width:33%" >${item.name.toString()}</td> <td style="width:33%" class="text-center">${item.quantity}</td> <td style="width:33%" class="text-end">${item.total.toFixed(2)} DT</td></tr></table>`;
    orderList.appendChild(listItem);
  });

  const tax = 0 //subtotal * 0.1; pour avoir de tax
  const total = subtotal + tax;

  
  document.getElementById('total').textContent = `${total.toFixed(3)} DT`;
  document.getElementById('cash-button').textContent = `Total : ${total.toFixed(3)} DT`;    
 
}

function clearOrder() {
  orderItems = [];
  document.getElementById('billet').textContent = `0.000 DT`;
  document.getElementById('rendu').textContent = `0.000 DT`;
  updateOrderSummary();
  window.location.reload();
}


function imprimer() {
  rendubtn = document.getElementById('rendu').textContent;
  if(orderItems.length ===0 || rendubtn == `0.000 DT`){
    alert("Vous devez ajouté un (Produit et Piéce Donnée) Avant d'imprimer.");
  }else{
    window.print();
    
    if(rendubtn  != `0.000 DT`){
      const newButton = document.createElement("button");
                  newButton.className = "btn bg-warning w-100 border fw-bold fs-5 mt-1"
                  newButton.innerHTML = "Enregistrer";

                  // Ajoutez un événement au nouveau bouton
                  newButton.addEventListener("click", () => {
                      saveOrder();
                  });
                      // Ajoutez le nouveau bouton dans le conteneur
                  document.getElementById("btnc").appendChild(newButton);
    }else{
      alert("Vous devez entrer Rendu !");
    }
    
  }
}

  </script>


</body>
</html>
