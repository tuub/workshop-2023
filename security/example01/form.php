<?php

// Schlecht
echo '<p>';
echo '<h4>Schlecht</h4>';

$username = $_POST['username'];
echo "Username: " . $username;

echo '</p>';

// Gut
echo '<p>';
echo '<h4>Gut</h4>';

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
echo "Username: " . $username;

echo '</p>';
