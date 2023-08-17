<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/fonts3/icomoon/style.css">

  <link rel="stylesheet" href="/css3/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/css3/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="/css3/style.css">

  <title>Login</title>
</head>

<body>

  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/img2.jpg');"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
                <h3>Login</h3>
                <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group first">
                  <label for="username">Email</label>
                  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="" id="email" value="{{ old ('email') }}">
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="d-block text-right mt-3">
                  @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                  </a>
                  @endif
                </div>
                <input type="submit" value="Log In" class="btn btn-block btn-primary">
              </form>
              <small class="d-block text-center mt-3">Not registered? <a href="/register" class="text-info">Register Now!</a></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="js3/jquery-3.3.1.min.js"></script>
  <script src="js3/popper.min.js"></script>
  <script src="js3/bootstrap.min2.js"></script>
  <script src="js3/main.js"></script>
</body>

</html>