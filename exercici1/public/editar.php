<?php
require '../config/config.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

// Obtenir dades de l'usuari
$stmt = $pdo->prepare("SELECT * FROM usuaris WHERE id = ?");
$stmt->execute([$id]);
$usuari = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuari) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $edat = $_POST['edat'];
    
    try {
        $stmt = $pdo->prepare("UPDATE usuaris SET nom = ?, email = ?, edat = ? WHERE id = ?");
        $stmt->execute([$nom, $email, $edat, $id]);
        
        $_SESSION['missatge'] = "Usuari actualitzat correctament";
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
    <title>Editar usuari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar usuari</h1>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" value="<?= htmlspecialchars($usuari['nom']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($usuari['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Edat</label>
                <input type="number" class="form-control" name="edat" value="<?= $usuari['edat'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualitzar</button>
            <a href="index.php" class="btn btn-secondary">Cancel·lar</a>
        </form>
    </div>
</body>
</html>