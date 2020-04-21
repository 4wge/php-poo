<?php
include 'Form.php';

// Des variables par défaut pour vos tests.

// YOUR CODE HERE
$nom = 'Chauvac';
$prenom = 'Henri';

$form = new Form('action', 'method');  // créer le début du formulaire
$form->addTextField('nom',$nom); // créer un input de type texte avec comme valeur par défaut $nom
$form->addTextField('prenom',$prenom); // créer un input de type texte avec comme valeur par défaut $prenom
$form->addSubmitButton('Modifier'); //Créer un bouton pour soumettre le formulaire se nommant Modifier

echo $form->build(); // générer le formulaire