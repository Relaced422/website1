<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Menukaart Overzicht</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .menu-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .menu-item {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            text-align: center;
        }
        .menu-item img {
            max-width: 100%;
            max-height: 150px;
            object-fit: cover;
            border-radius: 4px;
        }
        .menu-item h2 {
            font-size: 1.2em;
            margin: 10px 0 5px;
        }
        .menu-item p {
            margin: 5px 0;
        }
        .menu-item .price {
            font-weight: bold;
            color: #27ae60;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Menukaart</h1>

    <div class="menu-container">
        <?php
        $stmt = $pdo->query("SELECT * FROM menu_items ORDER BY id DESC");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="menu-item">';
            if (!empty($row['image'])) {
                echo '<img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '">';
            } else {
                echo '<img src="placeholder.jpg" alt="Geen afbeelding">';
            }
            echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
            echo '<p>' . htmlspecialchars($row['description']) . '</p>';
            echo '<div class="price">€ ' . number_format($row['price'], 2, ',', '.') . '</div>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
<?php