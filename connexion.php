// Connexion a la base de donnée ATTENTION ici la base de donnée est appler siterencontre a vous de la changer en fonction de comment vous l'avez appeler 
<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'siterencontre';
$username = 'root';
$password = ''; // Remplacez "votre_mot_de_passe" par le mot de passe de votre base de données

try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
