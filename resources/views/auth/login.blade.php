@extends('layouts.web')

@section('content')


<script type="text/javascript">

    // ACTIVE NAVIGATION ENTRY
    $(document).ready(function ($) {
        $('#login_nav').addClass("menu-active");
    });

</script>

    <!--==========================
    Hero Section
    ============================-->
    <section id="hero" style="background-image: url({{ asset('img/background/hero-back.png') }}); height:200px">
        <div class="page-hero-container">
            <h1 style="padding-top:30px">Login to FIT</h1>
        </div>
    </section><!-- #hero -->

<main id="main">
    <section id="registration" style="padding-top: 80px;">
        <div class="row about-container mb-5">
            <div class="col-lg-7 content order-lg-1 order-2">


            </div>
            <div class="col-lg-5 content order-lg-2 order-1">
                <div class="p-5 form">
                    <form method="POST" action="{{ route('login') }}" class="contactForm">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-12 form-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 form-label">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pt-4">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-label pl-4" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-8 text-center">
                                <button type="submit" class="">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>

                    <div class="col-lg-12 align-content-center">
                        <a class="btn btn-link form-label" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>

                    </div>
                                                
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
