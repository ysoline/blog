function commande(nom, argument) {
    if (typeof argument === 'undefined') {
      argument = '';
    }
    switch(nom){
  case "createLink":
          argument = prompt("Lien à insérer");
      break;
  
  case "insertImage":
      argument = prompt("Adresse de l'image à insérer"); 
  break;
  
  }
  
  // Ajoute une balise HTML allant de h1 à h4 et de format paragraphe à la ligne sélectionnée 
  
  document.execCommand('formatBlock', false, 'h1'); 
  document.execCommand('formatBlock', false, 'h2');
  document.execCommand('formatBlock', false, 'h3');
  document.execCommand('formatBlock', false, 'h4');
  document.execCommand('formatBlock', false, 'p');
  
  // Ajoute une police d'écriture définie à la ligne ou le mot sélectionné
  
  document.execCommand('fontname', false, 'Arial');
  document.execCommand('fontname', false, 'Courrier');
  document.execCommand('fontname', false, 'Georgia');
  document.execCommand('fontname', false, 'Helvetica');
  document.execCommand('fontname', false, 'Times');
  document.execCommand('fontname', false, 'Trebuchet');
  document.execCommand('fontname', false, 'Verdana');
  
  
  document.execCommand(nom, false, argument);
  }