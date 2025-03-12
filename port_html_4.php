<?php
require 'includes/connect.php';

try {
    $sql = "SELECT * FROM port_html1 WHERE port_id = 4";
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        $json_data = $row['subtitletext2'];
        $data_array = json_decode($json_data, true);
        
        $preProduction = $data_array['preProduction'];
        $tools = $data_array['tools'];
        $workflow = $data_array['workflow'];
        $postProduction = $data_array['postProduction'];
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
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
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
    <div class="study-container">
      <h1 class="title-header"> <?php echo htmlspecialchars($row['port_title']); ?> </h1>
      
      <h2 class="sub-header"><?php echo htmlspecialchars($row['port_subtitle1']); ?>:</h2>
      <p class="description"><?php echo htmlspecialchars($row['subtitletext1']); ?></p>
    
      <h2 class="sub-header"><?php echo htmlspecialchars($row['subtitle2']); ?></h2>
      <ul class="approach-list">
        <li class="approach-item"><strong class="highlight">Pre-production: </strong><?php echo htmlspecialchars($preProduction); ?></li>
        <li class="approach-item"><strong class="highlight">Tools: </strong><?php echo htmlspecialchars($tools); ?></li>
        <li class="approach-item"><strong class="highlight">Workflow: </strong> <?php echo htmlspecialchars($workflow); ?></li>
        <li class="approach-item"><strong class="highlight">Post-production: </strong> <?php echo htmlspecialchars($postProduction); ?></li>
      </ul>
    
      <h2 class="sub-header"><?php echo htmlspecialchars($row['subtitle3']); ?></h2>
      <p class="description"><?php echo htmlspecialchars($row['subtitletext3']); ?></p>
    
      <h2 class="sub-header"><?php echo htmlspecialchars($row['subtitle4']); ?></h2>
      <p class="description"><?php echo htmlspecialchars($row['subtitletext4']); ?></p>
    </div>
    <div class="video-container">
        <video onclick="playVideo(event)" src="video/earbud.mp4" id="main-video"></video>
        <div class="video-controls">
            <button onclick="playVideo(event)"><i class="fa fa-play"></i><i class="fa fa-pause"></i></button>
            <button onclick="rewindVideo(event)"><i class="fa fa-fast-backward"></i></button>
            
            </div>
           
        </div>
        <div class="video-container">
          <video onclick="playVideo(event)" src="video/" id="main-video"></video>
          <div class="video-controls">
              <button onclick="playVideo(event)"><i class="fa fa-play"></i><i class="fa fa-pause"></i></button>
              <button onclick="rewindVideo(event)"><i class="fa fa-fast-backward"></i></button>
              
              </div>
             
          </div>
      <!-- <div class="video-container">
        <video onclick="playVideo(event)" src="video/motiondesign1.mp4" id="main-video"></video>
        <div class="video-controls">
            <button onclick="playVideo(event)"><i class="fa fa-play"></i><i class="fa fa-pause"></i></button>
            <button onclick="rewindVideo(event)"><i class="fa fa-fast-backward"></i></button>
            
            </div>
           
        </div>
        <div class="video-container">
          <video onclick="playVideo(event)" src="video/" id="main-video"></video>
          <div class="video-controls">
              <button onclick="playVideo(event)"><i class="fa fa-play"></i><i class="fa fa-pause"></i></button>
              <button onclick="rewindVideo(event)"><i class="fa fa-fast-backward"></i></button>
              
              </div>
             
          </div> -->

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
                <img src="images/Icon simple-x.svg" alt="Twitter" class="social-icon" /></a>
              <a href="https://www.linkedin.com/in/joyal-gregory-33b2052a0?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank">
                <img src="images/Icon akar-linkedin-fill.svg" alt="LinkedIn" class="social-icon" /></a>
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
          <p class="footer-copyright">
            © 2024 Joyal Gregory. All Rights Reserved.
          </p>
        </div>
      </footer>
      <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="js/main.js"></script>
  </main>
  <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
  <script src="js/main.js"></script>
</body>
</html>