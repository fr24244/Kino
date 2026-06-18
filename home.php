<?php
$movies = [
    ['id' => 1, 'title' => 'Men in Black', 'image' => 'image/e7f00b69e724b8c4db93e638687941a0_1280x720.jpeg'],
    ['id' => 2, 'title' => 'Men in Black II', 'image' => 'image/men-in-black-2.jpg'],
    ['id' => 3, 'title' => 'Men in Black 3', 'image' => 'image/maxresdefault.jpg'],
    ['id' => 4, 'title' => 'Inception', 'image' => 'image/inception-2010.webp'],
    ['id' => 5, 'title' => 'The Matrix', 'image' => 'image/keanu-reeves-b000b57ec9774787bdfe01d50658c867.jpg'],
    ['id' => 6, 'title' => 'Interstellar', 'image' => 'image/a0WP500000S1KscMAF_original.jpg'],
    ['id' => 7, 'title' => 'Avatar', 'image' => 'image/67c4edb9ed7171001ce7897c.jpg'],
    ['id' => 8, 'title' => 'Gladiator', 'image' => 'image/_104145803_gladiator_gettyuniversal.jpg'],
    ['id' => 9, 'title' => 'The Dark Knight', 'image' => 'image/811tXkUfYfL.jpg'],
    ['id' => 10, 'title' => 'Pulp Fiction', 'image' => 'image/rs-18853-20140521-pulpfiction-x1800-1400688719.webp'],
    ['id' => 11, 'title' => 'Fight Club', 'image' => 'image/4d2e5508-206c-40a5-8de4-71e7998daf46-data.jpg'],
    ['id' => 12, 'title' => 'Forrest Gump', 'image' => 'image/forrestgump01-978x652.jpg']
];
?>

<div class="header-nav">
    <h1>Cinematickets</h1>

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
        <a href="index.php?page=seats&movie_id=<?php echo $movie['id']; ?>" class="movie-card" style="flex-direction: column; height: auto; padding: 10px; gap: 10px;">
            <img src="<?php echo htmlspecialchars($movie['image']); ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>" style="width: 100%; height: 260px; object-fit: cover; border-radius: 4px;">
            <span style="margin-top: 5px; font-weight: 600; text-align: center;"><?php echo htmlspecialchars($movie['title']); ?></span>
        </a>
    <?php endforeach; ?>
</div>