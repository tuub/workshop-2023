<?php

$db = new SQLite3('database.db');
$db->exec("DELETE FROM songs;");

header("Location: index.php");
exit();
