<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/lux/bootstrap.min.css" rel="stylesheet" integrity="sha384-hVpXlpdRmJ+uXGwD5W6HZMnR9ENcKVRn855pPbuI/mwPIEKAuKgTKgGksVGmlAvt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <title><?= $title = "Jean Forteroche" ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php?action=listPosts">Jean Forteroche</a>
        <ul class="navbar-nav mr-auto">

            <?php if (!isset($_SESSION['id_user'])) { ?>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?action=auth">Connexion</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?action=suscribePage">Inscription</a>
            </li>
            <?php } ?>

            <?php if (isset($_SESSION['id_user'])) { ?>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?action=profil">Profil</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?action=disconnect">Déconnexion</a>
            </li>
            <?php } ?>
        </ul>
    </nav>

    <?= $content ?>

</body>
<script type="text/javascript" src="../../public/js/editor.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
</script>

</html>