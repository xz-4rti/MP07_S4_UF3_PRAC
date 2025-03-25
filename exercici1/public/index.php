<?php
require '../config/config.php';

// Eliminar usuari
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM usuaris WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['missatge'] = "Usuari eliminat correctament";
    header('Location: index.php');
    exit();
}

// Llistar usuaris
$stmt = $pdo->query("SELECT * FROM usuaris");
$usuaris = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD amb PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if (isset($_SESSION['missatge'])): ?>
            <div class="alert alert-success"><?= $_SESSION['missatge']; unset($_SESSION['missatge']); ?></div>
        <?php endif; ?>

        <h1>Llistat d'usuaris</h1>
        <a href="crear.php" class="btn btn-primary mb-3">Afegir usuari</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Edat</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuaris as $usuari): ?>
                <tr>
                    <td><?= $usuari['id'] ?></td>
                    <td><?= htmlspecialchars($usuari['nom']) ?></td>
                    <td><?= htmlspecialchars($usuari['email']) ?></td>
                    <td><?= $usuari['edat'] ?></td>
                    <td>
                        <a href="editar.php?id=<?= $usuari['id'] ?>" class="btn btn-warning">Editar</a>
                        <a href="index.php?delete=<?= $usuari['id'] ?>" class="btn btn-danger" onclick="return confirm('Estàs segur?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>