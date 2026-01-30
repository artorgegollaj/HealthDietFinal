document.getElementById("login").addEventListener("submit", function (e) {
    e.preventDefault();

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    const email = document.getElementById("email").value.trim();
    const pass = document.getElementById("password").value.trim();

    const emailError = document.getElementById("emailError");
    const passError = document.getElementById("passError");

    emailError.textContent = "";
    passError.textContent = "";

    let isValid = true;

    if (!emailRegex.test(email)) {
        emailError.textContent = "Please enter a valid email address.";
        isValid = false;
    }

    if (pass.length < 1) {
        passError.textContent = "Please enter your password.";
        isValid = false;
    }

    if (isValid) {
        this.submit();
    }
});
