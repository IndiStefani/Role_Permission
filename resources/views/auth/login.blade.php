@extends('layouts.master')
@section('content')

<section class="container h-100">
    <div class="row justify-content-sm-center h-100 align-items-center">
        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8">
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <h1 class="fs-4 text-center fw-bold mb-4">Login</h1>
                    <h1 class="fs-6 mb-3">Please enter your email and password to log in.</h1>
                    <form method="POST" action="{{ route('login') }}" aria-label="abdul" data-id="abdul" class="needs-validation" novalidate="" autocomplete="off">
                    @csrf 

                        <div class="mb-3">
                            <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                            <div class="input-group input-group-join mb-3">
                                <input id="email" type="email" placeholder="Enter Email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="input-group-text rounded-end">&nbsp<i class="fa fa-envelope"></i>&nbsp</span>
                                <div class="invalid-feedback">
                                    Email is invalid
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 w-100">
                                <label class="text-muted" for="password">Password</label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="float-end">
                                    Forgot Password?
                                </a>
                                @endif
                            </div>
                            <div class="input-group input-group-join mb-3">
                                <input id="password" type="password" class="form-control" placeholder="Your password" name="password" required autocomplete="current-password">
                                <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i class="fa fa-eye"></i>&nbsp</span>
                                <div class="invalid-feedback">
                                    Password required
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="form-check-label">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-primary ms-auto">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-5 text-muted">
                Copyright &copy; 2023 &mdash; SISFO Persuratan
            </div>
        </div>
    </div>
</section>

@endsection