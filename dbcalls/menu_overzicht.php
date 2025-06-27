<?php
require_once 'db.php';
?>

    <div class="menukaart-titel"><h1>Menukaart</h1></div>

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
           
            echo '<h1>' . htmlspecialchars($row['title']) . '</h1>';
            echo '<h3>' . htmlspecialchars($row['description']) . '</h3>';
            echo '<div class="price">€ ' . number_format($row['price'], 2, ',', '.') . '</div>';
            echo '</div>';
        }
        ?>
    </div>

