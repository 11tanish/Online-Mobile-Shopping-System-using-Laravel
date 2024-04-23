

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa; /* Match background color of old checkout */
        }
        h1 {
            margin-bottom: 20px;
            color: #333; /* Match font color of old checkout */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd; /* Match border color of old checkout */
            background-color: #fff; /* Match background color of old checkout */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }
        .total strong {
            color: #333; /* Match font color of old checkout */
            font-size: 20px; /* Match font size of old checkout */
        }
        p {
            color: #333; /* Match font color of old checkout */
        }
        .form-group {
            margin-bottom: 20px;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M7 10l5 5 5-5z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
        }
        .filled-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .filled-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
  
    <h1>Checkout</h1>

    @if ($cartItems && count($cartItems) > 0)
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalAmount = 0;
                @endphp
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->proname }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ $item->product->discounted_price }}</td>
                        <td>₹{{ $item->quantity * $item->product->discounted_price }}</td>
                        @php
                            $totalAmount += $item->quantity * $item->product->discounted_price;
                        @endphp
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            <strong>Total Amount: ₹{{ $totalAmount }}</strong>
        </div>

        <h2>Payment Details</h2>
        <form action="{{ route('checkout.submit') }}" method="post" required>
            <div class="form-group">
                <label for="payment_method">Payment Method:</label>
                <select name="payment_method" id="payment_method" required>
                    <option value="">-- Choose Payment method --</option>
                    <option value="bank">Bank account</option>
                    <option value="cash">Cash</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>
            <div class="form-group">
                <label for="captcha">Captcha:</label>
                <input type="text" id="captcha" name="captcha" placeholder="Enter Captcha">
            </div>
            
            <button type="submit" class="filled-button" onclick="showThankYouMessage()">Pay Now</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif

    <script>
        function showThankYouMessage() {
            alert("Thank you for shopping from Megashop! Visit again.");
            return true; // Submit the form
        }
    </script>

</body>
</html>
