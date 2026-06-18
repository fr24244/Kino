<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';

// Statische Benutzerliste als Ersatz für die Datenbank
$mock_users = [
    [
        'id' => 1,
        'username' => 'admin',
        'password' => 'admin123'
    ],
    [
        'id' => 2,
        'username' => 'schueler',
        'password' => 'geheim'
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $user_found = null;

    // Suchen nach dem passenden Benutzer
    foreach ($mock_users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $user_found = $user;
            break;
        }
    }

    if ($user_found) {
        $_SESSION['user_id']   = $user_found['id'];
        $_SESSION['username']  = $user_found['username'];
        $_SESSION['logged_in'] = true;

        header('Location: index.php?page=home');
        exit;
    } else {
        $error = 'Falscher Benutzername oder Passwort!';
    }
}
?>

<div class="auth-container">
    <h2>Einloggen</h2>
    <?php if ($error): ?>
        <p style="color: #ff416c; text-align: center;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Passwort" required>
        </div>
        <button type="submit" class="btn-action" style="width:100%; padding:12px;">Einloggen</button>
    </form>
    <div class="form-footer">
        <a href="index.php?page=register">Noch kein Konto? Registrieren</a>
    </div>
</div>