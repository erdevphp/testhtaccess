const signin = document.querySelector('form#signin');
const progressbar = document.querySelector('div#progress-bar');
const email = document.querySelector('input#email');
const password = document.querySelector('input#password');
signin.addEventListener('submit', function (e) {
    e.preventDefault();
    if (email.value !== '') {
        progressbar.style.width = '50%'
    }
    if (password.value !== '') {
        progressbar.style.width = '100%'
    }
})