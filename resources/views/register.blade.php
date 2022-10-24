<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>
    <div class="d-flex vh-100 w-100 justify-content-center align-items-center">
        <div class="border border-dark p-4 rounded-4" style="width: 400px">
            <h1 class="mb-4">Register</h1>

            <form class="d-flex flex-column justify-content-center" action="/register" method="post">
                @csrf

                <div class="form-floating mb-3">
                    <input class="email form-control @error('email') is-invalid @enderror" type="email" name="email"
                        id="floatingInput" placeholder="name@example.com" onkeyup="emailValidator(this)"
                        onblur="emailOnUntouch()">
                    <label for="floatingInput">Email address</label>
                    <div class="invalid-feedback @error('email') d-none @enderror">
                        Please input a valid email address
                    </div>
                    @error('email')
                    <div class="invalid-feedback">
                        Email address already in use
                    </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input class="password form-control @error('password') is-invalid @enderror" type="password"
                        name="password" id="floatingPassword" placeholder="Password" onkeyup="passwordValidator(this)"
                        onblur="passwordOnUntouch()">
                    <label for="floatingPassword">Password</label>
                    <div class="invalid-feedback">
                        Passwords must contain:
                        <ul>
                            <li>Minimum 10 character</li>
                            <li>Uppercase letters: A-Z.</li>
                            <li>Lowercase letters: a-z.</li>
                            <li>Numbers: 0-9.</li>
                            <li>Symbols: ~`! @#$%^&*()_-+={[}]|\:;"'<,>.?/</li>
                        </ul>
                    </div>
                </div>

                <button class="submit btn btn-dark w-100" type="submit" disabled>Sign up</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script>
        let isEmailValid = false
        let isPasswordValid = false

        const emailOnUntouch = () => {
            const element = document.getElementsByClassName('email')[0]
            if (!isEmailValid) {
                element.classList.add('is-invalid')
            } else {
                element.classList.remove('is-invalid')
            }
        }

        const passwordOnUntouch = () => {
            const element = document.getElementsByClassName('password')[0]
            if (!isPasswordValid) {
                element.classList.add('is-invalid')
            } else {
                element.classList.remove('is-invalid')
            }
        }

        const emailValidator = (e) => {
            const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
            if (e.value.match(regex)) {
                isEmailValid = true
            } else {
                isEmailValid = false
            }
            disableButton()
        }

        const passwordValidator = (e) => {
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/g;
            if (e.value.match(regex)) {
                isPasswordValid = true
            } else {
                isPasswordValid = false
            }
            disableButton()
        }

        const disableButton = () => {
            const button = document.getElementsByClassName('submit')[0]
            if (!isEmailValid || !isPasswordValid) {
                button.setAttribute('disabled', '')
            } else {
                button.removeAttribute('disabled', '')
            }
        }
    </script>
</body>

</html>
</body>

</html>
