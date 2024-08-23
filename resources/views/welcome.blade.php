<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zuck Online Retailer </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="path/to/fontawesome-solid.min.css">
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
                        <a class="nav-link active" href="#"><u>Products</u></a>
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
            <div>
                <form class="d-flex mb-2" id="searchForm">
                    <input class="form-control me-2" id="searchInput" type="search" placeholder="Search" aria-label="Search">
                    <span id="cart-icon" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708"/>
                        </svg>
                    </span>
                    <span class="showCountCart"><b>{{$allCartCountProduct->count()}}</b></span>
                </form>
                <div id="searchResults"></div>
            </div>
            <div class="row" id="allProducts">
                @foreach ($allProduct as $allProducts)
                    <div class="col-6 col-md-3 col-lg-2 mb-3">
                        <div class="card mb-3 h-50">
                            <a href="/Product/{{$allProducts->id}}">
                                <img src="{{ asset('images/' . $allProducts->image) }}" class="card-img-top" alt="Image 1" style="height: 170px; width: 100%;">
                            </a>
                            <div class="">
                                <h6 class="card-title">{{ $allProducts->product_name }}</h6>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-sm btn-outline-info btn-add-to-cart" data-product-id="{{$allProducts->id}}" style="width: 100%;">Add to Cart</button>
                                </div>
                                <div class="d-flex">
                                    @foreach($productPrice as $productPrices)
                                        @if($productPrices->product === $allProducts->id) 
                                            @if (!empty($productPrices->current_price))
                                                <span class="card-text me-2 ">UgShs:{{ $productPrices->current_price }}</span>
                                            @else
                                                <span class="card-text me-2 ">UgShs:500 -</span>
                                            @endif
                                            @if (!empty($productPrices->expired_price))
                                                <span class="card-text text-danger"><s>{{ $productPrices->expired_price }}</s></span>
                                            @else
                                                <span class="card-text text-danger"><s>1000</s></span>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <div class="d-flex">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                        </svg>
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                        </svg>
                                    </span>
                                </div>
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
        <p class="text-center text-muted">© 1996-{{ date('Y') }}, {{ config('app.name', 'Laravel') }}</p>
    </div>
    </footer>


    <div id="showAllCartProduct" class="modal fade" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel"><span class="numRecords"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-2">
                        <div >  
                            <div class="row" id="cart-product-container">
                                
                            </div>
                            <h4 class="text-center">Contact Us</h4>
                            <table class="table table-striped mb-3">
                                <tbody>
                                    <tr>
                                        <td><strong><span class="text-muted">Telephone Number</span></strong></td>
                                        <td><strong>(+256) 745345647</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong><span class="text-muted">Gmail Address</span></strong></td>
                                        <td><strong>derrick@gmail.com</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        let cartCount = 0;
         $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var query = $(this).val();

                $.ajax({
                    url: '/search',
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(response) {
                        if (response.message) {
                            $('#searchResults').html('<p class="text-danger">' + response.message + '</p>');
                            $("#allProducts").addClass("d-none");
                        } else {
                            $('#searchResults').html(response);
                            $("#allProducts").addClass("d-none");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

             // Handle click event on "Add to Cart" button
            $('.btn-add-to-cart').click(function() {
                 // Get the product ID
                var productId = $(this).data('product-id');

                // Make AJAX request to add the product to cart
                $.ajax({
                    type: 'POST',
                    url: '/add-to-cart',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId
                    },
                    success: function(response) {
                        // Handle success response
                        console.log('Product added to cart successfully.');
                        var countP = 0;
                        $.each(response.product, function(index, product) {
                            countP++;
                        });
                        $(".showCountCart").text(`${countP}`);


                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error('Error adding product to cart:', error);
                    }
                });
            });

            //show those in cart
            $("#cart-icon").click(function() {

                $.ajax({
                    type: 'get',
                    url: '/show/allCart',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {

                        // Clear any existing cart products (optional)
                        $("#cart-product-container").empty();  // Replace with your container ID
                        var countP = 0;
                        // Process the response (assuming 'response' is an array of products)
                        $.each(response.product, function(index, product) {
                            countP++;
                            // Create a card element for each product
                            var cardHtml = `                          
                                <div class="col-6 col-md-3 col-lg-3 mb-3">
                                    <div class="card mb-3 h-50">
                                        <img src="${product.image}" class="card-img-top" alt="Image 1" style="height: 170px; width: 100%;">
                                        <div class="">
                                            <h6 class="card-title">${product.name}</h6>
                                        </div>
                                    </div>
                                </div>
                            `;
                            // Append the card to the container element
                            $("#cart-product-container").append(cardHtml);  // Replace with your container ID
                        });
                        $(".numRecords").text(`(${countP}) All Cart Products`);
                        // Show the cart modal
                        $("#showAllCartProduct").modal('show');
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error('Error adding product to cart:', error);
                    }
                });
            });

        });
    </script>
</body>
</html>
