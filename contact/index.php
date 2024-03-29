<?php

// Show all errors (for educational purposes)
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

// Constanten (connectie-instellingen database)
define('DB_HOST', 'localhost');
define('DB_USER', 'varkensvision');
define('DB_PASS', 'Varken123@');
define('DB_NAME', 'varken');

date_default_timezone_set('Europe/Brussels');

// Connection with the database
try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection error: ' . $e->getMessage();
    exit;
}

$name = isset($_POST['name']) ? (string)$_POST['name'] : '';
$email = isset($_POST['email']) ? (string)$_POST['email'] : '';
$message = isset($_POST['message']) ? (string)$_POST['message'] : '';
$checkboxes = isset($_POST['portfolioDiscoveryMethod']) ? $_POST['portfolioDiscoveryMethod'] : [];
$msgName = '';
$msgEmail = '';
$msgMessage = '';
$msgCheckboxes = '';


// form is sent: perform formchecking!
if (isset($_POST['btnSubmit'])) {

    $allOk = true;
    

    // name not empty
    if (trim($name) === '') {
        $msgName = 'Please fill in a correct name';
        $allOk = false;
    }

    if (trim($email) === '') {
        $msgEmail = 'Please fill in a correct email';
        $all10k = false;
    }

    if (trim($message) === '') {
        $msgMessage = 'Please fill in a correct message';
        $allOk = false;
    }

    
    // end of form check. If $allOk still is true, then the form was sent in correctly
    if ($allOk) {
        $stmt = $db->exec('INSERT INTO messages (sender, email, message, added_on) VALUES (\'' . $name . '\',\'' . $email . '\',\'' . $message . '\',\'' . (new DateTime())->format('Y-m-d H:i:s') . '\')');

        // the query succeeded, redirect to this very same page
        if ($db->lastInsertId() !== 0) {
            header('Location: formchecking_thanks.php?name=' . urlencode($name));
            exit();
        } // the query failed
        else {
            echo 'Database error.';
            exit;
        }

    }

}

?><!doctype html>
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
                    <li><a href="#">Contact</a></li>

                </ul>
            </nav>
        </header>
    <main>
        <!--Contact Section Start-->
        <section class="contact-form container">
            <div class="container-contact">
                <h1><span class="underlined">Get</span> in touch</h1>
                <div class="container-form_img">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="layout">
                            <label for="name">Your name</label>
                            <input type="text" id="name" name="name" value="<?php echo $name; ?>">
                            <span class="message_error"><?php echo $msgName; ?></span>

                            <label for="email">Your e-mail</label>
                            <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                            <span class="message_error"><?php echo $msgEmail; ?></span>

                            <label for="message">Your message</label>
                            <textarea class="not-resizeable" name="message" id="message" rows="5" cols="20"><?php echo $message; ?></textarea>
                            <span class="message_error"><?php echo $msgMessage; ?></span>
                            




                            <div class="submit-button">
                                <input type="submit" id="btnSubmit" name="btnSubmit" value="Send">
                            </div>
                        </div>
                    </form>
                    <img src="../img/emailicon.png" alt="envelope">
                </div>
            </div>
        </section>
        <!--Contact Section End-->
    </main>

        <footer>

        </footer>
    </body>
</html>
