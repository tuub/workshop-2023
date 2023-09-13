<?php
// Fehlermeldungen anzeigen
error_reporting(E_ALL);
ini_set('display_errors', true);

$database = 'data/database.db';
$sql = "SELECT * FROM songs WHERE artist = '" . $_POST['artist'] . "'";

echo '<p>';
echo "SELECT * FROM songs WHERE artist = '" . $_POST['artist'] . "'";
echo '</p>';

// Schlecht

// Datenbank verbinden
$db = new SQLite3($database);
$results = $db->query($sql);

echo '<p>';
echo '<h4>Schlecht</h4>';
while ($row = $results->fetchArray()) {
    var_dump($row);
}
echo '</p>';

// Gut

// Datenbank verbinden
$db = new PDO('sqlite:' . $database);
$sql = "SELECT * FROM songs WHERE artist = :artist";
$stmt = $db->prepare($sql);
$stmt->bindValue(':artist', $_POST['artist']);
$stmt->execute();
$results = $stmt->fetchAll();

echo '<p>';
echo '<h4>Gut</h4>';
foreach ($results as $row) {
    var_dump($row);
}
echo '</p>';
