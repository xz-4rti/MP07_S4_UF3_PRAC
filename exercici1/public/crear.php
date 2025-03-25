<?php
require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $edat = $_POST['edat'];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO usuaris (nom, email, edat) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $edat]);
        
        $_SESSION['missatge'] = "Usuari creat correctament";
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear usuari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Crear nou usuari</h1>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Edat</label>
                <input type="number" class="form-control" name="edat" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php" class="btn btn-secondary">Cancel·lar</a>
        </form>
    </div>
</body>
</html>