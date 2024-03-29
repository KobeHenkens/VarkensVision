<?php

// Constanten (connectie-instellingen databank)
define ('DB_HOST', 'localhost');
define ('DB_USER', 'varkensvision');
define ('DB_PASS', 'Varken123@');
define ('DB_NAME', 'varken');


date_default_timezone_set('Europe/Brussels');

// Verbinding maken met de databank
try {
    $db = new PDO('mysql:host=' . DB_HOST .';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Verbindingsfout: ' .  $e->getMessage();
    exit;
}

// Opvragen van alle taken uit de tabel tasks
$stmt = $db->prepare('SELECT * FROM messages ORDER BY added_on DESC');
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);


?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
    <title>Admin Dashboard</title>
    <link href="https://unpkg.com/@csstools/normalize.css" rel="stylesheet" />
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="../css/styles.css">
<body class="grid">
    <div class="admin_dashboard-container">
        <header> 
            <h1 class="underlined">Admin Dashboard - Database: contact</h1>
        </header>
        <main>
            <section class="data">
                <?php if (sizeof($items) > 0) { ?>
                <ul>
                    <?php foreach ($items as $item) { ?>
                    <li>
                        <p> <?php echo $item['sender']; ?></p>
                        <p><?php echo $item['email']; ?></p>
                        <p ><?php echo $item['message']; ?></p>
                        <p><?php echo $item['checkboxes']; ?></^p>
                        <p><?php echo (new Datetime($item['added_on']))->format('d-m-Y H:i:s'); ?></p>
                    </li>
                    <?php } ?>
                </ul>
                <?php
                } else {
                    echo '<p>No data received.</p>' . PHP_EOL;
                }
                ?>
            </section>
        </main>
    </div>
</body>
</html>