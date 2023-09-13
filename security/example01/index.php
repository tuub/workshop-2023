<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Security I</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />
</head>

<body>
<h1>Security I</h1>

<form action="form.php" method="post">
    <input type="text" name="username" value="<script>alert('Böser Code')</script>" />
    <input type="submit" value="Bösen Code abschicken" />
</form>

</body>
</html>
