<?php


$host = getenv('DB_HOST') ?: 'db';
$db   = getenv('DB_NAME') ?: 'DB_test';
$user = getenv('DB_USER') ?: 'Tom1419';
$pass = getenv('DB_PASS') ?: 'Bulle2025';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";


try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    echo "<h3> Erreur de connexion à la base :</h3>";
    echo htmlspecialchars($e->getMessage());
    exit();
}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<p>Formulaire non soumis.</p>";
    echo '<p><a href="index.php">Retour au formulaire</a></p>';
    exit();
}


$prenom = trim($_POST['prenom'] ?? '');
$nom = trim($_POST['nom'] ?? '');
$repas = trim($_POST['repas_prefere'] ?? '');
$animal = trim($_POST['animal_totem'] ?? '');
$email = trim($_POST['email'] ?? '');


$errors = [];
if ($prenom === '') $errors[] = "Le prénom est requis.";
if ($nom === '') $errors[] = "Le nom est requis.";
if ($repas === '') $errors[] = "Le repas préféré est requis.";
if ($animal === '') $errors[] = "L'animal totem est requis.";
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Un email valide est requis.";

if (!empty($errors)) {
    echo "<h3> Problèmes rencontrés :</h3>";
    foreach ($errors as $e) {
        echo "<p>- " . htmlspecialchars($e) . "</p>";
    }
    echo '<p><a href="index.php">Retour au formulaire</a></p>';
    exit();
}


$sql = "INSERT INTO t_utilisateur (prenom, nom, repas_prefere, animal_totem, email)
        VALUES (:prenom, :nom, :repas, :animal, :email)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":prenom" => $prenom,
        ":nom" => $nom,
        ":repas" => $repas,
        ":animal" => $animal,
        ":email" => $email
    ]);

    echo "<h2> Données enregistrées avec succès !</h2>";
    echo '<p><a href="index.php">Retour au formulaire</a></p>';

} catch (PDOException $e) {
    if ($e->getCode() === "23000") { 
        
        echo "<h3> Cet email est déjà présent dans la base.</h3>";
        echo '<p><a href="index.php">Retour</a></p>';
    } else {
        echo "<h3> Erreur SQL :</h3>";
        echo htmlspecialchars($e->getMessage());
    }
}
