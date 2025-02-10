@include('../includes.compatibility')
<title>Xpediant Diagnostics Dashboard</title>
<meta name="description" content="">
@include('../includes.style')
</head>

<body>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="logo d-flex justify-content-center"><img
                        src="{{ asset('assets/images/logo.png') }}"alt=""></div>
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="signFrmWrp">
                                @error('email')
                                    <span class="alert alert-danger invalid-feedback col-12 text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <br>
                                    <br>
                                @enderror
                                <div class="field">
                                    <label
                                        for="email"class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                    <input id="email"
                                        type="email"class="form-control @error('email') is-invalid @enderror"
                                        name="email"value="{{ $email ?? old('email') }}" required autocomplete="email"
                                        autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="feild">
                                    <label
                                        for="password"class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                    <input id="password"
                                        type="password"class="form-control @error('password') is-invalid @enderror"
                                        name="password"required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="feild">
                                    <label
                                        for="password-confirm"class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password"
                                        class="form-control"name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>

                                <div class="">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('../includes/scripts')
