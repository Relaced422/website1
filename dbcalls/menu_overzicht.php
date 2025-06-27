<?php
require_once 'db.php';
?>
    <div class="menu-container">
        <div class="menu-titel"><h1>Hoofdgerechten</h1></div>

        <?php
        $stmt = $pdo->query("SELECT * FROM menu_items_v ORDER BY id DESC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="menu-item">';
            if (!empty($row['image'])) {
                echo '<img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '">';
            } else {
                echo '<img src="./assets/img/placeholder.png" alt="Geen afbeelding">';
            }
           
            echo '<h1>' . htmlspecialchars($row['title']) . '</h1>';
            echo '<h3>' . htmlspecialchars($row['description']) . '</h3>';
            echo '<div class="price">€ ' . number_format($row['price'], 2, ',', '.') . '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <div class="menu-container">
        <?php
        $stmt = $pdo->query("SELECT * FROM menu_items_h ORDER BY id DESC");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="menu-item">';
            if (!empty($row['image'])) {
                echo '<img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '">';
            } else {
                echo '<img src="placeholder.png" alt="Geen afbeelding">';
            }
           
            echo '<h1>' . htmlspecialchars($row['title']) . '</h1>';
            echo '<h3>' . htmlspecialchars($row['description']) . '</h3>';
            echo '<div class="price">€ ' . number_format($row['price'], 2, ',', '.') . '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <div class="menu-container">
        <?php
        $stmt = $pdo->query("SELECT * FROM menu_items_d ORDER BY id DESC");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="menu-item">';
            if (!empty($row['image'])) {
                echo '<img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '">';
            } else {
                echo '<img src="placeholder.png" alt="Geen afbeelding">';
            }
           
            echo '<h1>' . htmlspecialchars($row['title']) . '</h1>';
            echo '<h3>' . htmlspecialchars($row['description']) . '</h3>';
            echo '<div class="price">€ ' . number_format($row['price'], 2, ',', '.') . '</div>';
            echo '</div>';
        }
        ?>
    </div>

