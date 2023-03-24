<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/index.css">
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="?p=home" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none font-weight-bold">
            Erdiwo
        </a>

        <ul class="nav col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="?p=login" class="btn btn-primary">Log in</a></li> &nbsp;
            <li><a href="?p=signin" class="btn btn-success">Sign in</a></li>
        </ul>
    </header>
    <main>
        <?= isset($content) ? $content : null ?>
    </main>
</div>
</body>
</html>