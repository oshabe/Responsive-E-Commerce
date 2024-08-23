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
                    <li class="nav-item" style="background-color: #f0f0f0;">
                        <a class="nav-link active" aria-current="page" href="#"><u>Home</u></a>
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

    <main style="margin-top: 70px;min-height: 40vh;" class="mb-5">
        <div class="container">
            <div class="card rounded shadow p-3 mb-3">
                <div class="d-flex mb-2 justify-content-between">
                    <div>
                        <p class="card-text text-muted fs-5"><b>({{$allCategory->count()}}) All Categories</b></p>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-primary fs-7" id="addProductBtn" data-bs-toggle="tooltip" title="Add a New Category">+ Category</button>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($allCategory as $allCategories)
                    <div class="col-6 col-md-3 col-lg-2 mb-3">
                        <div class="card mb-3 h-50">
                            <a href="/Admin/Category/{{$allCategories->id}}">
                                <img src="{{ asset('images/' . $allCategories->image) }}" class="card-img-top" alt="Image 1" style="height: 170px; width: 100%;">
                            </a>
                            <div class="">
                                <h6 class="card-title">{{ $allCategories->name }}</h6>
                                <p class="card-text text-muted fs-7">
                                    {{ $allCategories->description }}
                                    <span class="delteIconCategory" style="cursor:pointer;" data-bs-toggle="tooltip" data-id="{{$allCategories->id}}" title="Delete Category">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                        </svg>
                                    </span>
                                </p>
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
            <div id="delete_CategoryModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">A you sure you want to delete this category</h5>
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
        <!-- Add Category -->
            <div id="addProductModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
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
                                        <label class="col-sm-3 col-form-label">Product Image:</label>
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
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- End Add Category -->

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
    <script>
        $(document).ready(function() {

            //start delete category
                $(".delteIconCategory").click(function() {

                    var categoryId = $(this).data('id');
                    $("#delete_CategoryModal").modal('show');

                    // Send an AJAX request to delete the category
                    $("#deleteYesButton").click(function() {
                        $.ajax({
                            url: '/delete-category',
                            data: {
                                _token: '{{ csrf_token() }}',
                                categoryId: categoryId
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
        });
    </script>
</body>
</html>
