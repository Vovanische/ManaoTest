<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,
           user-scalable=no,
           initial-scale=1.0,
           maximum-scale=1.0,
           minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="js/form_functions.js"></script>
</head>
<body>
<header>

</header>
    <div class="simple-form">
        <form action="" id="registration-form-id">
            <fieldset>
                <legend>Registration</legend>
                <div class="form-field">
                    <label for="login-id">Login</label>
                    <input type="text" id="login-id" name="login">
                </div>
                <div class="form-field">
                    <label for="password-id">Password</label>
                    <input type="password" id="password-id" name="password">
                </div>
                <div class="form-field">
                    <label for="confirm-password-id">Confirm password</label>
                    <input type="password" id="confirm-password-id" name="confirm_password">
                </div>
                <div class="form-field">
                    <label for="email-id">Email</label>
                    <input type="text" id="email-id" name="email">
                </div>
                <div class="form-field">
                    <label for="name-id">Name</label>
                    <input type="text" id="name-id" name="name">
                </div>
                <br>
                <button type="button" onclick="createNewUser()">Register</button>
            </fieldset>
        </form>
    </div>

    <div class="simple-form">
        <form action="" id="authentication-form-id">
            <fieldset>
                <legend>Authentication</legend>
                <div class="form-field">
                    <label for="authentication-login-id">Login</label>
                    <input type="text" id="authentication-login-id" name="login">
                </div>
                <div class="form-field">
                    <label for="authentication-password-id">Password</label>
                    <input type="password" id="authentication-password-id" name="password">
                </div>
                <br>
                <button type="button" onclick="authenticateUser()">Log In</button>
            </fieldset>
        </form>
    </div>
</body>
<footer>

</footer>
</html>