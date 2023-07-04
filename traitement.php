// Exemple code pour le traitement php ici debut de code pour mettre les donnée mis dans le formulaire d'inscription dans la base de donnée

<?php
// Inclure le fichier de connexion à la base de données
require_once('connexion.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs des champs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $sexe = $_POST['sexe'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    // Vérifier que les valeurs ne sont pas vides avant d'exécuter la requête
    if (!empty($nom) && !empty($prenom) && !empty($pseudo) && !empty($sexe) && !empty($email) && !empty($telephone)) {
        // Échapper les valeurs pour éviter les problèmes de sécurité liés aux injections SQL
        $nom = $connexion->quote($nom);
        $prenom = $connexion->quote($prenom);
        $pseudo = $connexion->quote($pseudo);
        $sexe = $connexion->quote($sexe);
        $email = $connexion->quote($email);
        $telephone = $connexion->quote($telephone); //il restera juste a ajouter les autres trucs

        // Exécuter la requête SQL avec les variables échappées
        $requete = "INSERT INTO utilisateur (Nom, Prenom, Pseudo, Genre, Email, Téléphone) 
                    VALUES ($nom, $prenom, $pseudo, $sexe, $email, $telephone)";
        $connexion->query($requete);

        // Rediriger l'utilisateur vers une autre page après l'inscription réussie
        header("Location: inscription_reussie.html"); // affchicher la page de profils avec tout les éléments 
        exit();
    } else {
        // Gérer le cas où des champs sont vides
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>
