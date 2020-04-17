function createNewUser() {
    const login = document.forms["registration-form-id"]
        .elements["login-id"].value;
    let password = document.forms["registration-form-id"]
        .elements["password-id"].value;
    const confirmPassword = document.forms["registration-form-id"]
        .elements["confirm-password-id"].value;
    const email = document.forms["registration-form-id"]
        .elements["email-id"].value;
    const name = document.forms["registration-form-id"]
        .elements["name-id"].value;


    // if (password !== confirmPassword) {
    //     return alert("Passwords is not match!");
    // }

    $.ajax({
        url: "../php/createUserInDB.php",
        type: "POST",
        data: ({login: login, password: password, email: email, name: name, confirmPassword: confirmPassword}),
        daatType: "html",
        success: function (message) {
            console.log(message);
            if (JSON.parse(message) === "") {
                return alert("There is no message from PHP file!");
            }

            const parsedMessage = JSON.parse(message);
            alert(parsedMessage);

        }
    })
}

function authenticateUser() {
    const authLogin = document.forms["authentication-form-id"]
        .elements["authentication-login-id"].value;
    const authPassword = document.forms["authentication-form-id"]
        .elements["authentication-password-id"].value;

    $.ajax({
        url: "../php/authenticateUser.php",
        type: "POST",
        data: ({authLogin: authLogin, authPassword: authPassword}),
        daatType: "html",
        success: function (message) {
            console.log(message);
            if (JSON.parse(message) === "") {
                return alert("There is no message from PHP file!");
            }

            let parsedMessage = JSON.parse(message);
            alert(parsedMessage);

        }
    })
}

