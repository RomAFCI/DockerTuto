<?php
$host = 'db';
$dbname = 'bddVehicule';
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
        <label>Ajout couleur en BDD</label>
        <input type="text" name="nomDeLaCouleur">
        <input type="submit" name="envoiDonneesCouleur" value="Envoyé une couleur">
        <br>
        <label>Ajout type de véhicule en BDD</label>
        <input type="text" name="nomTypeVehicule">
        <input type="submit" name="envoiDonneesType" value="Envoyé un type de véhicule">
    </form>

    <?php

    $sqlCouleur = "SELECT * FROM `couleur`";
    $stmtCouleur = $pdo->prepare($sqlCouleur);
    $stmtCouleur->execute();
    $resultCouleurs = $stmtCouleur->fetchAll(PDO::FETCH_ASSOC);
    var_dump($resultCouleurs);
    echo "<br>";
    $sqlType = "SELECT * FROM `typeVehicule`";
    $stmtType = $pdo->prepare($sqlType);
    $stmtType->execute();
    $resultTypes = $stmtType->fetchAll(PDO::FETCH_ASSOC);
    var_dump($resultTypes);


    ?>


    <form method="POST">
        <label>Ajoutez un véhicule</label>
        <input type="text" name="immatriculation">
        <select name="selectCouleur">
            <?php
            foreach ($resultCouleurs as $key => $value) {
                echo "<option value='" . $value["idCouleur"] . "'>" . $value['nomCouleur'] . "</option>";
            }
            ?>
        </select>
        <select name="selectType">
            <?php
            foreach ($resultTypes as $key => $value) {
                echo "<option value='" . $value["idType"] . "'>" . $value['nomType'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" name="envoiDonneesImmatriculation">
    </form>
</body>

</html>

<?php
//Avec le submit + if isset $_POST -> envoi de données.  
if (isset($_POST['envoiDonneesCouleur'])) {
    //Declaration variable évite concaténation en requete -> facilite la demande
    $couleur = $_POST['nomDeLaCouleur'];
    //Requete sql pour insérer value en BDD.
    $sql = "INSERT INTO `couleur`(`nomCouleur`) VALUES ('$couleur')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo "C'est ok !";
}

if (isset($_POST['envoiDonneesType'])) {
    $type = $_POST['nomTypeVehicule'];
    $sql = "INSERT INTO `typeVehicule`(`nomType`) VALUES ('$type')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo "C'est ok !";
}

if (isset($_POST['envoiDonneesImmatriculation'])) {
    $color = $_POST['selectCouleur'];
    $immatriculation = $_POST['immatriculation'];
    $type = $_POST["selectType"];
    $sql = "INSERT INTO `vehicule`(`immatriculation`, `typeVehicule`, `couleur`) VALUES ('$immatriculation','$type','$color')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo "C'est ok !";
}

?>