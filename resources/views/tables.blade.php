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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>user type</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>user type</th>
                                            <th>action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($DB as $user)
                                        <tr>
                                            <td class="mt-2 text-muted font-weight-bold">{{$user['id']}}</td> 
                                            <td>{{$user['name']}}</td>
                                            <td>{{$user['email']}}</td>
                                            <td>{{$user['userType']}}</td>
                                            <td><a href="{{ route('user.destroy', $user['id']) }}" class="btn btn-primary" role="button" aria-disabled="true">delete</a>
                                            <a href="{{ route('user.update', $user['id']) }}" class="btn btn-danger" role="button" aria-disabled="true">admin<==>user</a>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
        @endsection