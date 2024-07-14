<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>
    <!-- Include Bootstrap CSS (Optional) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Item Details</h2>

        <form method="POST" action="{{ route('item.update', $itemId) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $itemId }}" readonly>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
            </div>
        
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $item->price }}">
            </div>
        
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" class="form-control" id="type" name="type" value="{{ $item->type }}">
            </div>
        
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $item->quantity }}">
            </div>
        
            <div class="form-group">
                <label for="photo">Photo:</label>
                @if ($item->photo)
                    <div>
                        <img src="{{ asset($item->photo) }}" alt="Item Photo" class="img-thumbnail" width="150">
                    </div>
                @else
                    <p>No photo available.</p>
                @endif
                <hr/>
                <div class="form-group">
                    <label for="photo">Update Photo:</label>
                    <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        
        
        <br/>
        <form method="POST" action="{{ route('item.destroy',$itemId) }}">
            @csrf
            @method("Delete")
            <button type="submit"  class="btn btn-danger">Delete</button>
        </form>
        <br/>
        <a href="{{route("itemsDB")}}" class="btn btn-secondary">Back to Items</a>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
