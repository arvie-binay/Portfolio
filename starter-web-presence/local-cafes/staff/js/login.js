/* ============================================================
   LOCAL CAFÉ - STAFF LOGIN JAVASCRIPT

   This version does NOT connect to a database.

   Demo credentials:
       Username: staff
       Password: staff123

   Later, this JavaScript can be replaced with PHP/AJAX
   authentication connected to MySQL.
============================================================ */


/* ============================================================
   GET HTML ELEMENTS
============================================================ */

const loginForm = document.getElementById("staffLoginForm");

const usernameInput = document.getElementById("username");

const passwordInput = document.getElementById("password");

const rememberMe = document.getElementById("rememberMe");

const loginButton = document.getElementById("loginButton");

const loginMessage = document.getElementById("loginMessage");

const usernameError = document.getElementById("usernameError");

const passwordError = document.getElementById("passwordError");

const passwordToggle = document.getElementById("passwordToggle");

const eyeIcon = document.getElementById("eyeIcon");

const forgotPassword = document.getElementById("forgotPassword");

const forgotModal = document.getElementById("forgotModal");

const modalClose = document.getElementById("modalClose");

const modalOkay = document.getElementById("modalOkay");


/* ============================================================
   DEMO LOGIN INFORMATION

   IMPORTANT:
   This is ONLY for frontend testing.

   Do NOT use this method for a real production system.
============================================================ */

const DEMO_USERNAME = "staff";

const DEMO_PASSWORD = "staff123";


/* ============================================================
   PAGE LOAD
============================================================ */

document.addEventListener("DOMContentLoaded", function () {

    /*
        Check whether the user previously selected
        "Remember me".
    */

    const savedUsername = localStorage.getItem("cafeStaffUsername");

    if (savedUsername) {

        usernameInput.value = savedUsername;

        rememberMe.checked = true;

    }

});


/* ============================================================
   SHOW / HIDE PASSWORD
============================================================ */

passwordToggle.addEventListener("click", function () {

    /*
        Check the current input type.

        password = hidden
        text     = visible
    */

    if (passwordInput.type === "password") {

        // Show password
        passwordInput.type = "text";

        passwordToggle.setAttribute(
            "aria-label",
            "Hide password"
        );

        /*
            Change the eye icon.

            This creates a crossed-eye appearance.
        */

        eyeIcon.innerHTML = `
            <path d="M3 3l18 18"></path>

            <path d="M10.6 10.6
                     a2 2 0 0 0 2.8 2.8"></path>

            <path d="M9.9 4.2
                     C10.6 4 11.3 4 12 4
                     c6.5 0 10 8 10 8
                     s-1.3 3-4 5.1"></path>

            <path d="M6.6 6.6
                     C3.5 8.7 2 12 2 12
                     s3.5 8 10 8
                     c1 0 2-.2 2.9-.5"></path>
        `;

    } else {

        // Hide password
        passwordInput.type = "password";

        passwordToggle.setAttribute(
            "aria-label",
            "Show password"
        );

        /*
            Restore normal eye icon.
        */

        eyeIcon.innerHTML = `
            <path d="M2 12s3.5-7 10-7
                     10 7 10 7
                     -3.5 7-10 7
                     S2 12 2 12z">
            </path>

            <circle cx="12" cy="12" r="3"></circle>
        `;

    }

});


/* ============================================================
   CLEAR ERROR WHEN USER STARTS TYPING
============================================================ */

usernameInput.addEventListener("input", function () {

    clearUsernameError();

    clearLoginMessage();

});


passwordInput.addEventListener("input", function () {

    clearPasswordError();

    clearLoginMessage();

});


/* ============================================================
   FORM SUBMISSION
============================================================ */

loginForm.addEventListener("submit", function(event) {

    event.preventDefault();

    const username = usernameInput.value.trim();
    const password = passwordInput.value;

    // Clear previous messages
    clearErrors();
    clearLoginMessage();


    // ==========================================
    // CHECK EMPTY FIELDS
    // ==========================================

    if (username === "") {
        showUsernameError("Please enter your username.");
        return;
    }

    if (password === "") {
        showPasswordError("Please enter your password.");
        return;
    }


    // ==========================================
    // CHECK LOGIN
    // ==========================================

    if (
        username === "staff" &&
        password === "staff123"
    ) {

        // Start 1-second countdown
        showLoginMessage(
            "Login successful! Opening your dashboard...",
            "success"
        );


        // Wait 5 seconds, then redirect
        setTimeout(function() {

            window.location.href = "dashboard.html";

        }, 1000);

    } else {

        // Start 5-second visible countdown
        startCountdown(
            5,
            "Invalid username or password. Please try again.",
            "error",
            function() {

                // Clear message after countdown
                clearLoginMessage();

            }
        );

    }

});
/* ============================================================
   VISIBLE 5-SECOND COUNTDOWN
============================================================ */

function startCountdown(seconds, message, type, callback) {

    let remaining = seconds;

    // Show the first message immediately
    showLoginMessage(
        message + " (" + remaining + "s)",
        type
    );


    // Update the countdown every second
    const countdown = setInterval(function() {

        remaining--;


        if (remaining > 0) {

            showLoginMessage(
                message + " (" + remaining + "s)",
                type
            );

        } else {

            // Stop the timer
            clearInterval(countdown);

            // Execute the action after 5 seconds
            callback();

        }

    }, 1000);

}

/* ============================================================
   USERNAME ERROR
============================================================ */

function showUsernameError(message) {

    usernameError.textContent = message;

    usernameInput.classList.add("input-error");

}


/* ============================================================
   PASSWORD ERROR
============================================================ */

function showPasswordError(message) {

    passwordError.textContent = message;

    passwordInput.classList.add("input-error");

}


/* ============================================================
   CLEAR USERNAME ERROR
============================================================ */

function clearUsernameError() {

    usernameError.textContent = "";

    usernameInput.classList.remove("input-error");

}


/* ============================================================
   CLEAR PASSWORD ERROR
============================================================ */

function clearPasswordError() {

    passwordError.textContent = "";

    passwordInput.classList.remove("input-error");

}


/* ============================================================
   CLEAR ALL ERRORS
============================================================ */

function clearErrors() {

    clearUsernameError();

    clearPasswordError();

}


/* ============================================================
   SHOW LOGIN MESSAGE
============================================================ */

function showLoginMessage(message, type) {

    loginMessage.textContent = message;

    loginMessage.className =
        "login-message show " + type;

}


/* ============================================================
   CLEAR LOGIN MESSAGE
============================================================ */

function clearLoginMessage() {

    loginMessage.textContent = "";

    loginMessage.className = "login-message";

}


/* ============================================================
   LOADING STATE
============================================================ */

function setLoading(isLoading) {

    if (isLoading) {

        loginButton.classList.add("loading");

        loginButton.querySelector(
            ".button-text"
        ).textContent = "Signing in...";


        /*
            Hide the arrow while loading.
        */

        loginButton.querySelector(
            ".button-icon"
        ).style.display = "none";


    } else {

        loginButton.classList.remove("loading");

        loginButton.querySelector(
            ".button-text"
        ).textContent = "Sign In to Dashboard";


        loginButton.querySelector(
            ".button-icon"
        ).style.display = "flex";

    }

}


/* ============================================================
   FORGOT PASSWORD MODAL
============================================================ */

forgotPassword.addEventListener("click", function (event) {

    /*
        Prevent "#" from changing the URL.
    */

    event.preventDefault();

    openForgotModal();

});


/* ============================================================
   OPEN MODAL
============================================================ */

function openForgotModal() {

    forgotModal.classList.add("show");

}


/* ============================================================
   CLOSE MODAL
============================================================ */

function closeForgotModal() {

    forgotModal.classList.remove("show");

}


/* Close with X button */

modalClose.addEventListener(
    "click",
    closeForgotModal
);


/* Close with Okay button */

modalOkay.addEventListener(
    "click",
    closeForgotModal
);


/* ============================================================
   CLOSE MODAL WHEN CLICKING OUTSIDE
============================================================ */

forgotModal.addEventListener("click", function (event) {

    /*
        If the user clicked the dark overlay,
        close the modal.
    */

    if (event.target === forgotModal) {

        closeForgotModal();

    }

});


/* ============================================================
   CLOSE MODAL WITH ESCAPE KEY
============================================================ */

document.addEventListener("keydown", function (event) {

    if (
        event.key === "Escape" &&
        forgotModal.classList.contains("show")
    ) {

        closeForgotModal();

    }

});