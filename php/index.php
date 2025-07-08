<?php
$host = 'db';
$dbname = 'bddCreateOnPhpMyAdmin';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    // Active les erreurs PDO en exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !";
    echo "<br>";
    echo "salut";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <input type="text" name="nomDeLaCouleur">
        <input type="submit" name="envoiDonneesCouleur" value="Envoyé">
    </form>
</body>

</html>

<?php
 //Avec le submit + if isset $_POST -> envoi de données.  
if (isset($_POST['envoiDonneesCouleur'])) {
//Declaration variable évite concaténation en requete -> facilite la demande
$couleur = $_POST['nomDeLaCouleur'];
   //Requete sql pour insérer value en BDD.
    $sql="INSERT INTO `couleur`(`nomCouleur`) VALUES ('$couleur')";
    echo "C'est ok !";
}


?>