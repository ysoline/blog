<?php
foreach($posts as $post): ?>
<h2><?= $post->title() ?></h2>
<time><?= $post->datePost() ?> </time>

<?php endforeach; ?>
