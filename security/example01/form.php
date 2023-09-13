<?php

// Schlecht
echo "Username: " . $_POST['username'];

// Gut
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
echo "Username: " . $username;
