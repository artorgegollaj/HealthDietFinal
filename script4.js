document.getElementById("signup").addEventListener("submit",function(e){
    e.preventDefault();

    const name=/^[a-zA-Z ]{3,20}$/;
    const lastname=/^[a-zA-Z ]{3,20}$/;
    const height= /^(1[0-9]{2}|2[0-2][0-9]|230)$/;
    const weight= /^(3[0-9]|[4-9][0-9]|1[0-9]{2}|200)$/;
    const email=/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,}$/;
    const password=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    const confirmpassword=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    const nm=document.getElementById("name").value.trim();
    const ln=document.getElementById("lastname").value.trim();
    const he=document.getElementById("height").value.trim();
    const we=document.getElementById("weight").value.trim();
    const em=document.getElementById("email").value.trim();
    const ps=document.getElementById("password").value.trim();
    const cp=document.getElementById("confirmpassword").value.trim();

    const nameError=document.getElementById("nameError");
    const lastNameError=document.getElementById("lastNameError");
    const heightError=document.getElementById("heightError");
    const weightError=document.getElementById("weightError");
    const emailError=document.getElementById("emailError");
    const passError=document.getElementById("passError");
    const cpassError=document.getElementById("cpassError");

    nameError.textContent="";
    lastNameError.textContent="";
    heightError.textContent="";
    weightError.textContent="";
    emailError.textContent="";
    passError.textContent="";
    cpassError.textContent="";

    let isValid = true;
    
    if (!name.test(nm)) {
        nameError.textContent =
            "Name must be 3–20 letters";
        isValid = false;
    }

    if (!lastname.test(ln)) {
        lastNameError.textContent =
            "Last Name must be 3–20 letters";
        isValid = false;
    }

    if (!height.test(he)) {
        heightError.textContent =
            "Height must be 2 or 3 numbers";
        isValid = false;
    }

    if (!weight.test(we)) {
        weightError.textContent =
            "Weight must be 2 or 3 numbers";
        isValid = false;
    }

    if (!email.test(em)) {
        emailError.textContent =
            "Email must contain @ and end in a valid domain like '.com' ";
        isValid = false;
    }

    if (!password.test(ps)) {
        passError.textContent =
            "Password must be 8+ characters , include upper, lower, number & special symbol";
        isValid = false;
    }
    
    if (cp !== ps) {
        cpassError.textContent =
            "Password must match initial given password";
        isValid = false;
    }

    if (isValid) {
        alert("SignUp successful!");
    }

})