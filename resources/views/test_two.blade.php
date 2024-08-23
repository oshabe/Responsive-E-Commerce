<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-12 pt-5 side-nav bg-dark text-white">
                <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <span class="fs-4">E-commerce</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page">
                            <i class="fa-solid fa-chart-line"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-box"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-users"></i> Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-cart-shopping"></i> Orders
                        </a>
                    </li>
                </ul>
            </div>

            <main class="col-md-10 col-sm-8 col-12 pt-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="h2">Dashboard</h1>
                    <a href="#" class="btn btn-primary">Reports</a>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-header">
                                <h5 class="card-title">Total Revenue</h5>
                            </div>
                            <div class="card-body">
                                <h1 class="card-text">$10,000</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card text-white bg-warning">
                            <div class="card-header">
                                <h5 class="card-title">New Orders</h5>
                            </div>
                            <div class="card-body">
                                <h1 class="card-text">25</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card text-white bg-success">
                            <div class="card-header">
                                <h5 class="card-title">Active Users</h5>
                            </div>
                            <div class="card-body">
                                <h1 class="card-text">100</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
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
            <div class="col-6 col-md-3 col-lg-2">
                <img src="{{ asset('images/' . $oneProduct->image) }}" class="img-fluid rounded" alt="Product Image" style="height: 250px; width: 100%;">
            </div>
            <div class="col-6 col-md-3 col-lg-10">
                <h2>Khaki Smart Fit Pants</h2>
                <div class="d-flex mt-3">
                    <span class="text-muted me-1"><strong>$49.99 -</strong></span>
                    <span class="text-muted"><strong>$29.99</strong></span>
                </div>
                <div class="mt-3">
                    <button type="button" class="btn btn-primary">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h3>Description</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et odio dignissim, blandit ante non, tincidunt ipsum. Maecenas ultrices, justo eget vehicula molestie, tellus libero tincidunt est, at lobortis est magna quis diam. Pellentesque auctor neque nec urna neque viverra vehicula. Integer posuere erat a ante venenatis dapibus posuere vel velit. Aliquam egestas fringilla pharetra. Maecenas sed diam eget turpis varius tempor.
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h3>Specifications</h3>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td><strong>Material:</strong></td>
                            <td>Spandex+Cotton</td>
                        </tr>
                        <tr>
                            <td><strong>Gender:</strong></td>
                            <td>Men</td>
                        </tr>
                        <tr>
                            <td><strong>Color:</strong></td>
                            <td>Khaki</td>
                        </tr>
                        <tr>
                            <td><strong>SKU:</strong></td>
                            <td>FA298MW138E2QNAFAMZ</td>
                        </tr>
                        <tr>
                            <td><strong>Product Line:</strong></td>
                            <td>berrykey-SEA-COD</td>
                        </tr>
                        <tr>
                            <td><strong>Production Country:</strong></td>
                            <td>China</td>
                        </tr>
                        <tr>
                            <td><strong>Weight (kg):</strong></td>
                            <td>0.3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

