<?php

	$name = isset($_GET['name']) ? $_GET['name'] : false;

?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>VarkensVision</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--CSS-->
        <link rel="stylesheet" href="../styles.css">
        <link rel="stylesheet" href="../css/contact.css">
        <!--Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
        <!--JavaScript-->
        <script src="../main.js" defer></script>
    </head>
    <body>  
        <header class="grid content">
            <img class="logo" src="../images/logo.png" alt="logo">
            <a class="skiplink" href="#main">skip to main</a>
            <nav>
                <button aria-expanded="false" class="hamburger" id="menu">
                            <span aria-hidden="true" class="icon">
                                <span></span><span></span><span></span>
                            </span>
                    <span>Menu</span>
                </button>
    
                <ul>
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="../about/index.html">About</a></li>
                    <li><a href="../contact/index.php">Contact</a></li>

                </ul>
            </nav>
        </header>
        <main class="thanks">
            <!--Thanks Section Start-->
            <section class="form_sent_successfully grid">
                <div class="container-page">
                    <h1>Thank you for your submission, <?php echo htmlentities($name)?>!</h1>
                    <p>You will receive an email as soon as possible.</p>
                </div>
            </section>
            <!--Thanks Section End-->
        </main>
        <footer class="grid">
            <p>©2024 Vison</p>
            <p>All rights Reserved</p>
        </footer>
    </body>
</html>
