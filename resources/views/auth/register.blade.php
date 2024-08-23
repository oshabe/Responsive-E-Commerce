




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zuck Online Retailer </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .nav-link:hover {
            text-decoration: underline;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <div>
                <button class="btn btn-dark rounded-pill me-2">Zuck</button>
                <a class="navbar-brand" href="#"><b>Online Shop</b></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Category">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline nav-link">Log in</a>
                    </li>
                    <li class="nav-item" style="background-color: #f0f0f0;">
                        <a href="#" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline nav-link active"><u>Register</u></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="margin-top: 70px;min-height: 40vh;" class="mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <footer class="py-5 bg-dark" style="">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3 mb-3">
                    <h2 class="mb-3 text-light">Made Easy</h2>
                    <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Distribution Made Easy</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">eero WiFi Smart Security</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">邻居 (Linju) App</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Zuck Subscription Boxes</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">PILPack</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-3 mb-3">
                    <h2 class="mb-3 text-light">Everything</h2>
                    <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Books, Art & Collectibles</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Movies, Music & Games</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Sports, Outdoors & Fitness</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Toys & Baby</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Clothing, Shoes & Jewelry</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-3 mb-3">
                    <h2 class="mb-3 text-light">Services</h2>
                    <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">AWS</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Zuck Prime Video</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Zuck Music</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Kindle Direct Publishing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Zuck Studios</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-3 mb-3">
                    <h2 class="mb-3 text-light">About Us</h2>
                    <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">About Zuck</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Careers</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Investor Relations</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Zuck Sustainability</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-muted">Press Releases</a></li>
                    </ul>
                </div>
            </div>

            <hr class="mb-4 border-0 bg-white">

            <p class="text-center text-muted">© 1996-2024, Zuck.com, Inc. or its affiliates</p>
        </div>
    </footer>

    <div id="addProductModal" class="modal fade" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addCategoryForm" action="{{ route('add.category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="p-2">
                            <div class="row mb-3">
                                <label for="productImage" class="col-sm-3 col-form-label">Product Image:</label>
                                <div class="col-sm-9">
                                <input type="file" class="form-control" id="productImage" name="productImage" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="productName" class="col-sm-3 col-form-label">Product Name:</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="productName" name="productName" required>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="productDescription" class="col-sm-3 col-form-label">Description:</label>
                                <div class="col-sm-9">
                                <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

            //Category
                $("#addProductBtn").click(function() {
                    $("#addProductModal").modal('show');
                });

                $('#addCategoryForm').on('submit', function(e) {
                    e.preventDefault(); // Prevent the form from submitting normally

                    // Get form data
                    var formData = new FormData(this);

                    // Send Ajax request
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: formData,
                        processData: false, // Prevent jQuery from automatically transforming the data into a query string
                        contentType: false, // Prevent jQuery from setting the content type
                        success: function(response) {
                            // Handle the success response here
                            console.log(response);
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            console.error(xhr.responseText);
                        }
                    });
                });
            //End Category
        });
    </script>
</body>
</html>

