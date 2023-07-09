<?php
// Connexion à la base de données site-rencontre
$host = 'localhost';
$dbname = 'siterencontre';
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
?>