<?php
require 'includes/connect.php';

try {
    $sql = "SELECT * FROM port_html1 WHERE port_id = 2";
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        $json_data = $row['subtitletext2'];
        $data_array = json_decode($json_data, true);
        
        $inspiration = $data_array['inspiration'];
        $colorPalette = $data_array['colorPalette'];
        $typography = $data_array['typography'];
        $imagery = $data_array['imagery'];
    } else {
        die("No data found.");
    }

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<header class="sticky">
    <h1 class="hidden">portfolio page</h1>
    <div class="logo">
        <img id="logo" src="images/logo.svg" alt="jg_logo" />
    </div>
    <nav>
        <button class="hamburger" id="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
        <div class="nav-menu" id="nav-menu">
            <ul class="nav-list">
                <li id="HOME"><a href="index.html#home">HOME</a></li>
                <li id="PORTFOLIO"><a href="index.html#portfolio">PORTFOLIO</a></li>
                <li id="ABOUT"><a href="index.html#about">ABOUT</a></li>
                <li id="CONTACT"><a href="index.html#contact">CONTACT</a></li>
            </ul>
        </div>
    </nav>
</header>

<main>
    <div class="case-study">
        <h1 class="orangeh1"><?php echo htmlspecialchars($row['port_title']); ?></h1>
        
        <h2 class="orangeh2"><?php echo htmlspecialchars($row['port_subtitle1']); ?></h2>
        <p><?php echo htmlspecialchars($row['subtitletext1']); ?></p>
        
        <h2 class="orangeh2"><?php echo htmlspecialchars($row['subtitle2']); ?></h2>
        <ul>
            <li><strong>Inspiration:</strong> <?php echo htmlspecialchars($inspiration); ?></li>
            <li><strong>Color Palette:</strong> <?php echo htmlspecialchars($colorPalette); ?></li>
            <li><strong>Typography:</strong> <?php echo htmlspecialchars($typography); ?></li>

            <li><strong>Imagery:</strong> <?php echo htmlspecialchars($imagery); ?></li>
            <!-- <li><strong>Message:</strong> <?php echo htmlspecialchars($message); ?></li> -->


        </ul>

        <h2><?php echo htmlspecialchars($row['subtitle3']); ?></h2>
        <p><?php echo htmlspecialchars($row['subtitletext3']); ?></p>

        <h2><?php echo htmlspecialchars($row['subtitle4']); ?></h2>
        <p><?php echo htmlspecialchars($row['subtitletext4']); ?></p>
    </div>

    </div>
      <div class="poster-grid">
        <div class="poster"><img src="images/orenge3d.svg" alt="Poster 1"></div>
        <div class="poster"><img src="images/still image 4.svg" alt="Poster 2"></div>
        
      </div>


    <footer class="unique-footer-container">
        <div class="footer-top-section">
            <div class="footer-info">
                <p class="footer-location">London / Canada</p>
                <p class="footer-email">joyalgregory665@gmail.com</p>
                <p class="footer-phone">(382) 882 1685</p>
                <div class="footer-social-icons">
                    <img src="images/Icon akar-instagram-fill.svg" alt="Instagram" class="social-icon" />
                    <img src="images/Icon akar-facebook-fill.svg" alt="Facebook" class="social-icon" />
                    <a href="https://www.twitter.com/yourprofile" target="_blank">
                        <img src="images/Icon simple-x.svg" alt="Twitter" class="social-icon" />
                    </a>
                    <a href="https://www.linkedin.com/in/joyal-gregory-33b2052a0" target="_blank">
                        <img src="images/Icon akar-linkedin-fill.svg" alt="LinkedIn" class="social-icon" />
                    </a>
                </div>
            </div>
            <button class="footer-button">Let's Work Together</button>
            <div class="footer-nav-links">
                <a href="#home" class="footer-link">HOME</a>
                <a href="#contact" class="footer-link">CONTACT</a>
                <a href="#portfolio" class="footer-link">PORTFOLIO</a>
                <a href="#about" class="footer-link">ABOUT</a>
            </div>
            <div class="footer-logo">
                <img src="images/logo.svg" alt="Logo" class="footer-logo-image" />
            </div>
        </div>
        <div class="footer-bottom-section">
            <p class="footer-copyright">© 2024 Joyal Gregory. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
     <script src="js/main.js"></script>
</main>
</body>
</html>
