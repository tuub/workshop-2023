<?php
// Fehlermeldungen anzeigen
error_reporting(E_ALL);
ini_set('display_errors', true);

// Composer Klassenlader einbinden
require 'vendor/autoload.php';

// Datenbank verbinden
use Medoo\Medoo;
use Faker\Factory;

// Faker initialiseren
$faker = Factory::create();

$database = 'data/database.db';

$db = new Medoo([
    'type' => 'sqlite',
    'database' => $database,
]);

// Formulardaten in Datenbank speichern
$db->insert('songs', [
    'artist' => $faker->name,
    'title' => $faker->realText(35),
    'duration' => $faker->randomDigitNotNull
]);

// Auf vorherige Seite umleiten
header("Location: index.php");
exit();