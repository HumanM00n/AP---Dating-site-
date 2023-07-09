<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "siterencontre";

    try {
        // Connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $pseudo = $_POST['pseudo'];
        $sexe = $_POST['sexe'];
        $dateNaissance = $_POST['dateNaissance'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $centresInteret = implode(", ", $_POST['interests']); // Convertit les centres d'intérêt en une chaîne de caractères séparée par des virgules
        $bio = $_POST['bio'];
        $paysVisite = $_POST['paysVisite'];

        // Construction de la requête SQL d'insertion
        $sql = "INSERT INTO Utilisateur (Nom, Prenom, Pseudo, Genre, DateNaissance, Telephone, Email, Centre_interet, Bio, pays_visite)
                VALUES (:nom, :prenom, :pseudo, :sexe, :dateNaissance, :telephone, :email, :centresInteret, :bio, :paysVisite)";

        // Préparation de la requête
        $stmt = $conn->prepare($sql);

        // Liaison des valeurs des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':dateNaissance', $dateNaissance);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':centresInteret', $centresInteret);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':paysVisite', $paysVisite);
        

        // Exécution de la requête
        $stmt->execute();

       // Redirection vers la page de chargement
      header("Location: chargement.html");
      exit(); 


    } catch (PDOException $e) {
        echo "Erreur lors de l'inscription : " . $e->getMessage();
    }

    // Fermeture de la connexion à la base de données
    $conn = null;
}
?>



<!doctype html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Inscription</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../CSS/universal-style.css">

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



  <title>INSCRIPTION</title>
</head>

<body>

<header id="header">
    <div id="logo">
      <img src="../image/logo-gif-unscreen.gif" alt="Logo" height="50">
    </div>
    <nav id="navigation">
      <ul>
        <li><a href="../PHP/accueil-site.html">Accueil</a></li>
        <li><a href="#">Quelle est notre promesse?</a></li>
      </ul>
    </nav>
  </header>



  <center>
    <h2>Je m'inscris</h2>
  </center>

  <!-- Formulaire d'inscription -->
  <div id="form-container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <h3>Qui suis-je ?</h3>
    <div class="identifiants">
      <label for="prenom">Mon prénom*</label>
      <input type="text" id="prenom" name="prenom" required><br><br>

      <label for="nom">Mon nom* :</label>
      <input type="text" id="nom" name="nom" required><br><br>

      <label for="pseudo">Mon pseudo</label>
      <input type="text" id="pseudo" name="pseudo" required><br>
      <h6>C'est ainsi queles autres te verront</h6>
    </div>
    <br>

    <h3>Qui je suis ?</h3>
    <div class="informations">
      <input type="radio" id="homme" name="sexe" value="homme">
      <label for="homme">Un homme</label>

      <input type="radio" id="femme" name="sexe" value="femme">
      <label for="femme">Une femme</label>

      <input type="radio" id="nonPrecise" name="sexe" value="nonPrecise">
      <label for="nonPrecise">Je préfère ne pas préciser</label><br><br>

      <label for="dateNaissance">Ma date de naissance :</label>
      <input type="date" id="dateNaissance" name="dateNaissance" required><br><br>

      <label for="telephone">Mon numéro de téléphone* :</label>
      <input type="tel" id="telephone" name="telephone" required><br><br>

      <label for="email">Mon adresse e-mail* :</label>
      <input type="email" id="email" name="email" required><br>

      <label for="bio">Ma Bio :</label>
      <input type="text" id="bio" name="bio" required><br>

      <label for="paysVisite">Mes voyages</label>
      <input type="text" id="paysVisite" name="paysVisite" required><br>
      
    </div>
    <h2>Mes centres d'interet</h2>
    <div class="checkbox-row">
            <label class="checkbox-label">
                <input type="checkbox" name="interests[]" value="sport"> Sport
            </label>
            
            <label class="checkbox-label">
                <input type="checkbox" name="interests[]" value="jeuxvideo"> Jeux vidéo
            </label>
            
            <label class="checkbox-label">
                <input type="checkbox" name="interests[]" value="cuisine"> Cuisine
            </label>
        </div>
        
        <div class="checkbox-row">
            <label class="checkbox-label">
                <input type="checkbox" name="interests[]" value="voyager"> Voyager
            </label>
            
            <label class="checkbox-label">
                <input type="checkbox" name="interests[]" value="dessiner"> Dessiner
            </label>
            
            <label class="checkbox-label">
                <input type="checkbox" name="interests[]" value="lire"> Lire
            </label>
        </div>
        
        <div class="checkbox-row">
            <label class="checkbox-label">
                <input type="checkbox" name="interests[]" value="sortir"> Sortir avec des amis
            </label>
            
            <label class="checkbox-label">
                <input type="checkbox" name="interests[]" value="cinema"> Aller au cinéma
            </label>
            
            <label class="checkbox-label">
                <input type="checkbox" name="interests[]" value="maison"> Netflix and chill
            </label>
        </div>
        
    
      <br><br>

    <h6>
      <p>Ne vous inquiétez pas, tous les champs marqués par une "*" ne seront pas visibles par les autres utilisateurs.</p>
    </h6><br>

    <input type="submit" value="Enregistrer">
  </form>
  </div>

  <footer id="footer">
    <div id="social-media-section">
      <!-- liens réseaux sociaux fictifs -->
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
  </footer>
</body>
</html>