<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <style>
    .card-img-top {
      width: 100%;          /* Ensures the image takes full width */
      height: 300px;        /* Sets a fixed height for all images */
      object-fit: cover;    /* Ensures images fill the container without distortion */
      border-radius: 8px;   /* Adds rounded borders */
      border: 2px solid #ddd; /* Border color and thickness */
    }
  </style>

</head>
<body class="bg-light">


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <!-- Logo on the left -->
      <a class="navbar-brand" href="#">My Café</a>
      
      <!-- Center-aligned buttons -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarButtons">
        <button class="btn btn-primary me-2" type="button">Home</button>
        <button class="btn btn-success me-2" type="button">Stock</button>
        <a href="caisse.php" class="btn btn-warning me-2" type="button">Cashier</a>
      </div>
      
      <!-- Logout button on the right -->
      <div class="d-flex ms-auto">
        <button class="btn btn-outline-light" type="button">Logout</button>
      </div>
    </div>
  </nav>

   <!-- Section with 3 Cards -->
   <section class="container my-3">
    <div class="row">
      
      <!-- Card 1 -->
      <div class="col-md-3">
        <div class="card">
          <img src="Images/cafee.jpg" class="card-img-top" alt="Card Image 1">
          <div class="card-body text-center">
            <h5 class="card-title">Café en Stock </h5>
            <p class="card-text display-4 fw-bold">150 <span class="fw-bold display-6">kg</span> </p>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-3">
        <div class="card">
          <img src="Images/bouteille.avif" class="card-img-top" alt="Card Image 2">
          <div class="card-body text-center">
            <h5 class="card-title">Eau en packet</h5>
            <p class="card-text display-4 fw-bold">320</p>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-3">
        <div class="card">
          <img src="Images/lait.png" class="card-img-top" alt="Card Image 3">
          <div class="card-body text-center">
            <h5 class="card-title">Lait en packet</h5>
            <p class="card-text display-4 fw-bold">8</p>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-md-3">
        <div class="card">
          <img src="Images/sucre.jpeg" class="card-img-top" alt="Card Image 2">
          <div class="card-body text-center">
            <h5 class="card-title">Sucre</h5>
            <p class="card-text display-4 fw-bold">320</p>
          </div>
        </div>
      </div>

    </div>

    <!-- Stock History Table -->
    <h2 class="mt-5 text-center">Stock History</h2>
    <div class="table-responsive">
      <table class="table table-striped table-bordered mt-3">
        <thead class="table-dark text-center">
          <tr>
            <th>Type de stock</th>
            <th>Quantité</th>
            <th>Prix depensé</th>
            <th>Date et heure</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>2024-10-01</td>
            <td>Coffee Beans</td>
            <td>50 kg</td>
            <td>Added</td>
          </tr>
          <tr>
            <td>2024-10-15</td>
            <td>Sugar</td>
            <td>20 kg</td>
            <td>Used</td>
          </tr>
          <tr>
            <td>2024-10-20</td>
            <td>Milk</td>
            <td>30 L</td>
            <td>Added</td>
          </tr>
          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>
  </section>

  

</body>
</html>