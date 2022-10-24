<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Login</title>
</head>

<body>
    <div class="d-flex vh-100 w-100 justify-content-center align-items-center">
        <div class="border border-dark p-4 rounded-4" style="width: 400px">
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if(session()->has('loginError'))
            <div class="alert alert-danger" role="alert">
                {{ session('loginError') }}
            </div>
            @endif
            @if(session()->has('successReset'))
            <div class="alert alert-success" role="alert">
                {{ session('successReset') }}
            </div>
            @endif

            <h1 class="mb-4">Login</h1>

            <form class="d-flex flex-column justify-content-center" action="/login" method="post">
                @csrf

                <div class="form-floating mb-3">
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                        id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="floatingInput">Email address</label>

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating mb-1">
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                        id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end mb-3">
                    <a href="/resetpassword">forgot password</a>
                </div>

                <div class="mb-3">
                    <div class="g-recaptcha" data-callback="recaptchaCallback"
                        data-sitekey="6Ld326UiAAAAAApF8lWEkXcJ0r2TK9RsrWER9AQX"></div>
                </div>

                <button class="btn btn-dark w-100" type="submit">Login</button>

                <div class="d-flex flex-row justify-content-center align-items-center">
                    <p class="m-0">Don't have an account?</p>
                    <a class="btn btn-link" href="/register">Sign up</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        const recaptchaCallback = function () {
            alert("grecaptcha is ready!");
        };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
</body>

</html>
</body>

</html>
