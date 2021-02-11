@extends('admin.dashboard')
@section('dashboard')


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>

                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>mobile</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Edit</th>
                                        </tr>

                                    </thead>
                                    @foreach ($users as $user)
                                    <tfoot>
                                        <tr>
                                            <th>{{$user->id}}</th>
                                            <th>{{$user->username}}</th>
                                            <th>{{$user->mobile}}</th>
                                            <th>{{$user->created_at}}</th>
                                            <th>{{$user->updated_at}}</th>
                                            <th><a href="{{ route('users.edit', $user->id) }}" class='btn btn-primary btn-sm'>Edit</a>  </th>
                                        </tr>
                                    </tfoot>

                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->







@endsection
