@include('../includes.compatibility')
<title>Xpediant Diagnostics Dashboard</title>
<meta name="description" content="">
@include('../includes.style')

<style>
    .is-invalid{
        
    }
</style>
</head>

<body>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="logo d-flex justify-content-center"><img src="{{ asset('assets/images/logo.png') }}"
                        alt=""></div>
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" class="" action="{{ route('password.email') }}">
                            @csrf
                            <div class="signFrmWrp">
                                @error('email')
                                    <span class="alert alert-danger invalid-feedback col-12 text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <br>
                                    <br>
                                @enderror
                                
                                <div class="field">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <input id="email" type="email"
                                        class="form-control" @error('email') style="border-color: red;" @enderror name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <i class="fal fa-envelop"></i>
                                </div>
                                <div class="">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                        
                                        
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{route('login')}}">Back to login</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('../includes/scripts')
