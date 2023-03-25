<div class="container d-flex justify-content-center">
    <form class="form col-6 card" id="signin">
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            <div id="progress-bar" class="progress-bar" style="width: 50%"></div>
        </div>
        <div class="card-body">
            <h1 class="text-center">Inscription</h1>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Adresse email</label>
                <input type="email" id="email" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Mot de passe</label>
                <input type="password" id="password" class="form-control" />
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                        <label class="form-check-label" for="form1Example3"> Se souvenir de moi </label>
                    </div>
                </div>

                <div class="col">
                    <!-- Simple link -->
                    <a href="#" class="text-decoration-none">Mot de passe oublié ?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="form-control btn btn-success btn-block">S'inscrire</button>
        </div>
    </form>
</div>
