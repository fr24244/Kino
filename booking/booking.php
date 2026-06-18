<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seats'])) {
    $seats_list = implode(', ', $_POST['seats']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
} else {
    // Falls niemand Sitze gewählt hat, zurück zur Startseite
    header('Location: index.php?page=home');
    exit;
}
?>

<div class="auth-container" style="text-align: center; max-width: 500px;">
    <h2 style="color: #28a745;"> Buchung erfolgreich!</h2>
    <br>
    <div style="text-align: left; background: #1a1515; padding: 15px; border-radius: 5px; border: 1px solid #5c2c2c; line-height: 1.6;">
        <p><strong>Deine Sitze:</strong> Platz <?php echo $seats_list; ?></p>
        <p><strong>Bestätigung an:</strong> <?php echo $email; ?></p>
        <p><strong>Telefonnummer:</strong> <?php echo $phone; ?></p>
    </div>
    <br>
    <a href="index.php?page=home" class="btn-action" style="display: inline-block;">Zur Startseite</a>
</div>