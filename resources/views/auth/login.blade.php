<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('APP_NAME', 'CMS') }}</title>
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}">
</head>

<body class="text-center">

    <main class="form-signin">

        @if(Session::has('error'))
        <div class="alert invalid-feeback text-center">
            {{Session::get('error')}}
        </div>

        @endif
        <form action="{{ route('login.post') }}" method="POST" novalidate>
            @csrf

            <img class="mb-4" src="{{ asset('logo.png') }}" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Login </h1>
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
                <label for="floatingInput">Email address</label>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="checkbox mt-3 mb-3">
                <label>
                    <input type="checkbox" name="remember_token" value=""> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2020-2022</p>
        </form>
    </main>

    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>

{{-- @endsection --}}