<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/index.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
    <title>Erdiwo</title>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="?p=home" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none font-weight-bold">
            <i class="fa-solid fa-house"></i>&nbsp;Erdiwo
        </a>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        </form>
        <ul class="nav col-md-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item text-primary" href="?p=login"><i class="fa-solid fa-blog"></i> Se connecter</a>
                    <a class="dropdown-item text-success" href="?p=signin"><i class="fa-solid fa-hands-asl-interpreting"></i> S'inscrire</a>
                    <a class="dropdown-item text-secondary" href="?p=about"><i class="fa-solid fa-address-card"></i> A propos</a>
                </div>
            </li>
        </ul>
    </header>

    <main role="main">
        <?= isset($content) ? $content : null ?>
    </main>

    <nav aria-label="Page navigation example" class="mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="../assets/jquery/jquery.js"></script>
<script src="../assets/popper/popper.js"></script>
<script src="../assets/bootstrap/bootstrap.min.js"></script>
<?= isset($blockJSPath) ? '<script src="../assets/'.$blockJSPath.'.js"></script>' : null ?>
</body>
</html>