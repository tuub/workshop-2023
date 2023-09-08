<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>PHP VI</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />
</head>

<body>
    <h1>PHP VI</h1>

    <p>Wir bauen eine Playlist.</p>

    <!-- Link -->
    <div>
        <a href="reset_db.php">Datenbank zurücksetzen</a>
    </div>

    <!-- Formular -->
    <div>
        <form action="form.php" method="post">
            <input type="hidden" name="add_fake" />
            <input type="submit" value="Zufälligen Eintrag hinzufügen" />
        </form>
    </div>

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
            // Composer Klassenlader einbinden
            require 'vendor/autoload.php';

            // Datenbank verbinden
            use Medoo\Medoo;

            $database = 'data/database.db';

            $db = new Medoo([
                'type' => 'sqlite',
                'database' => $database,
            ]);

            $songs = $db->select('songs', [
                'artist',
                'title',
                'duration'
            ]);

            foreach ($songs as $song) {
                echo '<tr>';
                echo '<td>' . $song['artist'] . '</td>';
                echo '<td>' . $song['title'] . '</td>';
                echo '<td>' . $song['duration'] . '</td>';
                echo '</tr>';
            }
            ?>

            <tr>
                <td colspan="2"><strong>Playlistlänge</strong></td>
                <td>
                    <?php
                    $total_duration = $db->sum('songs', 'duration');
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