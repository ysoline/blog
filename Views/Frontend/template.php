<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/umdi5wzy8syfdqdun003ztwbhuop2jj1p42n75ixljkydgf1/tinymce/5/tinymce.min.js">
    </script>
    <script>
        tinymce.init({
            selector: '#post',
            language_url: '../../public/tinymce/langs/fr_FR.js'
        });
    </script>
    <title><?= $title = "Jean Forteroche" ?></title>
</head>
<style>
    body {
        background-image: url("public/img/bg_alaska.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
</style>
<div class="container-fluid">
    <header class="blog-header py-3 px-5">
        <div class="text-center">
            <a class="blog-header-logo text-light text-decoration-none" href="index.php?action=listPosts">
                <h2>Jean Forteroche</h2>
            </a>
        </div>
        <div class="row flex-nowrap border-bottom justify-content-between align-items-center" id="navbar">

            <div class="col-3 col-sm-4 d-flex justify-content-around">
                <div>
                    <?php if (!isset($_SESSION['id_user'])) { ?>
                    <a class="text-light text-decoration-none" href="index.php?action=suscribePage">Inscription</a>
                    <?php } ?>
                    <?php if (isset($_SESSION['id_user'])) { ?>
                    <a class="text-light text-decoration-none" href="index.php?action=profil">Profil</a>
                </div>
                <div>
                    <?php if (($_SESSION['rank']) == 1) { ?>
                    <a class="text-light text-decoration-none" href="index.php?action=panelAdmin">Administration</a>
                    <?php }
                    } ?>
                </div>
            </div>




            <div class="col-3 col-sm-4 d-flex justify-content-end align-items-center">
                </a>
                <?php if (!isset($_SESSION['id_user'])) { ?>
                <a class="btn btn-sm btn-outline-light" href="index.php?action=auth">Connexion</a>
                <?php } ?>
                <?php if (isset($_SESSION['id_user'])) { ?>
                <a class="btn btn-sm btn-outline-light" href="index.php?action=disconnect">Déconnexion</a>
                <?php } ?>
            </div>
        </div>

        <div class=" px-5 mt-2">
            <div class="col-lg d-flex justify-content-center align-items-center card p-0">                
                <img src="public\img\aigle_alaska.png" class="card-img rounded shadow d-none d-lg-block" alt='aigle_alaska'>                
                <h1 class="font-italic text-center text-light font-weight-bold card-img-overlay d-none d-lg-block">Billet simple pour l'Alaska</h1>                   
            </div>
        </div>
        <h1 class="font-italic text-center  font-weight-bold d-lg-none">Billet simple pour l'Alaska</h1>           
    </header>

    <body>
        <div class="container-fluid">
            <?= $content ?>
        </div>
    </body>

    <footer class="blog-footer text-center px-5">
        <p class="text-light">Copyright © Julie Pilarski - 2019 - Tous droits réservés</p>
        <small class="text-light">Projet 4 - Formation Développeur Web Junior</small>
    </footer>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
    </script>

</html>