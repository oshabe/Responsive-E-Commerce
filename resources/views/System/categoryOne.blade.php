<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zuck Online Retailer </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }
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
                    @guest <!-- Check if the user is a guest (not logged in) -->
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline nav-link">Log in</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline nav-link">Register</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main style="margin-top: 70px;min-height: 40vh;" class="mb-5">
        <div class="container">
            <div class="card rounded shadow p-3 mb-3">
                <div class="d-flex mb-2 justify-content-between">
                    <div>
                        <p class="card-text text-muted fs-6"><b>({{$allProduct->where('category', $oneCategory->id)->count()}}) All Products</b></p>
                    </div>
                    <div>
                        <p class=" text-muted fs-6"><b>Zuck Categories</b></p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($allProduct->where('category', $oneCategory->id) as $allProducts)
                    <div class="col-6 col-md-3 col-lg-2 mb-3">
                        <div class="card mb-3 h-50">
                            <a href="/Product/{{$allProducts->id}}">
                                <img src="{{ asset('images/' . $allProducts->image) }}" class="card-img-top" alt="Image 1" style="height: 170px; width: 100%;">
                            </a>
                            <div class="">
                                <h6 class="card-title">{{ $allProducts->product_name }}</h6>
                                <p class="card-text text-muted fs-7 d-none">{{ $allProducts->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                <form id="addProductForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="p-2">
                            <div id="first_display">
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
                                <div class="row mb-2">
                                    <label for="productDescription" class="col-sm-3 col-form-label">Description:</label>
                                    <div class="col-sm-9">
                                    <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-2">
                                    <button type="button" class="btn btn-primary" id="next_display" >Next</button>
                                </div>
                            </div>
                            <div class="d-none" id="key_features">
                                <input type="hidden" class="form-control" id="category" name="category" value="{{$oneCategory->id}}">
                                <div class="row mb-4">
                                    <label for="productName" class="col-sm-3 col-form-label">Style:</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="style" name="style">
                                            <option value="">Select Style</option>
                                            <option value="cotton">Cotton</option>
                                            <option value="linen">Linen</option>
                                            <option value="wool">Wool</option>
                                            <option value="silk">Silk</option>
                                            <option value="denim">Denim</option>
                                            <option value="athletic">Athletic</option>
                                            <option value="casual">Casual</option>
                                            <option value="formal">Formal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="productName" class="col-sm-3 col-form-label">Material:</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="materialSelect" name="materialSelect" aria-label="Clothes material selection">
                                            <option value="">Select Material</option>
                                            <option value="cotton">Cotton</option>
                                            <option value="wool">Wool</option>
                                            <option value="linen">Linen</option>
                                            <option value="silk">Silk</option>
                                            <option value="polyester">Polyester</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="productName" class="col-sm-3 col-form-label">Color:</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="color" name="color">
                                            <option value="">Select Color</option>
                                            <option value="red">Red</option>
                                            <option value="green">Green</option>
                                            <option value="blue">Blue</option>
                                            <option value="yellow">Yellow</option>
                                            <option value="black">Black</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="productName" class="col-sm-3 col-form-label">Sleeve Type:</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="sleeveType" name="sleeveType">
                                            <option value="">Select Sleeve Type</option>
                                            <option value="short">Short</option>
                                            <option value="long">Long</option>
                                            <option value="sleeveless">Sleeveless</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <button type="button" class="btn btn-primary" id="keyF_back">Back</button>
                                    <button type="button" class="btn btn-primary" id="keyF_next">Next</button>
                                </div>
                            </div>
                            <div class="d-none" id="all_specifications">
                                <div class="row mb-4">
                                    <label for="productName" class="col-sm-3 col-form-label">Gender:</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="gender" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="productName" class="col-sm-3 col-form-label">Production Country:</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="productionCountry" name="productionCountry">
                                            <option value="">Select a Country</option>
                                            <option value="china">China</option>
                                            <option value="india">India</option>
                                            <option value="bangladesh">Bangladesh</option>
                                            <option value="vietnam">Vietnam</option>
                                            <option value="italy">Italy</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="weight" class="col-sm-3 col-form-label">Weight :</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="weight" name="weight">
                                            <option value="">Select Weight</option>
                                            <option value="0.1">0.1</option>
                                            <option value="0.15">0.15</option>
                                            <option value="0.19">0.19</option>
                                            <option value="0.2">0.2</option>
                                            <option value="0.25">0.25</option>
                                            <option value="0.29">0.29</option>
                                            <option value="0.3">0.3</option>
                                            <option value="0.35">0.35</option>
                                            <option value="0.39">0.39</option>
                                            <option value="0.4">0.4</option>
                                            <option value="0.14">0.14</option>
                                            <option value="0.14">0.14</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="size" class="col-sm-3 col-form-label">Available Sizes:</label>
                                    <div class="col-sm-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="sizeS" name="size[]" value="S">
                                            <label class="form-check-label" for="sizeS">S</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="sizeM" name="size[]" value="M">
                                            <label class="form-check-label" for="sizeM">M</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="sizeL" name="size[]" value="L">
                                            <label class="form-check-label" for="sizeL">L</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="sizeXL" name="size[]" value="XL">
                                            <label class="form-check-label" for="sizeXL">XL</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="sizeXXL" name="size[]" value="XXL">
                                            <label class="form-check-label" for="sizeXXL">XXL</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="sizeXXXL" name="size[]" value="XXXL">
                                            <label class="form-check-label" for="sizeXXXL">XXXL</label>
                                        </div>
                                        <?php for ($i = 30; $i <= 40; $i++) : ?>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="size<?php echo $i; ?>" name="size[]" value="<?php echo $i; ?>">
                                            <label class="form-check-label" for="size<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </label>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-primary" id="specificatn_back">Back</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
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

            //Product
                $("#addProductBtn").click(function() {
                    $("#addProductModal").modal('show');
                });

                //show other data

                    $('#next_display').click(function() {						
						$('#first_display').addClass('d-none');
						$('#key_features').removeClass('d-none');
					});

                    $('#keyF_back').click(function() {						
						$('#first_display').removeClass('d-none');
						$('#key_features').addClass('d-none');
					});
                    $('#keyF_back').click(function() {						
						$('#first_display').removeClass('d-none');
						$('#key_features').addClass('d-none');
					});
                    $('#keyF_next').click(function() {						
						$('#all_specifications').removeClass('d-none');
						$('#key_features').addClass('d-none');
					});
                    $('#specificatn_back').click(function() {						
						$('#all_specifications').addClass('d-none');
						$('#key_features').removeClass('d-none');
					});
                //end show other data

                $('#addProductForm').on('submit', function(e) {
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
            //End Product
        });
    </script>
</body>
</html>
