<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Formular mit PHP 2</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />
    <link rel="icon" href="favicon.png">
</head>

<body>
    <h1>Formular mit PHP 2</h1>

    <!-- Link -->
    <div>
        <a href="create_db.php">Datenbank zurücksetzen</a>
    </div>

    <!-- Formular -->
    <div>
        <form action="form.php" method="post">
            <p>
                <label for="artist">Künstler*in</label>
                <input type="text" id="artist" name="artist" />
            </p>
            <p>
                <label for="name">Songtitel</label>
                <input type="text" id="title" name="title" />
            </p>
            <p>
                <label for="duration">Länge</label>
                <input type="text" id="duration" name="duration" />
            </p>
            <p>
                <input type="submit" value="Los, abschicken!" />
            </p>
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
            $db = new SQLite3('database.db');
            $query = $db->query("SELECT artist, title, duration from songs");
            while ($row = $query->fetchArray()) {
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
                    $query = $db->query("SELECT SUM(duration) as total_duration from songs");
                    $result = $query->fetchArray();

                    if ($result['total_duration']) {
                        echo $result['total_duration'];
                    } else {
                        echo '0!';
                    }
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