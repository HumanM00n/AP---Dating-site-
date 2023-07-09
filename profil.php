<?php
// Fichier : connexion.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siterencontre";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connexion réussie à la base de données";
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
    <link rel="stylesheet" type="text/css" href="../CSS/style-profil.css">
    <title>Mon profil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Le site s'adapte à la taille de l'écran -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Description du site web -->
    <meta name="description" content="Site de rencontre entre voyage addicts">
  
    <!-- Mot clé du site -->
    <meta name="keywords" content="Adopte un Globe-Trotter, site de rencontre, voyage, amitié, amour">
  
    <!-- Fav icons -->
    <link rel="icon" type="image/png" href="../image/avion2.png">
  
    <!-- Balise de langage du site -->
    <meta http-equiv="Content-Language" content="fr">
  
    <!-- Balise d'auteur -->
    <meta name="author" content="Hallier Manon - Gapy Christina - Rouy Mathis">



<!-- style de l'alerte de confirmation d'inscription -->
<style>
  .alert {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #f8f8f8;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    font-size: 14px;
  }
</style>


</head>
<body>

<div id="header">
    <div id="logo">
      <img src="../image/logo-gif-unscreen.gif" alt="Logo" height="50">
    </div>
    <div id="navigation">
      <ul>
        <li><a href="../PHP/accueil-site.html">Accueil</a></li>
        <li><a href="#">Quelle est notre promesse?</a></li>
      </ul>
    </div>
  </div>

    <h1>Profil de <?php echo $utilisateur['Pseudo']; ?></h1>
    <p><strong>Nom:</strong> <?php echo $utilisateur['Nom']; ?></p>
    <p><strong>Prénom:</strong> <?php echo $utilisateur['Prenom']; ?></p>
    <p><strong>Genre:</strong> <?php echo $utilisateur['Genre']; ?></p>
    <p><strong>Email:</strong> <?php echo $utilisateur['Email']; ?></p>
    <p><strong>Téléphone:</strong> <?php echo $utilisateur['Telephone']; ?></p>
    <p><strong>Date de Naissance:</strong> <?php echo $utilisateur['DateNaissance']; ?></p>
    <p><strong>Centre d'intérêt:</strong> <?php echo $utilisateur['Centre_interet']; ?></p>
    <p><strong>Pays visités:</strong> <?php echo $utilisateur['Pays_visite']; ?></p>
    <p><strong>BIO</strong> <?php echo $utilisateur['Bio']; ?></p>


    <div id="footer">
      <!-- liens réseaux sociaux fictifs -->
    <div id="social-media-section">
      <ul>
        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
        <li><a href="#"><i class="fab fa-snapchat-ghost"></i></a></li>
      </ul>
    </div>
    <ul>
    <li><a href="../PHP/a-propos.html">À propos</a></li>
    <li><a href="../PHP/mentions-legales.html">Mentions légales</a></li>
    </ul>
  </div>
  

    <script>
  // Fonction pour afficher l'alerte
  function showNotification(message) {
    var alertBox = document.createElement('div');
    alertBox.className = 'alert';
    alertBox.textContent = message;
    document.body.appendChild(alertBox);
    setTimeout(function() {
      alertBox.style.display = 'none';
    }, 3000); // Durée d'affichage de l'alerte en millisecondes (ici, 3 secondes)
  }

  // Appel de la fonction pour afficher l'alerte après le chargement de la page
  window.addEventListener('load', function() {
    showNotification('Félicitations, vous êtes inscrit !');
  });
</script>


 
</body>
</html>
<?php
} else {
    echo "Aucun utilisateur trouvé.";
}

?>
