const login = document.querySelector('form#login');
const email = document.querySelector('input#floatingInput');
const password = document.querySelector('input#floatingPassword');


login.addEventListener('submit', function (e) {
    e.preventDefault();
    let data = "email="+email.value+"&password="+password.value;
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            $(login).before(`<div id="loginSuccess" class="alert alert-success text-center"><h3>Connexion à ${this.response} réussi</h3><p><a href="?p=admin" class="text-decoration-none">Clicker pour aller à la page d'acceuil</a></p></div>`)
            $(login).hide();
        } else if (this.readyState === 4) {
            alert('Une erreur est survenue');
        }
    };
    xhr.open("POST", "?p=login", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);

    return false;
});