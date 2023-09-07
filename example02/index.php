<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>PHP II</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />
</head>

<body>
    <h1>PHP II</h1>
    <p>Wie lautet ein Name rückwärts?</p>
    <form action="index.php" method="get">
        <p>
            <label for="name">Ihr Name</label>
            <input type="text" id="name" name="name" />
        </p>
        <p>
            <input type="submit" value="Abschicken" />
        </p>
    </form>

    <?php
    if ($_GET['name']) {
        $reversed_name = strrev($_GET['name']);
        $reversed_name_lowercase = strtolower($reversed_name);
        $reversed_name_lowercase_capitalized = ucfirst($reversed_name_lowercase);

        //$reverse_name = ucfirst(strtolower(strrev($_GET['name'])));

        print 'Dein Name lautet rückwärts <strong>' . $reversed_name_lowercase_capitalized . '</strong>.<hr/>';
    }
    ?>
</body>

</html>