<?php
/*
 * Exemples PDO - Prepared Statements
 * Base de donnees : world
 * Decommenter UN exemple a la fois pour les tester.
 * ATTENTION : INSERT, UPDATE et DELETE modifient les donnees.
 */

// Informations de connexion
$host = 'localhost';
$dbname = 'world';
$user = 'PROG1384';
$password = 'CCNB2026';

// DSN = Data Source Name
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    $conn = new PDO($dsn, $user, $password);


    // EXEMPLE 1 : SELECT avec parametre
    $name = 'Canada';
    $sql = 'SELECT * FROM country WHERE Name = :name';
    $result = $conn->prepare($sql);
    $result->execute(['name' => $name]);
    while ($row = $result->fetch()) {
        echo htmlspecialchars($row['Name']) . '<br>';
    }

    /*
    // EXEMPLE 2 : SELECT avec LIKE
    $name = 'United';
    $sql = 'SELECT * FROM country WHERE Name LIKE :name';
    $result = $conn->prepare($sql);
    $result->execute(['name' => '%' . $name . '%']);
    while ($row = $result->fetch()) {
        echo htmlspecialchars($row['Name']) . '<br>';
    }
    */

    /*
    // EXEMPLE 3 : Lire un seul resultat avec fetch()
    $code = 'CAN';
    $sql = 'SELECT * FROM country WHERE Code = :code';
    $result = $conn->prepare($sql);
    $result->execute(['code' => $code]);
    $pays = $result->fetch();
    if ($pays) {
        echo htmlspecialchars($pays['Name']);
    }
    */

    /*
    // EXEMPLE 4 : INSERT (attention : la table country exige d'autres colonnes)
    // Exemple fonctionnel avec la table city de la base world.
    $name = 'Ville Exemple';
    $countryCode = 'CAN';
    $district = 'New Brunswick';
    $population = 1000;
    $sql = 'INSERT INTO city (Name, CountryCode, District, Population)
            VALUES (:name, :countryCode, :district, :population)';
    $result = $conn->prepare($sql);
    $result->execute([
        'name' => $name,
        'countryCode' => $countryCode,
        'district' => $district,
        'population' => $population
    ]);
    echo 'Ville ajoutee.';
    */

    /*
    // EXEMPLE 5 : UPDATE (modifie une donnee existante)
    $name = 'Ville Modifiee';
    $id = 1;
    $sql = 'UPDATE city SET Name = :name WHERE ID = :id';
    $result = $conn->prepare($sql);
    $result->execute(['name' => $name, 'id' => $id]);
    echo 'Lignes modifiees : ' . $result->rowCount();
    */

    /*
    // EXEMPLE 6 : DELETE (supprime une donnee existante)
    $id = 1;
    $sql = 'DELETE FROM city WHERE ID = :id';
    $result = $conn->prepare($sql);
    $result->execute(['id' => $id]);
    echo 'Lignes supprimees : ' . $result->rowCount();
    */

    /*
    // EXEMPLE 7 : bindValue() avec un entier
    $population = 100000000;
    $sql = 'SELECT * FROM country WHERE Population > :population';
    $result = $conn->prepare($sql);
    $result->bindValue(':population', $population, PDO::PARAM_INT);
    $result->execute();
    while ($row = $result->fetch()) {
        echo htmlspecialchars($row['Name']) . '<br>';
    }
    */
} catch (PDOException $e) {
    echo 'Erreur de base de donnees : ' . $e->getMessage();
}
