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
    <section>
        <div class="menukaart-titel"><h1>Menukaart</h1></div>
        <?php
        include("dbcalls/menu_overzicht.php");
        ?>

    </section>

</body>

</html>