<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for shopping from Megashop!!</title>
    <style>
        /* Your CSS styles */
        .i3 {
            text-align: right;
            border: 0
        }
    </style>
    <!-- Include necessary CSS files -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body id="i4">
    <h2>Thank you for shopping from Megashop!!</h2>
    <img src="{{ asset('dist/img/Logo.jpeg') }}" class="img-circle elevation-2" alt="User Image" height="50px" style="border-radius: 50%; position: absolute; top: 0; right: 0;"><br><br>
    <div id="map">
        <h3 class="i3">Select region for delivery.</h3><br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30774059.984586403!2d60.99624857587957!3d19.687101072791076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1688836899012!5m2!1sen!2sin" class="i2"></iframe>
    </div>
    <img src="dist/img/udash/onenord3.jpg" height="235" class="effectscale"><br>
    <!-- Table starts here -->
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Screen</th>
                    <th>OS</th>
                    <th>Battery</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Oneplus Nord 3</td>
                    <td>₹ 7,000.00</td>
                    <td>IPS LCD, 400 nits.</td>
                    <td>Android 12 or 13 (Go edition), MIUI.</td>
                    <td>Li-Po 5000 mAh,10W wired</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Table ends here -->

    <p><h4>© Copyright 2023 Megashop.</h4></p>

    <!-- Include necessary JavaScript files -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- Page specific script -->

    <button type="submit" name="Add_To_Order" class="btn btn-success" onclick="redirectToPurchaseForm()">Buy</button></a>
    <script>
        function redirectToPurchaseForm() {
        window.location.href = "{{ route('purchaseForm') }}";
    }
    </script>
</body>
</html>
