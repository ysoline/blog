<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<?php

foreach ($posts as $post)
{ ?>
<div class="col-lg-3">
  <h2><?= $post['title']?></h2>
  <p class="lead"><?= substr($post['post'],0,150);?>...</p>
  <p class="lead d-flex justify-content-center">
    <a class="btn btn-primary btn" href="index.php?action=post&amp;id=<?= $post['id']; ?>" role="button">Lire la suite</a>
  </p>
</div>


</div>
<?php } 
$posts->closeCursor();
$content = ob_get_clean();
require('view/frontend/template.php');
?>