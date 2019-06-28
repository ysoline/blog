<?php $title?>

<?php ob_start(); ?>

<div class="jumbotron">
  <h1 class="display-3"><?= $post['title'] ?></h1>
  <p class="lead"><?= $post['post'] ?></p>
  <hr class="my-4">
  <p><?= $post['date_creation_fr']?></p>

</div>

<h2>Commentaires :</h2>

<?php
foreach ($comments as $comment)
{ ?>
<div class="jumbotron">
  <h5><?= $comment['title'] ?> par <?= $comment['author'] ?></h5>
  <p class="lead"><?= $comment['comment'] ?></p>
  <hr class="my-4">
  <p><?= $comment['comment_date_fr']?></p>

</div>

<?php
}
// $comments->closeCursor();
$content = ob_get_clean();
require('view/frontend/template.php');
?>