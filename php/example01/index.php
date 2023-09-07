<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>PHP I</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />
</head>

<body>
    <h1>PHP I</h1>
    <?php
    $names = [
        'Peter',
        'Ariane',
        'Clemens',
        'Ida',
        'Cosmo',
        'Mathilda',
        'Frank',
        'Susanne',
    ];

    foreach ($names as $name) {
        print 'Hallo, ' . $name . '!<br/>';
    }

    ?>
</body>

</html>