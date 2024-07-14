<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Orders Dashboard</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      background-color: #f8f9fc;
    }
    .order-header {
      background-color: #4e73df;
      color: #ffffff;
      text-align: center;
      font-weight: bold;
      padding: 10px;
      margin-bottom: 20px;
    }
    .item-photo {
      width: 100px;
      height: auto;
      border-radius: 5px;
      margin-right: 10px;
    }
    .item-container {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }
    .card {
      margin-bottom: 20px;
    }
    .card-header {
      background-color: #4e73df;
      color: #ffffff;
      font-weight: bold;
    }
  </style>
</head>
<body>
  @php
  $or = null; // Initialize the variable
  @endphp

  @foreach($orders as $order)
    @if($order->orderID == $orderId)
      @php
        $or = $order; // Assign the order to $or
      @endphp
    @endif
  @endforeach

  <div class="container">
    <div class="order-header">
      Order ID: {{$or->orderID}}
    </div>
    <div class="card">
      <div class="card-body">
        <div class="mb-4">
          <strong>Order Value:</strong> ${{$or->order_value}}
        </div>
        <div class="mb-4">
          <strong>Items:</strong>
          <div class="row">
            @php
              $itemsId = json_decode($order->items, true);
            @endphp
            @foreach($itemsId as $itemI)
              @foreach ($items as $item)
                @if($item->itemID == $itemI)
                  <div class="col-md-4">
                    <div class="card">
                      <img src="{{ asset($item->photo) }}" class="card-img-top item-photo" alt="{{ $item['name'] }}">
                      <div class="card-body">
                        <h5 class="card-title">{{ $item['name'] }}</h5>
                      </div>
                    </div>
                  </div>
                @endif
              @endforeach
            @endforeach
          </div>
        </div>
        <div class="mb-4">
          <strong>Address:</strong> {{$or->address}}
        </div>
        <div class="mb-4">
          <strong>Phone Number:</strong> {{$or->phoneNumber}}
        </div>
        <div class="mb-4">
          <strong>Created At:</strong> {{$or->created_at}}
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
