<?php
// Fehlermeldungen anzeigen
error_reporting(E_ALL);
ini_set('display_errors', true);

// Composer Klassenlader einbinden
require 'vendor/autoload.php';

// Datenbank verbinden
use Medoo\Medoo;

$database = 'data/database.db';

$db = new Medoo([
    'type' => 'sqlite',
    'database' => $database,
]);

// Alle Daten aus Datenbank löschen
$db->delete('songs', []);

// Auf vorherige Seite umleiten
header("Location: index.php");
exit();