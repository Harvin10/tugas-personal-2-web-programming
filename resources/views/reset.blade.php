<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Reset password</title>
</head>

<body>
    <div class="d-flex vh-100 w-100 justify-content-center align-items-center">
        <div class="border border-dark p-4 rounded-4" style="width: 400px">
            <h1 class="mb-4">Reset password</h1>

            <form class="d-flex flex-column justify-content-center" action="/resetpassword" method="post">
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
                <div class="form-floating mb-3">
                    <input class="new_password form-control" type="password" name="password" id="floatingPassword"
                        placeholder="New password" onkeyup="newPasswordValidator(this)" onblur="newPasswordOnUntouch()">
                    <label for="floatingPassword">New password</label>
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

                <div class="form-floating mb-3">
                    <input class="confirm_password form-control" type="password" id="floatingPassword"
                        placeholder="Confirm password" onkeyup="confirmPasswordValidator(this)"
                        onblur="confirmPasswordOnUntouch()">
                    <label for="floatingPassword">Confirm password</label>
                    <div class="invalid-feedback">
                        Passwords do not match
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
        let isNewPasswordValid = false
        let isConfirmPasswordValid = false

        const newPasswordOnUntouch = () => {
            const element = document.getElementsByClassName('new_password')[0]
            if (!isNewPasswordValid) {
                element.classList.add('is-invalid')
            } else {
                element.classList.remove('is-invalid')
            }
        }

        const confirmPasswordOnUntouch = () => {
            const element = document.getElementsByClassName('confirm_password')[0]
            if (!isConfirmPasswordValid) {
                element.classList.add('is-invalid')
            } else {
                element.classList.remove('is-invalid')
            }
        }

        const newPasswordValidator = (e) => {
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/g;
            if (e.value.match(regex)) {
                isNewPasswordValid = true
            } else {
                isNewPasswordValid = false
            }
            disableButton()
        }

        const confirmPasswordValidator = (e) => {
            const new_password = document.getElementsByClassName('new_password')[0]
            if (e.value === new_password.value) {
                isConfirmPasswordValid = true
            } else {
                isConfirmPasswordValid = false
            }
            disableButton()
        }

        const disableButton = () => {
            const button = document.getElementsByClassName('submit')[0]
            if (!isNewPasswordValid || !isConfirmPasswordValid) {
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
