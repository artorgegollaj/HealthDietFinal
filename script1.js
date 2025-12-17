document.getElementById("login").addEventListener("submit",function(e){
    e.preventDefault();

    const username=/^[a-z A-Z 0-9,_-]{3,20}$/;
    const password= /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    const usr=document.getElementById("username").value.trim();
    const pass=document.getElementById("password").value.trim();

    const usrError=document.getElementById("usrError");
    const passError=document.getElementById("passError");

    usrError.textContent="";
    passError.textContent="";

    let isValid = true;

   
    if (!username.test(usr)) {
        usrError.textContent =
            "Username must be 3–20 characters (letters, numbers, _ or -)";
        isValid = false;
    }

    if (!password.test(pass)) {
        passError.textContent =
            "Password must be 8+ characters , include upper, lower, number & special symbol";
        isValid = false;
    }

    if (isValid) {
        alert("Login successful!");
    }
    
});