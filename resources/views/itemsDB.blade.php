@extends("layouts.app")

@section('sidbar')
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
        <a class="collapse-item" href="{{route('userData')}}" href="">user's</a>
        <a class="collapse-item" href="{{route('itemsDB')}}">item's</a>
        <a class="collapse-item" href="{{route('orders.index')}}">order's</a>
    </div>
</div> 
@endsection

@section("content")
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Items</h1>
                    <p class="mb-4">here we can items</a>.</p>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">add order</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <form method="POST" action="{{route('items.store')}}" enctype="multipart/form-data">
                                            @csrf
                                            @method("POST")
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="text" class="form-control" id="name" name="name" value="" required>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="price">Price:</label>
                                                <input type="number" class="form-control" id="price" name="price" value="" required>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="type">Type:</label>
                                                <input type="text" class="form-control" id="type" name="type" value="" required>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="quantity">Quantity:</label>
                                                <input type="number" class="form-control" id="quantity" name="quantity" value="" required>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="photo">Photo:</label>
                                                <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" required>
                                            </div>
                                        
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <br/>
            <br/>
            <br/>
            <br/>
            <hr/>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>price</th>
                                <th>type</th>
                                <th>quantity</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>price</th>
                                <th>type</th>
                                <th>quantity</th>
                                <th></th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($DB as $item)
                            <tr>
                                <td class="mt-2 text-muted font-weight-bold">{{$item['itemID']}}</td> 
                                <td>{{$item['name']}}</td>
                                <td>{{$item['price']}}</td>
                                <td>{{$item['type']}}</td>
                                <td>{{$item['quantity']}}</td>
                                <td><a href="{{ route('items.show', $item['itemID']) }}" class="btn btn-primary" role="button" aria-disabled="true">show</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
@endsection