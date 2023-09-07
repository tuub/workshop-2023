<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>PHP V</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />
</head>

<body>
<h1>PHP V</h1>

<p>Wir befüllen eine Playlist mit zufälligen Werten.</p>

<!-- Formular -->
<form action="index.php" method="post">
    <input type="hidden" name="add_fake" />
    <input type="submit" value="Zufälligen Eintrag hinzufügen" />
</form>

<form action="index.php" method="post">
    <input type="hidden" name="reset_fakes" />
    <input type="submit" value="Zufällige Einträge zurücksetzen" />
</form>

<?php
// Require Composer's autoloader.
require 'vendor/autoload.php';

// PHP-Fehlermeldungen anzeigen
error_reporting(E_ALL);
ini_set('display_errors', true);

// Datenbank aus Klasse MyDatabase einbinden
use Library\MyDatabase;
// Faker-Bibliothek einbinden
use Faker\Factory as FakerFactory;

// Datenbank initialiseren
$database = new MyDatabase('sqlite', 'localhost', 'data/database.db', []);
// Faker initialiseren
$faker = FakerFactory::create();

// Nur ausführen, wenn ein POST-Request mit dem Parameter "add_fake" über HTTP kommt
if (isset($_POST['add_fake'])) {
    $database->insert('songs', [
        "artist" => $faker->name,
        "title" => $faker->realText(30),
        "duration" => $faker->randomDigitNotNull
    ]);
}

// Nur ausführen, wenn ein POST-Request mit dem Parameter "reset_fakes" über HTTP kommt
if (isset($_POST['reset_fakes'])) {
    $database->reset('songs', []);
}
?>

<!-- Datenbankausgabe -->
<div>
    <h2>Playlist</h2>
    <table>
        <tr>
            <th>Künstler*in</th>
            <th>Songtitel</th>
            <th>Länge in Minuten</th>
        </tr>
        <?php
        $rows = $database->select('songs', ['artist', 'title', 'duration'], [], []);

        foreach ($rows as $row) {
            echo '<tr>';
            echo '<td>' . $row['artist'] . '</td>';
            echo '<td>' . $row['title'] . '</td>';
            echo '<td>' . $row['duration'] . '</td>';
            echo '</tr>';
        }
        ?>

        <tr>
            <td colspan="2"><strong>Playlistlänge</strong></td>
            <td>
                <?php
                $total_duration = $database->sum('songs', 'duration');
                echo $total_duration;
                ?>
            </td>
        </tr>

    </table>
</div>
</body>

<style>
    th {
        font-weight: bold;
        background-color: #222;
        color: #fff;
        padding: 5px;
    }
    td {
        border: 1px #000 solid;
        padding: 5px;
    }
</style>

</html>





