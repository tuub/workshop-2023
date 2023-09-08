<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>PHP VII</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />
</head>

<body>
<h1>PHP VII</h1>

<p>Wir fragen eine API ab.</p>

<!-- Formular -->
<form action="form.php" method="post">
    <p>
        <label for="query">Suchbegriff</label>
        <input type="text" id="query" name="query" />
    </p>
    <p>
        <label for="api">API</label>
        <select id="api" name="api">
            <option value="WIKIPEDIA">Wikipedia</option>
            <option value="TVMAZE">TV Maze</option>
        </select>
    </p>
    <p>
        <input type="submit" value="Suchen" />
    </p>
</form>

</body>
</html>





