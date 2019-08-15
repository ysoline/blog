<?php ob_start(); ?>

<script>
function commande(nom, argument) {
    if (typeof argument === 'undefined') {
        argument = '';
    }
    document.execCommand(nom, false, argument);

    switch (nom) {
        case "createLink":
            argument = prompt("Quelle est l'adresse du lien ?");
            break;
    }
}
</script>

<input type="button" value="G" class="btn btn-outline-primary" style="font-weight:bold;" onclick="commande('bold');" />
<input type="button" value='I' class="btn btn-outline-primary" style="font-style:italic;"
    onclick="commande('italic')" />
<input type='button' value="S" class="btn btn-outline-primary" style="text-decoration:underline;"
    onclick="commande('underline')" />
<input type="button" value="Lien" class="btn btn-outline-primary" onclick="commande('createLink')" />
<select onchange="commande('heading', this.value); this.selectedIndex =0;">
    <option value="">Titre</option>
    <option value="h1">Titre h1</option>
    <option value="h2">Titre h2</option>
    <option value="h3">Titre h3</option>
    <option value="h4">Titre h4</option>
    <option value="h5">Titre h5</option>
    <option value="h6">Titre h6</option>
</select>

<div id=" editor" contenteditable class="border border-primary"></div>

<?php $content = ob_get_clean(); ?>

<?php require('../Frontend/template.php'); ?>