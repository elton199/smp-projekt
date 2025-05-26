<?php include 'inc/functions.php';
include 'navbar.php';

?>

<?php
$result = mysqli_query($dbconn, "SELECT * FROM automjetet ORDER BY data_shtimit DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Veturat në Shitje - Auto Kacandolli</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dyqani.css">
</head>
<body>
    <ul class="nav">
        <li><a href="index.php">HOME</a></li>
        <li><a href="#sherbimet">SHERBIMET</a></li>
        <li><a href="dyqani.php">VETURAT NE SHITJE</a></li>
        <li><a href="about.php">RRETH NESH</a></li>
    </ul>
    <div class="dyqani-center">
        <h2 class="dyqani-title">
            <span style="color:red;">AUTOMJETET</span>
            <span style="color:white;">NË SHITJE</span>
        </h2>
        
        <div class="kategorite">
            <h3 class="kategorite-title">Zgjidhni kategorinë:</h3>
            <div class="kategori-buttons">
                <button class="kategori-btn">Të gjitha</button>
                <button class="kategori-btn">Mercedes-Benz</button>
                <button class="kategori-btn">Suzuki</button>
            </div>
        </div>

        <div class="veturat-grid">
        <?php
        $sql = "SELECT * FROM automjetet ORDER BY data_shtimit DESC";
        $result = mysqli_query($dbconn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="vetura-card">';
                echo '<img src=' . $row['imazh'] . ' alt="Vetura" class="vetura-img">';
                echo '<div class="vetura-info">';
                echo '<h4>' . $row['emri'] . '</h4>';
                echo '<p>' . $row['viti'] . ' | ' . $row['transmisioni'] . ' | ' . $row['karburanti'] . '</p>';
                echo '<span class="cmimi">' . number_format($row['cmimi'], 0, '.', ',') . ' €</span>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p style='color: red;'>Nuk mund të lexohen automjetet nga databaza.</p>";
        }
        ?>
        </div>


    </div>
     <section id="sherbimet" class="sherbimet-section">
        <link rel="stylesheet" href="sherbimet.css">
    <div class="sherbimet-center">
        <h2 class="sherbimet-title"> 
            <span style="color:red;">KAÇANDOLLI</span>
            <span style="color:white;">SHËRBIMET</span>
        </h2>
        <div class="sherbimet-info">
            <p>Ne dekadën e fundit, Auto Kacandolli LLC ka investuar në teknologji, hapesirë punuese, trajnimin e personelit, mjeteve dhe pajisjeve të punës.</p>
            <div class="servicelogos">
                <img src="images/service_002-1-1024x685.jpg" alt="servis Logo" class="service-logo">
                <img src="images/service_003-1024x625.jpg" alt="servis Logo" class="service1-logo">
            </div>
            <h3 class="services-subtitle">SHËRBIMET TONA PËRFSHIJNË :</h3>
        <ul class="services-list">
            <li>Shërbimi automjeteve dhe mirëmbajtje</li>
            <li>Inspektimit teknik</li>
            <li>Riparime mekanike</li>
            <li>Riparime elektrike</li>
            <li>Riparime dhe ngjyrosje</li>
            <li>Nderrimin e gomave, riparimin dhe balancimi</li>
            <li>Furnizim me pjesë rezervë</li>
            <li>Transporti i mjeteve nga dhe në punëtori</li>
        </ul>
        </div>
    </div>
</section>
</body>
</html>