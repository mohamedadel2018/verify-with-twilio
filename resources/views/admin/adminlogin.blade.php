@extends('layouts.app')

@section('content')






    {{-- START Login Form  --}}
    <section class="contact-us bg-light">
        <div class="container">
            <h3 class="text-center">Admin Login</h3>

            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">
                        {{-- form from here --}}
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail">Your Email Addrss</label>
                                <input id="email"   placeholder="Write Your Email"  id="inputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                         @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputPassword">Your Password </label>
                                <input id="password" type="password"  placeholder=" Write Your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                             @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="text-center p-2">
                                <button type="submit" class="btn btn-primary">
                                    <a >  {{ __('Login') }} </a>
                                </button>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

      {{-- END Login Form  --}}



@endsection
