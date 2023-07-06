<?php
// Fichier : connexion.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "site-rencontre";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données";
} catch (PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
}

// Exécuter la requête SQL pour récupérer les informations du dernier utilisateur inscrit
$requete = "SELECT * FROM utilisateur ORDER BY ID_utilisateur DESC LIMIT 1";
$resultat = $bdd->query($requete);

// Vérifier s'il y a des résultats
if ($resultat->rowCount() > 0) {
    // Parcourir les résultats pour afficher les informations du profil
    $utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profil</title>
</head>
<body>
    <header></header>
    <h1>Profil de <?php echo $utilisateur['Pseudo']; ?></h1>
    <p><strong>Nom:</strong> <?php echo $utilisateur['Nom']; ?></p>
    <p><strong>Prénom:</strong> <?php echo $utilisateur['Prenom']; ?></p>
    <p><strong>Genre:</strong> <?php echo $utilisateur['Genre']; ?></p>
    <p><strong>Email:</strong> <?php echo $utilisateur['Email']; ?></p>
    <p><strong>Téléphone:</strong> <?php echo $utilisateur['Téléphone']; ?></p>
    <p><strong>Date de Naissance:</strong> <?php echo $utilisateur['DateNaissance']; ?></p>
    <p><strong>Centre d'intérêt:</strong> <?php echo $utilisateur['Centre_interet']; ?></p>
    <p><strong>Pays visités:</strong> <?php echo $utilisateur['Pays_visite']; ?></p>
    <p><strong>Pays à visiter:</strong> <?php echo $utilisateur['Pays_a_visiter']; ?></p>
    <!-- Ajoutez ici d'autres informations que vous souhaitez afficher -->
    <footer></footer>
</body>
</html>
<?php
} else {
    echo "Aucun utilisateur trouvé.";
}
?>

