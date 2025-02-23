<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- PAGE TITLE HERE -->
    <title>Login Page</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="{{ asset('') }}assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">

                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <h3 class="form-title m-t0">Account Information</h3>
                                        <div class="dez-separator-outer m-b5">
                                            <div class="dez-separator bg-primary style-liner"></div>
                                        </div>
                                        <p>Enter your e-mail address and your password. </p>
                                        <div class="form-group mb-3">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                                placeholder="Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="text-center bottom">
                                            <button class="btn btn-primary button-md btn-block" id="nav-sign-tab"
                                                type="submit">Login</button>

                                        </div>
                                    </form>
                                    <div class="new-account mt-3 fw-bold">
                                        <p>Aplikasi Stasi Kota Nasareth VIII, Paroki Stella Maris Danga.</p>
                                    </div>
                                    <div class="new-account mt-3 text-center bottom">
                                        <p><i class="fa fa-copyright" aria-hidden="true"></i> Copyright Titikdigital.com
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    <script src="{{ asset('') }}assets/vendor/global/global.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('') }}assets/js/custom.min.js"></script>
    <script src="{{ asset('') }}assets/js/dlabnav-init.js"></script>

</body>

</html>
