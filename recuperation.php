<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'site-rencontre';
$username = 'root';
$password = '';

try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Requête pour récupérer la dernière entrée de la base de données
$query = "SELECT Nom, Prenom, Pseudo, Sexe, Email, Téléphone, DateNaissance, Centre_interet, Pays_visite, Pays_a_visiter FROM Utilisateur ORDER BY ID_utilisateur DESC LIMIT 1";
$stmt = $connexion->prepare($query);
$stmt->execute();

// Vérifier si des résultats sont retournés
if ($stmt->rowCount() > 0) {
    $utilisateur = $stmt->fetch();

    // Afficher les informations de l'utilisateur dans une ligne du tableau
    echo "<tr>";
    echo "<td>" . $utilisateur['Nom'] . "</td>";
    echo "<td>" . $utilisateur['Prenom'] . "</td>";
    echo "<td>" . $utilisateur['Pseudo'] . "</td>";
    echo "<td>" . $utilisateur['Genre'] . "</td>";
    echo "<td>" . $utilisateur['Email'] . "</td>";
    echo "<td>" . $utilisateur['Téléphone'] . "</td>";
    echo "<td>" . $utilisateur['DateNaissance'] . "</td>";
    echo "<td>" . $utilisateur['Centre_interet'] . "</td>";
    echo "<td>" . $utilisateur['Pays_visite'] . "</td>";
    echo "<td>" . $utilisateur['Pays_a_visiter'] . "</td>";
    echo "</tr>";
} else {
    echo "Aucune entrée trouvée dans la base de données.";
}
?>
