<?php
$movies = [
    ['id' => 1, 'title' => 'Men in Black'],
    ['id' => 2, 'title' => 'Men in Black II'],
    ['id' => 3, 'title' => 'Men in Black 3'],
    ['id' => 4, 'title' => 'Inception'],
    ['id' => 5, 'title' => 'The Matrix'],
    ['id' => 6, 'title' => 'Interstellar'],
    ['id' => 7, 'title' => 'Avatar'],
    ['id' => 8, 'title' => 'Gladiator'],
    ['id' => 9, 'title' => 'The Dark Knight'],
    ['id' => 10, 'title' => 'Pulp Fiction'],
    ['id' => 11, 'title' => 'Fight Club'],
    ['id' => 12, 'title' => 'Forrest Gump']
];
?>

<div class="header-nav">
    <h1>CinemaTickets</h1>

    <form method="GET" action="index.php" style="margin: 0 20px; flex: 1; max-width: 300px;">
        <input type="hidden" name="page" value="home">
        <input type="text" name="search" placeholder="Film suchen..." style="width: 100%; padding: 8px 12px; background: #422222; border: 1px solid #5c2c2c; color: white; border-radius: 5px;">
    </form>

    <div class="nav-buttons">
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
            <div style="text-align: right; margin-right: 15px; font-size: 14px;">
                <span><strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></span>
            </div>
            <a href="index.php?page=logout" class="btn-action">Abmelden</a>
        <?php else: ?>
            <a href="index.php?page=login" class="btn-action">Login</a>
        <?php endif; ?>
    </div>
</div>

<hr><br>
<h3>Filme im Programm</h3>

<div class="movie-grid">
    <?php foreach ($movies as $movie): ?>
        <a href="index.php?page=seats&movie_id=<?php echo $movie['id']; ?>" class="movie-card">
            <?php echo htmlspecialchars($movie['title']); ?>
        </a>
    <?php endforeach; ?>
</div>