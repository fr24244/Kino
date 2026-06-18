<?php
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formulardaten abfangen (Könnten hier validiert werden)
    $username = $_POST['username'] ?? '';

    if (!empty($username)) {
        // Ohne DB leiten wir den Nutzer einfach direkt zum Login weiter
        header('Location: index.php?page=login');
        exit;
    } else {
        $msg = 'Registrierung fehlgeschlagen.';
    }
}
?>

<div class="auth-container">
    <h2>Registrieren</h2>
    <?php if ($msg): ?> <p style="color: red;"><?php echo $msg; ?></p> <?php endif; ?>
    <form method="POST">
        <div class="form-group"><input name="vorname" placeholder="Vorname" required></div>
        <div class="form-group"><input name="nachname" placeholder="Nachname" required></div>
        <div class="form-group"><input type="date" name="birthdate" required></div>
        <div class="form-group"><input type="email" name="email" placeholder="Email" required></div>
        <div class="form-group"><input name="username" placeholder="Wunsch-Username" required></div>
        <div class="form-group"><input type="password" name="password" placeholder="Passwort" required></div>
        <button type="submit" class="btn-action" style="width: 100%; padding: 12px;">Konto erstellen</button>
    </form>
</div>