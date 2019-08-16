<?php ob_start(); ?>

<form action="index.php?action=addPost" method="POST">

    <input type="text" id="postTitle" placeholder="Titre de l'article" />
    <br />
    <!-- Genre du texte -->
    <br />
    <button id="bold" onclick="commande('bold');" style="font-weight: bold;">B</button>

    <button id="italic" onclick="commande('italic');" style="font-style: italic;">I</button>

    <button id="underline" onclick="commande('underline');" style="font-style: underline;">U</button>

    <!-- Alignement du texte -->

    <button id="align-left"><i class="fas fa-align-left" onclick="commande('justifyleft');"></i></button>

    <button id="align-center"><i class="fas fa-align-center" onclick="commande('justifycenter');"></i></button>

    <button id="align-right"><i class="fas fa-align-right" onclick="commande('justifyright');"></i></button>

    <button id="align-justify"><i class="fas fa-align-justify" onclick="commande('justifyfull');"></i></button>

    <!-- Insérer un lien -->
    <button id="" onclick="commande('createLink');"><i class="fas fa-link"></i></button>

    <!-- Insérer une image -->
    <button id="" onclick="commande('insertImage');"><i class="far fa-image"></i></button>

    <!-- Titres  -->
    <select onchange="commande('formatBlock', this.value); this.selectedIndex = 0;">
        <option value="">Titre</option>
        <option value="h1">Titre 1</option>
        <option value="h2">Titre 2</option>
        <option value="h3">Titre 3</option>
        <option value="h4">Titre 4</option>
        <option value="p">Paragraphe</option>
    </select>

    <!-- Polices -->
    <select onchange="commande('fontname', this.value); this.selectedIndex = 0;">
        <option value="">Police</option>
        <option value="arial">Arial</option>
        <option value="courrier">Courrier</option>
        <option value="georgia">Georgia</option>
        <option value="helvetica">Helvetica</option>
        <option value="times">Times</option>
        <option value="trebuchet">Trebuchet</option>
        <option value="verdana">Verdana</option>
    </select>

    <br /><br />
    <div id="editor" contentEditable class="border border-primary"></div>

    <input type="submit" class="btn btn-primary" value="Publier">
</form>

<?php $content = ob_get_clean(); ?>

<?php require('../Frontend/template.php'); ?>