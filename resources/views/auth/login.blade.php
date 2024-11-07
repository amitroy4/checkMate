<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href= "{{ asset('admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href= "{{ asset('admin/css/plugins.min.css') }}" />
    <link rel="stylesheet" href= "{{ asset('admin/css/kaiadmin.min.css') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Login</title>

</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start content-->
        <main class="authentication-content">
            <div class="container">
                <div class="authentication-card mt-5">
                    <div class="row g-0">
                        <div class="col-lg-4 mx-auto col-md-6">
                            <div class="card shadow rounded-0 overflow-hidden">
                                <div class="card-body p-4 p-sm-5">
                                    <h3 class="card-title text-center">Sign In</h3>
                                    <p class="card-text mb-5">See your growth and get consulting support!</p>
                                    <form class="form-body" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">UserID</label>
                                                <div class="ms-auto position-relative">
                                                    <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-envelope-fill"></i>
                                                    </div>
                                                    <input type="text" class="form-control radius-30 ps-5"
                                                        id="inputEmailAddress" placeholder="UserID" name="userId">
                                                        @error('userId')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter
                                                    Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" class="form-control radius-30 ps-5"
                                                        id="inputChoosePassword" placeholder="Enter Password"  name="password"
                                                        required autocomplete="current-password">
                                                        @error('password')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check form-switch">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" name="remember">
                                                        Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end"> <a
                                                    href="authentication-forgot-password.html">Forgot Password ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary radius-30">Sign
                                                        In</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--end page main-->
    </div>
    <!--end wrapper-->

    <!--plugins-->
    <script src="{{ asset('admin/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('admin/js/kaiadmin.min.js') }}"></script>

</body>

</html>
