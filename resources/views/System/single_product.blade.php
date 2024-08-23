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
<body class="">

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
                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/home">Home</a>
                    </li>
                    @endif
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
                    @if (Auth::check())
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
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main style="margin-top: 70px;" class="mb-5">
        <div class="container">
            <div>
                <form class="d-flex mb-2" id="searchForm">
                    <input class="form-control me-2" id="searchInput" type="search" placeholder="Search" aria-label="Search">
                    <span id="cart-icon" class="me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708"/>
                        </svg>
                    </span>
                    <span class="showCountCart"><b>{{$allCartCountProduct->count()}}</b></span>
                </form>
                <div id="searchResults"></div>
            </div>
            <div id="clickedProducts">
                <div class=" rounded shadow row mt-3"> 
                    <div class="col-6 col-md-3 col-lg-2">
                        <img src="{{ asset('images/' . $oneProduct->image) }}" class="img-fluid rounded" alt="Product Image" style="height: 180px; width: 100%;">
                    </div>
                    <div class="col-6 col-md-3 col-lg-3">
                        <h5 class="text-center mb-3">{{$oneProduct->product_name}}</h5>
                        
                        <table class="table table-striped mb-3">
                            <tbody>
                                <tr>
                                    @if (!empty($productPrice->current_price))
                                        <td><strong><span class="text-muted">UgShs:</span>{{ $productPrice->current_price }}</strong></td>
                                    @else
                                        <td><strong>UgShs:000.0</strong></td>
                                    @endif
                                    @if (!empty($productPrice->expired_price))
                                        <td class="text-danger"><s>{{ $productPrice->expired_price }}</s></td>
                                    @else
                                        <td class="text-danger"><s>000.0</s></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            </span>
                            <span class="me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                </svg>
                            </span>
                            @if (Auth::check())
                                <span class="editProductIcon" style="cursor:pointer;" data-bs-toggle="tooltip" title="Edit Product">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </span>
                            @endif
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-outline-info btn-add-to-cart" data-product-id="{{$oneProduct->id}}" style="width: 100%;">Add to Cart</button>
                        </div>
                    </div>
                    <div class="bg-light col-12 col-md-12 col-lg-7">
                        <div class="col-md-12 p-1">
                            <p class="p-2">
                                <strong class="fs-5 me-2">Description :</strong>{{$oneProduct->description}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row rounded shadow mt-3">
                    <div class="col-md-12 p-2">
                        <h3 class="text-center d-none">Specifications</h3>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td><strong>Size:</strong></td>
                                    <td>
                                        @foreach($variationProduct as $variationProducts)
                                            {{$variationProducts->size}}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Material:</strong></td>
                                    <td>{{$oneProduct->material}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Gender:</strong></td>
                                    <td>{{$oneProduct->gender}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Color:</strong></td>
                                    <td>{{$oneProduct->color}}</td>
                                </tr>
                                <tr>
                                    <td><strong>SKU:</strong></td>
                                    <td>FA298MW138E2QNAFAMZ</td>
                                </tr>
                                <tr>
                                    <td><strong>Sleeve Type:</strong></td>
                                    <td>{{$oneProduct->sleeve_type}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Production Country:</strong></td>
                                    <td>{{$oneProduct->production_country}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Style:</strong></td>
                                    <td>{{$oneProduct->style}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Weight (kg):</strong></td>
                                    <td>{{$oneProduct->weight}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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

    <!-- begin edit Product modal -->
        <div id="editProductModal" class="modal fade" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editProductForm" action="{{ route('products.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="p-2">
                                <div id="first_display">
                                    <div class="row mb-4">
                                        <label for="productName" class="col-sm-3 col-form-label">Product Name:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="productEditName" value="{{$oneProduct->product_name}}" name="productEditName">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="productDescription" class="col-sm-3 col-form-label">Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="productEditDescription" name="productEditDescription" rows="3">{{ $oneProduct->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="productPrice" class="col-sm-3 col-form-label">Price:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ !empty($productPrice->current_price) ? $productPrice->current_price : '000' }}" id="producteditPrice" name="producteditPrice">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mb-2">
                                        <button type="button" class="btn btn-primary" id="next_display" >Next</button>
                                    </div>
                                </div>
                                <div class="d-none" id="key_features">
                                    <input type="hidden" class="form-control" id="productId" name="productId" value="{{$oneProduct->id}}">
                                    <input type="hidden" class="form-control" id="categoryId" name="productId" value="{{$oneProduct->id}}">
                                    <div class="row mb-4">
                                        <label for="editStyle" class="col-sm-3 col-form-label">Style:</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="editstyle" name="editstyle">
                                                <option value="">Select Style</option>
                                                <option value="cotton" {{ $oneProduct->style == 'cotton' ? 'selected' : '' }}>Cotton</option>
                                                <option value="linen" {{ $oneProduct->style == 'linen' ? 'selected' : '' }}>Linen</option>
                                                <option value="wool" {{ $oneProduct->style == 'wool' ? 'selected' : '' }}>Wool</option>
                                                <option value="silk" {{ $oneProduct->style == 'silk' ? 'selected' : '' }}>Silk</option>
                                                <option value="denim" {{ $oneProduct->style == 'denim' ? 'selected' : '' }}>Denim</option>
                                                <option value="athletic" {{ $oneProduct->style == 'athletic' ? 'selected' : '' }}>Athletic</option>
                                                <option value="casual" {{ $oneProduct->style == 'casual' ? 'selected' : '' }}>Casual</option>
                                                <option value="formal" {{ $oneProduct->style == 'formal' ? 'selected' : '' }}>Formal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="productName" class="col-sm-3 col-form-label">Material:</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="materialeditSelect" name="materialeditSelect" aria-label="Clothes material selection">
                                                <option value="">Select Material</option>
                                                <option value="cotton" {{ $oneProduct->material == 'cotton' ? 'selected' : '' }}>Cotton</option>
                                                <option value="wool" {{ $oneProduct->material == 'wool' ? 'selected' : '' }}>Wool</option>
                                                <option value="linen" {{ $oneProduct->material == 'linen' ? 'selected' : '' }}>Linen</option>
                                                <option value="silk" {{ $oneProduct->material == 'silk' ? 'selected' : '' }}>Silk</option>
                                                <option value="polyester" {{ $oneProduct->material == 'polyester' ? 'selected' : '' }}>Polyester</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="productName" class="col-sm-3 col-form-label">Color:</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="editcolor" name="editcolor">
                                                <option value="">Select Color</option>
                                                <option value="red" {{ $oneProduct->color == 'red' ? 'selected' : '' }}>Red</option>
                                                <option value="green" {{ $oneProduct->color == 'green' ? 'selected' : '' }}>Green</option>
                                                <option value="blue" {{ $oneProduct->color == 'blue' ? 'selected' : '' }}>Blue</option>
                                                <option value="yellow" {{ $oneProduct->color == 'yellow' ? 'selected' : '' }}>Yellow</option>
                                                <option value="black" {{ $oneProduct->color == 'black' ? 'selected' : '' }}>Black</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="productName" class="col-sm-3 col-form-label">Sleeve Type:</label>
                                        <div class="col-sm-9">
                                        <select class="form-select" id="sleeveedtType" name="sleeveeditType">
                                            <option value="">Select Sleeve Type</option>
                                            <option value="short" {{ $oneProduct->sleeve_type == 'short' ? 'selected' : '' }}>Short</option>
                                            <option value="long" {{ $oneProduct->sleeve_type == 'long' ? 'selected' : '' }}>Long</option>
                                            <option value="sleeveless" {{ $oneProduct->sleeve_type == 'sleeveless' ? 'selected' : '' }}>Sleeveless</option>
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
                                        <label for="editGender" class="col-sm-3 col-form-label">Gender:</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="editgender" name="editgender">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{ $oneProduct->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ $oneProduct->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="All" {{ $oneProduct->gender == 'All' ? 'selected' : '' }}>All</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="editCountry" class="col-sm-3 col-form-label">Production Country:</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="productioneditCountry" name="productioneditCountry">
                                                <option value="">Select a Country</option>
                                                <option value="china" {{ $oneProduct->production_country == 'china' ? 'selected' : '' }}>China</option>
                                                <option value="india" {{ $oneProduct->production_country == 'india' ? 'selected' : '' }}>India</option>
                                                <option value="bangladesh" {{ $oneProduct->production_country == 'bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                                <option value="vietnam" {{ $oneProduct->production_country == 'vietnam' ? 'selected' : '' }}>Vietnam</option>
                                                <option value="italy" {{ $oneProduct->production_country == 'italy' ? 'selected' : '' }}>Italy</option>
                                                <option value="other" {{ $oneProduct->production_country == 'other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="weight" class="col-sm-3 col-form-label">Weight :</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="editweight" name="editweight">
                                                <option value="">Select Weight</option>
                                                <option value="0.1" {{ $oneProduct->weight == '0.1' ? 'selected' : '' }}>0.1</option>
                                                <option value="0.15" {{ $oneProduct->weight == '0.15' ? 'selected' : '' }}>0.15</option>
                                                <option value="0.19" {{ $oneProduct->weight == '0.19' ? 'selected' : '' }}>0.19</option>
                                                <option value="0.2" {{ $oneProduct->weight == '0.2' ? 'selected' : '' }}>0.2</option>
                                                <option value="0.25" {{ $oneProduct->weight == '0.25' ? 'selected' : '' }}>0.25</option>
                                                <option value="0.29" {{ $oneProduct->weight == '0.29' ? 'selected' : '' }}>0.29</option>
                                                <option value="0.3" {{ $oneProduct->weight == '0.3' ? 'selected' : '' }}>0.3</option>
                                                <option value="0.35" {{ $oneProduct->weight == '0.35' ? 'selected' : '' }}>0.35</option>
                                                <option value="0.39" {{ $oneProduct->weight == '0.39' ? 'selected' : '' }}>0.39</option>
                                                <option value="0.4" {{ $oneProduct->weight == '0.4' ? 'selected' : '' }}>0.4</option>
                                            </select>
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
    <!-- end edit Product modal -->

    <!-- start all cart products -->
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
    <!-- end all cart products -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

            //edit product

                $(".editProductIcon").click(function() {
                    $("#editProductModal").modal('show');
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

                $('#editProductForm').on('submit', function(e) {
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
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            console.error(xhr.responseText);
                        }
                    });
                });

            //end edit product

            $('#searchInput').on('input', function() {
                var query = $(this).val();

                // Check if the search input is empty
                if (query.trim() === "") {
                    // If empty, show data of the current page
                    $("#clickedProducts").removeClass("d-none");
                    $('#searchResults').html(''); // Clear the search results
                    return;
                }

                // If not empty, make the AJAX call for search
                $.ajax({
                    url: '/search',
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(response) {
                        if (response.message) {
                            $('#searchResults').html('<p class="text-danger">' + response.message + '</p>');
                            $("#clickedProducts").removeClass("d-none");
                        } else {
                            $('#searchResults').html(response);
                            $("#clickedProducts").addClass("d-none");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
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

        });
    </script>
</body>
</html>

