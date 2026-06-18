<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/config.php';

// Seite aus der URL holen (Standard ist 'home')
$page = $_GET['page'] ?? 'home';

if (array_key_exists($page, PAGES)) {
    $file = PAGES[$page];
} else {
    $file = 'home.php';
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>CinemaTickets</title>
    <link rel="stylesheet" href="movies/movie.css">
</head>
<body>

<div class="main-wrapper">
    <?php include $file; ?>
</div>

</body>
</html>