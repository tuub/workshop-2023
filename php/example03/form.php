<p>
    Ihr Name ist <strong><?= $_POST['name'] ?></strong> und Sie sind stolze <strong><?= $_POST['age'] ?></strong> Jahre alt.
</p>
<p>
    Das liegt sicherlich daran, dass Sie so viel und gern <strong><?= $_POST['food'] ?></strong> essen.
</p>

<hr />
Der HTTP-Request war:
<?php
var_dump($_POST);
?>
<hr />
