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
                    <li class="nav-item" style="background-color: #f0f0f0;">
                        <a class="nav-link active" href="#"><u>Categories</u></a>
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
            <div class="d-flex mb-2 justify-content-between">
                <div>
                    <p class="card-text text-muted fs-6"><b>({{$allCategory->count()}}) All Categories</b></p>
                </div>
                <div>
                    <p class=" text-muted fs-6"><b>Zuck Categories</b></p>
                </div>
            </div>
            <div class="row">
                @foreach ($allCategory as $allCategories)
                    <div class="col-6 col-md-3 col-lg-2 mb-3">
                        <div class="card mb-3 h-50">
                            <a href="/Category/{{$allCategories->id}}">
                                <img src="{{ asset('images/' . $allCategories->image) }}" class="card-img-top" alt="Image 1" style="height: 170px; width: 100%;">
                            </a>
                            <div class="">
                                <h6 class="card-title">{{ $allCategories->name }}</h6>
                                <p class="card-text text-muted fs-8">{{ $allCategories->description }}</p>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

            //Category
            //End Category
        });
    </script>
</body>
</html>
