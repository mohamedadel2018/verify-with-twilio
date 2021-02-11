<div class="container">
@if (session('error'))
    <div class="alert alert-danger">
      <center>   {{session('error')}} </center>
    </div>
@endif



@if(session('success'))

    <div class="alert alert-success">
    <center> {{session('success')}} </center>
    </div>
@endif
</div>


