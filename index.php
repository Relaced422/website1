<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tobiets</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Verwijzing naar CSS -->
</head>

<body>
    <?php include("db.php"); ?> <!-- Verbind met de database -->
    <?php include("includes/header.php"); ?>

    <!-- Sections -->
    <button class="section-button">Voorgerecht ⌄</button>
    <div class="menu-container">
        <?php
        $stmt = $pdo->query("SELECT * FROM menu_items ORDER BY id DESC");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="menu-item">';
            echo '<div class="image">';
            if (!empty($row['image'])) {
                echo '<img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '" style="max-width:100%;max-height:150px;border-radius:8px;">';
            } else {
                echo 'Geen afbeelding';
            }
            echo '</div>';
            echo '<div class="info">';
            if (!is_null($row['price'])) {
                echo '<div class="price">€ ' . number_format($row['price'], 2, ',', '.') . '</div>';
            } else {
                echo '<div class="price">Prijs onbekend</div>';
            }

            echo '<p><strong>' . htmlspecialchars($row['title']) . '</strong><br>' . htmlspecialchars($row['description']) . '</p>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <button class="section-button">Hoofdgerecht ⌄</button>
    <button class="section-button">Snacks ⌄</button>
    <button class="section-button">Desert ⌄</button>

</body>

</html>