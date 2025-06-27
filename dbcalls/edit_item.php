<?php
require_once 'db.php';

// Determine if editing existing item
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$editing = $id > 0;
$title = $description = $price = $image = '';

if ($editing) {
    $stmt = $pdo->prepare('SELECT * FROM menu_items WHERE id = ?');
    $stmt->execute([$id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($item) {
        $title = $item['title'];
        $description = $item['description'];
        $price = $item['price'];
        $image = $item['image'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    if ($editing) {
        $stmt = $pdo->prepare('UPDATE menu_items SET title=?, description=?, price=?, image=? WHERE id=?');
        $stmt->execute([$title, $description, $price, $image, $id]);
    } else {
        $stmt = $pdo->prepare('INSERT INTO menu_items (title, description, price, image) VALUES (?, ?, ?, ?)');
        $stmt->execute([$title, $description, $price, $image]);
    }
    header('Location: admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $editing ? 'Item bewerken' : 'Nieuw item'; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<h1><?php echo $editing ? 'Item bewerken' : 'Nieuw item toevoegen'; ?></h1>
<form method="post">
    <div>
        <label>Titel</label><br>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
    </div>
    <div>
        <label>Beschrijving</label><br>
        <textarea name="description" required><?php echo htmlspecialchars($description); ?></textarea>
    </div>
    <div>
        <label>Prijs</label><br>
        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($price); ?>" required>
    </div>
    <div>
        <label>Afbeelding URL</label><br>
        <input type="text" name="image" value="<?php echo htmlspecialchars($image); ?>">
    </div>
    <button type="submit">Opslaan</button>
    <a href="admin.php">Annuleren</a>
</form>
</body>
</html>