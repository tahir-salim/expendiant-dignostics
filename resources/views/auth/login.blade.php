@include('../includes.compatibility')
<title>Xpediant Diagnostics Login</title>
<meta name="description" content="">
@include('../includes.style')

<style>
    .invalid-feedback {
        color: red;
    }
</style>
</head>

<body>
    <div class="main">
        <div class="login-signUp">
            <div class="container-fluid">
                <div class="logo"><img src="{{ asset('assets/images/logo.png') }}" alt=""></div>
                <h4>Login & Register</h4>
                <div class="row">
                    <div class="col-md-7">
                        <div class="signFrmWrp">
                            <h5>Registration</h5>
                            <form class="form_cus" method="post" action="{{ route('register') }}">
                                @csrf
                                <p>
                                    <input type="radio" id="patient" value="patient" name="acc_type" checked>
                                    <label for="patient">Patient</label>
                                </p>
                                <p>
                                    <input type="radio" id="hospital" value="hospital" name="acc_type">
                                    <label for="hospital">Hospital</label>
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="field" id="f_name" style="display: block;">
                                            <label for="">First Name</label>
                                            <input type="text" class="@error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" autocomplete="name"
                                                 placeholder="First Name">
                                            <i class="fal fa-user"></i>
                                        </div>

                                        <div class="field" id="hospital_name" style="display: none;">
                                            <label for="">Hospital Name</label>
                                            <input type="text" class="@error('hospital_name') is-invalid @enderror"
                                                name="hospital_name" value="{{ old('hospital_name') }}" required
                                                autocomplete="hospital_name"  placeholder="Hospital Name">
                                            <i class="fal fa-user"></i>
                                        </div>
                                        <div class="field">
                                            <label for="">Phone</label>
                                            <input type="text" class="@error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                                 placeholder="Your Phone">
                                            <i class="fal fa-phone-alt"></i>
                                        </div>
                                        <div class="field">
                                            <label for="">Password</label>
                                            <input type="password" class="@error('password') is-invalid @enderror"
                                                name="password" value="{{ old('password') }}" required
                                                autocomplete="password"  placeholder="********">
                                            <i class="fal fa-lock-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="field" id="l_name" style="display: block;">
                                            <label for="">Last Name</label>
                                            <input type="text"class="@error('last_name') is-invalid @enderror"
                                                name="last_name" value="{{ old('last_name') }}"
                                                autocomplete="last_name"  placeholder="Last Name">
                                            <i class="fal fa-user"></i>
                                        </div>
                                        <div class="field" id="address" style="display: none;">
                                            <label for="">Address</label>
                                            <input type="text"class="@error('address') is-invalid @enderror"
                                                name="address" value="{{ old('address') }}" required
                                                autocomplete="address"  placeholder="Address">
                                            <i class="fal fa-user"></i>
                                        </div>
                                        <div class="field">
                                            <label for="">Email</label>
                                            <input type="email" class="@error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="Your Email">
                                            <i class="fal fa-envelope"></i>
                                        </div>
                                        <div class="field">
                                            <label for="">Confirm Password</label>
                                            <input type="password"
                                                class="@error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation"
                                                value="{{ old('password_confirmation') }}" required
                                                autocomplete="email" placeholder="********">
                                            <i class="fal fa-lock-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="field-btn">
                                            <button type="submit">Register Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5">

                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="signFrmWrp logCont">
                                <h5>Login to continue</h5>
                                @error('email')
                                    <span class="alert alert-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="field">
                                    <label for="">{{ __('Email Address') }}</label>
                                    <input type="email" class="@error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" 
                                        placeholder="Your Email">
                                    <i class="fal fa-envelope"></i>

                                </div>
                                <div class="field">
                                    <label for="">Password</label>
                                    <input type="password" class="@error('password') is-invalid @enderror" required
                                        autocomplete="current-password" name="password" placeholder="********">
                                    <i class="fal fa-lock-alt"></i>
                                </div>
                                <div class="container">
                                    @error('password')
                                        <span class="invalid-feedback d-flex justify-content-start" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="field-btn">
                                    <button type="submit">Login</button>
                                </div>
                                <div class="forgot">
                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('../alerts.sweetalert')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    @include('../includes/scripts')
    <script>
        $(document).ready(function() {
            $('input:radio[name=acc_type]').change(function() {
                if (this.value == 'hospital') {

                    document.getElementById('f_name').style.display = "none";
                    document.getElementById('l_name').style.display = "none";
                    document.getElementById('hospital_name').style.display = "block";
                    document.getElementById('address').style.display = "block";
                    // $(".form_cus").attr("action","{{ route('hospital_register') }}");
                } else if (this.value == 'patient') {
                   
                    document.getElementById('f_name').style.display = "block";
                    document.getElementById('l_name').style.display = "block";
                    document.getElementById('hospital_name').style.display = "none";
                    document.getElementById('address').style.display = "none";
                    // $(".form_cus").attr("action","{{ route('register') }}");
                }
            });
        });
    </script>

</body>

</html>
