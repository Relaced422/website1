<?php
require_once 'db.php';
include 'includes/header.php';

// Handle delete action
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare('DELETE FROM menu_items WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: admin.php');
    exit;
}

$stmt = $pdo->query('SELECT * FROM menu_items ORDER BY id DESC');
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu beheren</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<h1>Menu Items beheren</h1>
<p><a href="edit_item.php">Nieuw item toevoegen</a></p>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Titel</th>
        <th>Beschrijving</th>
        <th>Prijs</th>
        <th>Acties</th>
    </tr>
<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <tr>
        <td><?php echo htmlspecialchars($row['title']); ?></td>
        <td><?php echo htmlspecialchars($row['description']); ?></td>
        <td>€ <?php echo number_format($row['price'], 2, ',', '.'); ?></td>
        <td>
            <a href="edit_item.php?id=<?php echo $row['id']; ?>">Bewerken</a> |
            <a href="admin.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Weet je het zeker?');">Verwijderen</a>
        </td>
    </tr>
<?php endwhile; ?>
</table>
</body>
</html>