var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector("#signup");

var body = document.querySelector("body");


btnSignin.addEventListener("click", function () {
   body.className = "sign-in-js"; 
});

btnSignup.addEventListener("click", function () {
    body.className = "sign-up-js";

});

// menu js
const loginButton = document.getElementById('loginBotao');
loginButton.addEventListener('click', function(e) {
e.preventDefault();
window.location.href = 'menu.html';
});






