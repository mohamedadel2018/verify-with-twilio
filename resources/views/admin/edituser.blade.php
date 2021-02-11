@extends('admin.dashboard')
@section('dashboard')


                <!-- Begin Page Content -->
                <div class="container-fluid">

<div class="row justify-content-center">
    <div class="col-md-7 col-sm-10">
        <div class="contact-form">
            <form  action="{{route('users.update',$user->id)}}" method="POST" style="margin-bottom: 150px;">
                @csrf @method('PUT')
                <div class="form-group ">
                    <label for="inputName">User name</label>

                     <input id="username" type="text" placeholder=" username here" class="form-control @error('username') is-invalid @enderror"
                     name="username" value="{{$user->username}}" required autocomplete="username" autofocus>
                     @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputsemail">mobile </label>


                    <input id="mobile" type="mobile" placeholder="mobile here" class="form-control @error('mobile')  is-invalid @enderror"
                     name="mobile" value="{{ $user->mobile  }}"  autocomplete="mobile">

                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>




                <div class="text-center p-2">

                    <button type="submit" class="btn btn-primary" style="margin-bottom:20px">
                          Update
                    </button>
            </form>

                {{-- form for delete user --}}
                <form action="{{route('users.destroy',$user->id)}}" method="POST">
                    @csrf @method('delete')
                  <button type="submit" class='btn btn-danger'>Delete</button>
              </form>
            {{-- end form --}}
</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->







@endsection
