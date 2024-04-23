@include('user-layout.header')

<head>
    <!-- Your head content goes here -->
    <style>
        /* Your custom CSS styles go here */
        .i1{
            text-align: right;
        }
        .i2 {
            width: 500px;
            height: 450px;
            float: right;
            border: double
        }

        .i3 {
            text-align: right;
            border: 0
        }

        #i4 {
            background-color: #faf3e0;
        }

        .i5 {
            font-family: 'Times New Roman';
        }
    </style>
</head>

<body id="i4">
    <!-- Main content -->
    <div class="main-content">
        <!-- Your main content goes here -->

        <h2>Thank you for shopping from Megashop!!</h2>
        <img src="dist/img/Logo.jpeg" class="img-circle elevation-2" alt="User Image" height="50px" style="border-radius: 50%; position: absolute; top: 0; right: 0;"><br><br>

        <div id="map">
            <h4 class="i3">Select region for delivery.</h4><br><br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30774059.984586403!2d60.99624857587957!3d19.687101072791076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1688836899012!5m2!1sen!2sin" class="i2"></iframe>
        </div>

        <img src="dist/img/udash/iphone1.png" height="235" class="effectscale"><br>
        <div class="i5">
            <br>
            <h4>Product Name - </h4> Iphone 14<br><br>
            <h4>Price - </h4>₹ 1,30,000.00<br><br>
            <h4>Screen - </h4> Super Retina XDR OLED, HDR10, Dolby Vision, 800 nits (HBM), 1200 nits (peak). <br><br>
            <h4>OS - </h4> iOS 16, upgradable to iOS 16.5, planned upgrade to iOS 17 <br><br>
            <h4>Battery - </h4> Li-Ion 3279 mAh,Wired, PD2.0, 50% in 30 min 15W wireless (MagSafe) 7.5W wireless (Qi)
            <br><br><br><br><br>
        </div>
        </form>

    </div>

    <div class="i1"><h6>© Copyright 2023 Megashop.</h6></div>


</body>

@include('user-layout.header')

<head>
    <style>
        
        .i1{
            text-align: right;
        }
        .i2 {
            width: 500px;
            height: 450px;
            float: right;
            border: double
        }

        .i3 {
            text-align: right;
            border: 0
        }

        #i4 {
            background-color: #faf3e0;
        }

        .i5 {
            font-family: 'Times New Roman';
        }
    </style>
</head>   

    
    <!-- Main content -->

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Screen </th>
                    <th>OS</th>
                    <th>Battery</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Iphone 14</td>
                    <td>₹1,30,000.00</td>
                    <td>Super Retina XDR OLED, HDR10, Dolby Vision, 800 nits (HBM), 1200 nits (peak).</td>
                    <td>iOS 16, upgradable to iOS 16.5, planned upgrade to iOS 17</td>
                    <td>Li-Ion 3279 mAh,Wired, PD2.0, 50% in 30 min 15W wireless (MagSafe) 7.5W wireless (Qi)</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <button type="submit" name="Add_To_Order" class="btn btn-success" onclick="redirectToPurchaseForm()">Buy</button>
    <script>
function redirectToPurchaseForm() {
        window.location.href = "{{ route('purchaseForm') }}";
    }

    </script>
<div class="i1"><h6>© Copyright 2023 Megashop.</h6></div>
</body>
jkfbfv
@include('user-layout.footer')
