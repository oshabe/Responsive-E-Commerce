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
        .square-image-upload {
            position: relative;
            width: 120px; /* Define the desired width for the square */
            height: 120px; /* Set the same height as the width for a square shape */
            overflow: hidden;
            border: 2px solid #ccc; /* Add a 2px wide, rounded border for the square box */
            border-radius: 10px; /* Apply a 10px border radius for rounded corners */
            text-align: center;
            position: relative;
        }

        .square-image-upload input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
            z-index: 2;
        }
        #uploadedImage {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image takes up the entire space while maintaining its aspect ratio */
            font-size: 0; /* Hide any potential text */
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
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Products</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('intel') }}">Categories</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">
                                Settings
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <button class="btn btn-danger btn-sm align-item-ceter" style="width: 100%;">{{ __('Logout') }}</button>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="margin-top:70px;min-height:40vh;" class="mb-5">
        <div class="container">
            <div class="card rounded shadow p-3 mb-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <span class="fs-4"><b>{{$oneCategory->name}}</b></span></br>
                        <span class="text-muted fs-7"><b>({{$allProduct->where('category', $oneCategory->id)->count()}}) All Products</b></span>
                    </div>
                    <div class="mt-3">
                        <span class="border border-dashed editCategoryButton me-2 border-hover-primary" style="cursor:pointer;" data-bs-toggle="tooltip" title="Edit this Category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </span>
                        <span class="border border-dashed me-2 border-hover-primary" id="addProductBtn"  style="cursor:pointer;" data-bs-toggle="tooltip" title="Add a Product">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="green" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                            </svg>
                        </span>
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
                            <div class="d-flex">
                                <h6 class="card-title me-4">{{ $allProducts->product_name }}</h6>
                                <span class="delteIconProduct" data-id="{{$allProducts->id}}" style="cursor:pointer;" data-bs-toggle="tooltip" title="Delete Product">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>


    <footer class="py-5 bg-dark">
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


    <!-- start delete category -->
        <div id="delete_ProductModal" class="modal fade" tabindex="-1" aria-labelledby="delete_CategoryModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">A you sure you want to delete this Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form enctype="multipart/form-data">
                        @csrf
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" id="deleteYesButton">Yes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- end delete category -->

    <!-- start edit Category modal -->
        <div id="editCategory" class="modal fade" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Edit this Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editFormCategory" action="{{ route('edit.category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="p-2">
                                <input type="hidden" class="form-control" id="editCategoryId" name="editCategoryId" value="{{$oneCategory->id}}">
                                <div class="row mb-4">
                                    <label for="productName" class="col-sm-3 col-form-label">Product Name:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="productEditName" name="productEditName" value="{{$oneCategory->name}}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="productDescription" class="col-sm-3 col-form-label">Description:</label>
                                    <div class="col-sm-9">
                                    <textarea class="form-control" id="productEditDescription" name="productEditDescription" rows="3" required>{{$oneCategory->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- end edit Category modal -->

    <!-- begin create Product modal -->
        <div id="addProductModal" class="modal fade" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
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
                                    <div class="row mb-3 text-center">
                                        <p>Upload Photo</p>
                                        <div class="d-flex justify-content-center mb-2">
                                            <div class="square-image-upload">
                                                <input type="file" name="productImage" id="productImage" accept=".png, .jpg, .jpeg">
                                                <img id="uploadedImage" src="#" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="productName" class="col-sm-3 col-form-label">Product Name:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="productName" name="productName">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="productDescription" class="col-sm-3 col-form-label">Description:</label>
                                        <div class="col-sm-9">
                                        <textarea class="form-control" id="productDescription" name="productDescription" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mb-2">
                                        <button type="button" class="btn btn-primary" id="next_display" >Next</button>
                                    </div>
                                </div>

                                <div class="d-none" id="key_features">
                                    <input type="hidden" class="form-control" id="category" name="category" value="{{$oneCategory->id}}">
                                    <div class="row mb-4">
                                        <label for="productPrice" class="col-sm-3 col-form-label">Price:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="productPrice" name="productPrice">
                                        </div>
                                    </div>
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
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="sizeAll" name="size[]" value="All">
                                                <label class="form-check-label" for="sizeAll">All</label>
                                            </div>
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
    <!-- End create product modal -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

            //start delete category
                $(".delteIconProduct").click(function() {
                    ///alert('yaa');

                    var ProductDeleteIcon = $(this).data('id');
                    $("#delete_ProductModal").modal('show');

                    // Send an AJAX request to delete the category
                    $("#deleteYesButton").click(function() {
                        $.ajax({
                            url: '/delete-product',
                            data: {
                                _token: '{{ csrf_token() }}',
                                ProductDeleteIcon: ProductDeleteIcon
                            },
                            type: 'DELETE',
                            success: function(response) {
                                // Update the UI or reload the page as needed
                                //alert('Category deleted successfully!');
                                location.reload(); // Reload the page to reflect changes
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                alert('An error occurred while deleting the category.');
                            }
                        });
                    });
                });
            //end delete category

            //edit product

                $(".editCategoryButton").click(function() {
                    $("#editCategory").modal('show');
                });

                $('#editFormCategory').on('submit', function(e) {
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
            //edit product

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
