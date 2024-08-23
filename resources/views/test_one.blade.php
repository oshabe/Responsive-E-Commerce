<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Add custom styles here */
    /* For example: */
    body {
      font-family: Arial, sans-serif;
    }
    .container-fluid {
      padding: 20px;
    }
    .card {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Sales</h5>
            <!-- Add sales content here -->
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Orders</h5>
            <!-- Add orders content here -->
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Products</h5>
            <!-- Add products content here -->
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Customers</h5>
            <!-- Add customers content here -->
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Analytics</h5>
            <!-- Add analytics content here -->
          </div>
        </div>
      </div>
    </div>
  </div>



  <footer class="bg-dark text-light py-3">
        <div class="container">
            <div class="row">
            <div class="col-md-3">
                <h5>About Us</h5>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="col-md-3">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                <li>
                    <a href="#" class="text-light">
                    <i class="fas fa-home me-2"></i> Address
                    </a>
                </li>
                <li>
                    <a href="#" class="text-light">
                    <i class="fas fa-phone me-2"></i> +1 (234) 567-8901
                    </a>
                </li>
                <li>
                    <a href="#" class="text-light">
                    <i class="fas fa-envelope me-2"></i> info@example.com
                    </a>
                </li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Social Media</h5>
                <ul class="list-unstyled d-flex">
                <li class="me-3">
                    <a href="#" class="text-light">
                    <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="me-3">
                    <a href="#" class="text-light">
                    <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="me-3">
                    <a href="#" class="text-light">
                    <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-light">
                    <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Payment Methods</h5>
                <img src="path/to/payment-icons.png" alt="Payment methods accepted" class="img-fluid">
            </div>
            </div>
        </div>
    </footer>
    

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    .product-details {
      padding: 20px;
    }
    .product-image img {
      width: 100%;
      height: auto;
      max-height: 400px;
    }
    .product-description {
      margin-top: 20px;
    }
    .key-features {
      list-style: none;
      padding: 0;
    }
    .key-features li {
      margin-bottom: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row product-details">
      <div class="col-md-6 product-image">
        <img src="{{ asset('images/' . $oneProduct->image) }}" alt="Product Image">
      </div>
      <div class="col-md-6">
        <h2>Khaki Men's Long Pants</h2>
        <p class="text-muted">&#36;49.99</p>
        <hr>
        <ul class="key-features">
          <li>Comfortable</li>
          <li>Business</li>
          <li>Very Cool</li>
          <li>Durable</li>
        </ul>
        <p class="product-description">
          This product is designed to suit the very desire of having most of our everyday motivations in a simple, handy, convenient, comfortable and easy to handle wear. It's capable of bringing out a lot of vibe infact, all-in-one. It does well under any climatic condition and can be taken to any occasion serving the very purpose for which it is needed. Its smart design and quality makes it top-notch, bringing it to a realm of trend and class that is going to be up there for the long run. The design is to suit the very desire of having most of our rudimentary everyday on-the-go items in a simple, handy, convenient, comfortable and easy to handle outfit.
        </p>
        <hr>
        <h4>Specifications</h4>
        <table class="table table-striped">
          <tbody>
            <tr>
              <td>Material</td>
              <td>Spandex+Cotton</td>
            </tr>
            <tr>
              <td>Gender</td>
              <td>Men</td>
            </tr>
            <tr>
              <td>Smart Fit</td>
              <td>&#x2713;</td> </tr>
            <tr>
              <td>Easy Care</td>
              <td>&#x2713;</td> </tr>
            <tr>
              <td>Color</td>
              <td>Khaki</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jY3zHTnA3zVQoHtlzsiuGEgQpBXqOgv" crossorigin="anonymous"></script>
</body>
</html>
