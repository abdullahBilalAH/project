<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fc;
    }
    .card {
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .card-header {
      background-color: #4e73df;
      color: #ffffff;
      text-align: center;
      font-weight: bold;
    }
    .card-body {
      padding: 1.25rem;
    }
    .order-info {
      margin-bottom: 0.75rem;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="row">
      @foreach($orders as $order)
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            Order ID: {{ $order->orderID }}
          </div>
          <div class="card-body">
            <div class="order-info">
              <strong>Order Value:</strong> ${{ number_format($order->order_value, 2) }}
            </div>
            <div class="order-info">
              <strong>Address:</strong> {{ $order->address }}
            </div>
            <div class="order-info">
              <strong>Phone Number:</strong> {{ $order->phoneNumber }}
            </div>
            <div class="order-info">
              <strong>Created At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}
            </div>
            <div class="order-info">
              <a href="{{route("orders.store",$order->orderID)}}" type="submit" name="action"  class="btn btn-success">show</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</body>
