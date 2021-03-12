<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signin | Gull Admin Template</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('frontend/css/themes/lite-purple.min.css') }}" rel="stylesheet" />
</head>
<div class="auth-layout-wrap" style="background-image: url(../../dist-assets/images/photo-wide-4.jpg)">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-4"><img src="{{ asset('frontend/images/logo.png') }}" alt=""></div>
                        <h1 class="mb-3 text-18">{{ trans('global.login') }}</h1>
                        <form class="form" method="POST" action="{{ route('client.login') }}">
                            @csrf
                            @if(session('status'))
                                <div class="card-body" style="padding: .9375rem 20px;">
                                    <p class="alert alert-info">
                                        {{ session('status') }}
                                    </p>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="form-control form-control-rounded" name="email" id="email" type="email" placeholder="{{ trans('global.login_email') }}..." value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <div class="error" for="email">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control form-control-rounded" id="password" name="password" type="password" placeholder="{{ trans('global.login_password') }}..." autocomplete="current-password" required>
                            </div>
                            @error('password')
                                <div class="error" for="email">
                                    {{ $message }}
                                </div>
                            @enderror
                            @if(Session::has('error'))
                                {{ Session::get('error') }}
                            @endif
                            <button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">
                                {{ trans('global.login') }}
                            </button>
                        </form>
                        <div class="mt-3 text-center">
                            <a class="text-muted" href="{{ route('password.request') }}">
                                <u>{{ trans('global.forgot_password') }}</u>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center" style="background-size: cover;background-image: url('{{ asset("frontend/images/photo-long-3.jpg") }}')">
                    <div class="pr-3 auth-right"><a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="signup.html"><i class="i-Mail-with-At-Sign"></i> Sign up with Email</a><a class="btn btn-rounded btn-outline-google btn-block btn-icon-text"><i class="i-Google-Plus"></i> Sign up with Google</a><a class="btn btn-rounded btn-block btn-icon-text btn-outline-facebook"><i class="i-Facebook-2"></i> Sign up with Facebook</a></div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>