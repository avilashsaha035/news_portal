<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BDN-71 Login</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Kero HTML Bootstrap 4 Dashboard Template">

    <meta name="msapplication-tap-highlight" content="no">
    <link href="assets/css/main.07a59de7b920cd76b874.css" rel="stylesheet">

    {{-- toastr cdn --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- toastr cdn --}}

    <!-- font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome icon -->

    <!-- typcn icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css"
        integrity="sha512-/O0SXmd3R7+Q2CXC7uBau6Fucw4cTteiQZvSwg/XofEu/92w6zv5RBOdySvPOQwRsZB+SFVd/t9T5B/eg0X09g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- typcn icon -->

    <!-- pixeden icon -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <!-- pixeden icon -->

    <!-- lnr icon -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
    <!-- lnr icon -->

    <script type="text/javascript" src='https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js'
        referrerpolicy="origin"></script>

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                      <div class="app-logo-inverse mx-auto mb-3"></div>
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Welcome!</div>
                                        </h4>
                                    </div>
                                    <form method="post" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group"><input name="email"
                                                        id="email" placeholder="Email here..." type="email"
                                                        class="form-control @error('email') is-invalid @enderror">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="position-relative form-group"><input name="password"
                                                        id="password" placeholder="Password here..." type="password"
                                                        class="form-control @error('password') is-invalid @enderror">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="position-relative form-check"><input name="check" id="remember"
                                                type="checkbox" class="form-check-input"
                                                {{ old('remember') ? 'checked' : '' }}><label for="remember"
                                                class="form-check-label">{{ __('Keep me logged in') }}</label>
                                        </div><br>


                                        <h6 class="mb-0">No account? <a href="{{ route('register') }}"
                                                class="text-primary">Sign up now</a> </h6> <br>

                                        <div class=" container text text-center">
                                            <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>
                                            
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-primary" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>

                                    </form>

                                    <div class="container mt-3 text text-center">
                                        <button type="submit" class="btn btn-info1">
                                            <a href="{{ route('google-auth') }}"> <i class="fa-brands fa-google fa-xl"></i>  Continue with Google </a>
                                        </button>
                                    </div>
                                    <div class="container mt-3 text text-center">
                                        <button type="submit" class="btn btn-info2">
                                            <a href="{{ route('facebook-auth') }}"> <i class="fa-brands fa-facebook fa-xl"></i>  Continue with Facebook </a>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/scripts/main.07a59de7b920cd76b874.js"></script>
</body>

</html>
