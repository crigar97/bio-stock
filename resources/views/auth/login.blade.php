<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> Iniciar Sesión </title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style>
    .title {
      font-size: 25px;
      color: #48D296;
    }

    .title__logo {
      font-weight: bold;
      color: #48D296;
    }
  </style>
  </head>
<body>
    <!-- Log in -->
    <div class="container">
	    <div class="row pt-5">
	      <div class="col-lg-4 offset-lg-4">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Logo -->
	          <div class="form-group text-center">
              <img src="{{ url('storage/view-images//hormiga.png') }}" alt="icon__bio-stock">
	          </div>
	          <div class="form-group text-center">
              <h1 class="title__logo"> BIO-STOCK </h1>
	          </div>
            <!-- /Logo -->
            <!-- Form -->
	          <div class="form-group mt-5">
              <label for="email" class="title"> {{ __('EMAIL') }} </label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong> {{ $message }} </strong>
                </span>
              @enderror
            </div>
            
	          <div class="form-group mt-4">
              <label class="title"> {{ __('CONTRASEÑA') }} </label>
	            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            
	          <div class="form-group form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">
                {{ __('Recordarme') }}
              </label>
            </div>
            
	          <div class="form-group text-right">
              <button type="submit" class="btn btn-success">
                {{ __('Iniciar Sesión') }}
              </button>
            </div>

	          <div class="form-group text-center mt-3">
              @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('¿Olvidaste tu contraseña?') }}
                </a>
              @endif
            </div>
            <!-- /Form -->
          </form>
	      </div>
	    </div>
    </div>
    <!-- /Log in -->

    {{-- <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header"> Iniciar Sesión </div>
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                  <div class="col-md-6">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
</body>
</html>
