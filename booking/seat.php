<?php
if (session_status() === PHP_SESSION_NONE) session_start();
// Holt die ID des ausgewählten Films
$movie_id = $_GET['movie_id'] ?? '1';
?>

<h2>Sitze wählen</h2>
<form action="index.php?page=booking" method="POST">
    <input type="hidden" name="movie_id" value="<?php echo htmlspecialchars($movie_id); ?>">

    <div style="display: grid; grid-template-columns: repeat(5, 50px); gap: 10px; margin: 20px 0;">
        <?php for ($i = 1; $i <= 20; $i++): ?>
            <label style="background: #422222; padding: 10px; text-align: center; border-radius: 4px; cursor: pointer; display: inline-block;">
                <input type="checkbox" name="seats[]" value="<?php echo $i; ?>"> <?php echo $i; ?>
            </label>
        <?php endfor; ?>
    </div>

    <br>
    <h3>Deine Kontaktdaten</h3>
    <input type="email" name="email" placeholder="E-Mail" required style="width:100%; padding:10px; margin-bottom:10px; background:#422222; color:white; border:1px solid #5c2c2c; border-radius:5px;">
    <input type="tel" name="phone" placeholder="Telefonnummer" required style="width:100%; padding:10px; background:#422222; color:white; border:1px solid #5c2c2c; border-radius:5px;">

    <br><br>
    <button type="submit" class="btn-action" style="width:100%; padding: 12px;">Verbindlich Buchen</button>
</form>