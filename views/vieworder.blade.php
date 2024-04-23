@extends('admin-layout.content')

@push('title')
    <title>To Do App | View Orders</title>
@endpush

@push('page-title')
    <h1 class="m-0">View Orders</h1>
@endpush

@push('menu-title')
    <li class="breadcrumb-item active">View Orders</li>
@endpush

@section('main-area')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Order Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->product_id }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Order Date</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- Graph Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Orders Graph</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <canvas id="salesChart" style="height: 400px; width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@push('scripts')
    <!-- Load Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Retrieve data for the chart
        let orderIds = @json($orders->pluck('order_id'));
        let totalAmounts = @json($orders->pluck('total_amount'));

        // Get the canvas element
        let salesChartCanvas = document.getElementById('salesChart');

        // Create the chart
        let salesChart = new Chart(salesChartCanvas, {
            type: 'bar',
            data: {
                labels: orderIds,
                datasets: [{
                    label: 'Total Amount',
                    data: totalAmounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Blue color with transparency
                    borderColor: 'rgba(54, 162, 235, 1)', // Solid blue border
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Total Amount'
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Order ID'
                        }
                    }]
                }
            }
        });
    </script>
@endpush