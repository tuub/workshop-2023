<?php
// Datenbank verbinden
$database = 'data/database.db';
$db = new PDO('sqlite:' . $database);

// Fehlermeldungen anzeigen
error_reporting(E_ALL);
ini_set('display_errors', true);

// Daten löschen
$db->exec("DELETE FROM songs;");

// Wieder auf vorherige Seite umleiten
header("Location: index.php");
exit();