document
    .getElementById("togglePassword")
    .addEventListener("click", function () {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.setAttribute("stroke", "green"); // Ubah warna ikon
        } else {
            passwordInput.type = "password";
            eyeIcon.setAttribute("stroke", "gray"); // Reset warna ikon
        }
    });

document
    .getElementById("togglePasswordConfirmation")
    .addEventListener("click", function () {
        const passwordConfirmationInput = document.getElementById(
            "password_confirmation"
        );
        const eyeIconConfirmation = document.getElementById(
            "eyeIconConfirmation"
        );
        if (passwordConfirmationInput.type === "password") {
            passwordConfirmationInput.type = "text";
            eyeIconConfirmation.setAttribute("stroke", "green"); // Ubah warna ikon
        } else {
            passwordConfirmationInput.type = "password";
            eyeIconConfirmation.setAttribute("stroke", "gray"); // Reset warna ikon
        }
    });
