//Vérification suppression d'un commentaire
function check_formCom() {
    var comment = document.getElementById('deleteCom').value;

    if (comment === 'SUPPRIMER') {
        alert('Commentaire supprimé');
        return true;

    } else {
        alert('Le commentaire ne peux pas être supprimé');
        return false;
    }
}

//Vérification suppression d'un article
function check_formPost() {
    var article = document.getElementById('deletePost').value;

    if (article === 'SUPPRIMER') {
        alert('Article supprimé');
        return true;

    } else {
        alert('L\'article ne peux pas être supprimé');
        return false;
    }
}

//Vérification suppression d'un utilisateur
function check_formUser() {
    var user = document.getElementById('deletePost').value;

    if (user === 'SUPPRIMER') {
        alert('Article supprimé');
        return true;

    } else {
        alert('L\'article ne peux pas être supprimé');
        return false;
    }
}

function postCom() {

    var postCom = document.getElementById('comment').value;

    if (postCom == '') {
        alert('Veuillez entrer un commentaire');
        return false;
    } else {
        alert('Commentaire envoyé');
        return true;
    }
}

function check_addPost() {
    var postTitle = document.getElementById('title').value;
    var post = document.getElementById('post').value;

    if (postTitle == '' && post === '') {
        alert('Veuillez remplir tous les champs');
        return false;
    } else {
        alert('Article ajouté');
        return true;
    }
}
function check_editPost() {
    var titleEdit = document.getElementById('titleEdit').value;
    var postEdit = document.getElementById('postEdit').value;

    if (titleEdit == '' && postEdit === '') {
        alert('Veuillez remplir tous les champs');
        return false;
    } else {
        alert('Article modifié avec succès');
        return true;
    }
}

function check_editComment() {
    var upCom = document.getElementById('updateComment').value;


    if (upCom == '') {
        alert('Veuillez remplir tous les champs');
        return false;
    } else {
        alert('Commentaire modifié avec succès');
        return true;
    }
}
function unpublished() {
    alert('Commentaire désapprouvé');
    return true;
}
function published() {
    alert('Commentaire publié');
    return true;
}
function commentOk() {
    alert('Commentaire approuvé');
    return true;
}