<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
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

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap border-bottom justify-content-between align-items-center">
                <div class="col-4 pt-1 d-flex justify-content-around">
                    <div >
                    <?php if (!isset($_SESSION['id_user'])) { ?>
                    <a class="text-muted text-decoration-none" href="index.php?action=suscribePage">Inscription</a>
                    <?php } ?>
                    <?php if (isset($_SESSION['id_user'])) { ?>
                    <a class="text-muted text-decoration-none" href="index.php?action=profil">Profil</a>
                    </div>
                    <div>
                    <?php if (($_SESSION['rank']) == 1) { ?>
                <a class="text-muted text-decoration-none" href="index.php?action=panelAdmin">Administration</a>
                <?php }} ?>
                    </div>
                </div>

                

                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark text-decoration-none" href="index.php?action=listPosts"><h2>Jean Forteroche</h2></a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    </a>
                    <?php if (!isset($_SESSION['id_user'])) { ?>
                    <a class="btn btn-sm btn-outline-secondary" href="index.php?action=auth">Connexion</a>
                    <?php } ?>
                    <?php if (isset($_SESSION['id_user'])) { ?>
                    <a class="btn btn-sm btn-outline-secondary" href="index.php?action=disconnect">Déconnexion</a>
                    <?php } ?>
                </div>
            </div>

            <div class="p-3">
    <div class="px-0">
    <h1 class="display-4 font-italic text-center">Billet simple pour l'Alaska</h1>
        <img src="public\img\aigle_alaska.png" class="img-fluid rounded shadow" alt='aigle_alaska'>       
      <p class="lead my-3 font-italic text-muted">Partez l'aventure en compagnie de votre écrivain favori, Jean Forteroche.</p>      
    </div>
  </div>
        </header>

        <?= $content ?>

</body>

<footer class="blog-footer text-center">
<hr class="my-4">
  <p>Développé par Julie Pilarski.</p>
  <small>Projet 4 - Formation Développeur Web Junior</small>
</footer>

<script type="text/javascript" src="../../public/js/editor.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
</script>

</html>