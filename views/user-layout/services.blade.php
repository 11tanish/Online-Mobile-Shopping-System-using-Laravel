<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .services {
            padding: 20px;
        }
        .service-item {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .service-item img {
            max-width: 100%;
            height: auto;
        }
        .down-content h4 {
            margin-top: 10px;
            font-size: 20px;
        }
        .down-content p {
            margin-top: 10px;
        }
        .btn-buy {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-buy:hover {
            background-color: #218838;
        }
        .btn-add-to-cart {
            background-color: transparent;
            border: none;
            padding: 0;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .btn-add-to-cart img {
            width: 30px; /* Adjust the width of the cart image */
            height: auto;
            vertical-align: middle; /* Align the image vertically */
            margin-right: 5px; /* Add some space between the image and text */
        }
        .btn-add-to-cart:hover {
            transform: scale(1.1); /* Increase size on hover */
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
                        window.location.href = '{{ route("checkout") }}?productId=' + productId + '&quantity=' + quantity;
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
    <div class="services">
        <div class="container">
            <div class="row">
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
                    <br>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
