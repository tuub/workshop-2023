<?php
// Fehlermeldungen anzeigen
error_reporting(E_ALL);
ini_set('display_errors', true);

// Datenbank verbinden
$database = 'data/database.db';
$db = new PDO('sqlite:' . $database);



// Daten eintragen
$sql = 'INSERT INTO songs(artist, title, duration) VALUES(:artist, :title, :duration)';
$stmt = $db->prepare($sql);
$stmt->bindValue(':artist', $_POST['artist']);
$stmt->bindValue(':title', $_POST['title']);
$stmt->bindValue(':duration', $_POST['duration']);
$stmt->execute();

// Wieder auf vorherige Seite umleiten
header("Location: index.php");
exit();
