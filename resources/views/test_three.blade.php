<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">E-Commerce Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Customers</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-2 col-sm-4 col-12 pt-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item active">Dashboard</li>
                    <li class="list-group-item">Products</li>
                    <li class="list-group-item">Orders</li>
                    <li class="list-group-item">Customers</li>
                    <li class="list-group-item">Settings</li>
                </ul>
            </div>

            <div class="col-md-10 col-sm-8 col-12 pt-3">
                <h3>Overview</h3>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Sales</h5>
                                <h2 class="card-text">$10,000</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">New Orders</h5>
                                <h2 class="card-text">50</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/' . $oneProduct->image) }}" class="img-fluid" alt="Product Image">
            </div>
            <div class="col-md-6">
                <h2>Khaki Smart Fit Pants</h2>
                <p class="text-muted">SKU: FA298MW138E2QNAFAMZ</p>
                <hr>
                <h5>Key Features:</h5>
                <ul>
                    <li>Comfortable</li>
                    <li>Business</li>
                    <li>Very Cool</li>
                    <li>Durable</li>
                </ul>
                <h5>Description:</h5>
                <p>
                    The concept is designed to suit the very desire of having most of our everyday motivations in a simple, handy, convenient, comfortable and easy to handle wear. It's capable of bringing out a lot of vibe infact, all-in-one. It does well under any climatic condition and can be taken to any occasion serving the very purpose for which it is needed. Its smart design and quality makes it top-notch, bringing it to a realm of trend and class that is going to be up there for the long run. 
                </p>
                <h5>Specifications:</h5>
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
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Easy Care</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>Khaki</td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td>0.3 kg</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
