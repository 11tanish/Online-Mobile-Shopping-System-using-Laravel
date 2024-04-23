<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #222; /* Light gray background */
            color: #fff;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        /* Header Styles */
        header {
            background-color: #343a40; /* Dark background color */
            color: #fff; /* White text color */
            padding: 10px 0;
            display: flex;
            justify-content: space-between; /* Align items to the sides */
            align-items: center; /* Center items vertically */
        }
        .navbar-brand h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .navbar-nav li {
            padding: 0 10px;
        }
        .navbar-nav li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .navbar-nav li a:hover {
            color: #ffc107; /* Yellow on hover */
        }
        .info {
            margin: 0;
            font-size: 18px;
        }
        .popup {
            position: relative;
            display: inline-block;
        }
        .popuptext {
            visibility: hidden;
            width: 160px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
        }
        .popup:hover .popuptext {
            visibility: visible;
        }
        /* Services Styles */
        /* Services Styles */
.services {
    padding: 20px;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.products-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.service-item {
    width: calc(100% - 20px); /* Adjust the width as needed */
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.service-item img {
    max-width: 100%;
    height: auto;
    display: block;
}

.down-content {
    padding: 20px;
}

.down-content h4 {
    margin-top: 10px;
    font-size: 20px;
}

.down-content p {
    margin-top: 10px;
}

input[type="number"] {
    width: 100%;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

.btn-buy,
.btn-add-to-cart {
    display: inline-block;
    margin-top: 10px;
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-buy:hover,
.btn-add-to-cart:hover {
    background-color: #218838;
}

        .btn-add-to-cart img {
            width: 30px; /* Adjust the width of the cart image */
            height: auto;
            vertical-align: middle; /* Align the image vertically */
            margin-right: 5px; /* Add some space between the image and text */
        }
    </style>
    <script>
        var csrfToken = '{{ csrf_token() }}';
        function buyProduct(productId, quantity) {
            var quantity = $('#quantity_' + productId).val();
            // Send an AJAX request
            $.ajax({
                url: '{{ route('buyProduct') }}',
                type: 'POST',
                data: {
                    _token: csrfToken, // Include CSRF token for Laravel
                    proid: productId,
                    quantity: quantity
                },
                success: function(response) {
                    if (response.success) {
                        alert('Order placed successfully. Order ID: ' + response.order_id);
                        // Redirect or do something else on success
                    } else {
                        alert('Failed to place order: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Failed to place order: ' + error);
                }
            });
        }

        //addtocart
        
        function addToCart(productId, quantity) {
            var quantity = $('#quantity_' + productId).val();
            console.log("Product ID: " + productId); // Debugging statement
            console.log("Quantity: " + quantity);
            // Send an AJAX request
            $.ajax({
                url: '{{ route('addToCart') }}',
                type: 'POST',
                data: {
                    _token: csrfToken, // Include CSRF token for Laravel
                    proid: productId,
                    quantity: quantity
                },
                success: function(response) {
                    if (response.success) {
                        alert('Product added to cart successfully.');
                        // Redirect or update UI as needed
                        window.location.href = '{{ route("checkout") }}?productId=' + productId + '&quantity=' + quantity;
                    } else {
                        //alert('Failed to add product to cart: ' + response.error);
                        window.location.href = '{{ route("checkout") }}?productId=' + productId + '&quantity=' + quantity;
                    }
                },
                error: function(xhr, status, error) {
                    alert('Failed to add product to cart: ' + error);
                }
            });
        }
    </script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#"><h2>Megashop</h2></a>
                <div>
                    <p class="info">Welcome, {{ session('fullname') ? session('fullname') : 'Guest' }}</p>
                    <div id="popupMessage" class="popup">
                        <span class="popuptext" id="popupText">Welcome, Guest. Please <a href="/login">login</a> to view your profile.</span>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/products">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/checkout">Checkout</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/about">About Us</a>
                                {{--<a class="dropdown-item" href="https://demo.phpjabbers.com/free-web-templates/mobile-store-website-template-81/terms.php">Terms</a>--}}
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ session('profilephoto') ? asset('uploads/' . session('profilephoto')) : asset('uploads/avatar.png') }}" class="img-circle elevation-2" alt="User Image" height="50px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="/logout" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="services">
        <div class="container">
            <div class="row products-row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="service-item">
                        <img src="{{ asset('uploads/' . $product->prodphoto) }}" class="effectscale">
                        <div class="down-content">
                            <h4>{{ $product->proname }}</h4>
                            <div style="margin-bottom:10px;">
                                <span><del>₹{{ $product->original_price }}</del> ₹{{ $product->discounted_price }}</span>
                            </div>
                            <p>{{ $product->description }}</p>
                            <input type="number" id="quantity_{{ $product->proid }}" value="1" min="1" max="{{ $product->instock }}"></br></br>
                            <button type="button" class="btn-buy" onclick="buyProduct('{{ $product->proid }}', 1)">Buy Now</button> &nbsp;
                            <!-- Add to Cart button -->
                            <button type="button" class="btn-add-to-cart" onclick="addToCart('{{ $product->proid }}', 1)">
                                <img src="dist/img/cart.jpg" alt="Cart Icon"> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
