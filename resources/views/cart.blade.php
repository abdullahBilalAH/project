<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>




<!-- resources/views/cart.blade.php -->
<div class="container mt-5">
  <h1 class="text-center mb-4">Your Cart</h1>
  <div class="row">
    @php
      $totalCost = 0;
      $itemIDs = [];
    @endphp

    @foreach ($cartItems as $item)
      @if ($item->quantity != 0)
        @php
          $totalCost += $item->price * $item->quantity;
          $itemIDs[] = $item->itemID; // إضافة معرف العنصر إلى المصفوفة
        @endphp
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="{{ asset($item->photo) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">{{ $item->name }}</h5>
              <p class="card-text">Price: ${{ $item->price }}</p>
              <p class="card-text">Type: {{ $item->type }}</p>
              <p class="card-text">Quantity: {{ $item->quantity }}</p>
            </div>
          </div>
        </div>
      @endif
    @endforeach
  </div>
</div>

<div class="text-center mb-4">
  <h1>Order Cost: ${{ $totalCost }}</h1>
  <form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <input type="hidden" name="totalCost" value="{{ $totalCost }}">
    <input type="hidden" name="items" value="{{ json_encode($itemIDs) }}">
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="form-group">
      <label for="phoneNumber">Phone Number:</label>
      <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
    </div>
    <button type="submit" class="btn btn-primary">Order</button>
  </form>
</div>
