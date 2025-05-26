<?php
include 'inc/functions.php';
include 'navbar.php';
if (!isset($_SESSION['perdoruesi'])) {
    echo "Nuk jeni i kyçur.";
    exit();
}

if ($_SESSION['perdoruesi']['perdoruesiid'] != 1) {
    echo "Akses i ndaluar. Vetëm administratori mund të shikojë këtë faqe.";
    exit();
}

if (isset($_POST['shtoAutomjet'])) {
    $emri = $_POST['emri'];
    $modeli = $_POST['modeli'];
    $ngjyra = $_POST['ngjyra'];
    $kilometrat = $_POST['kilometrat'];
    $transmisioni = $_POST['transmisioni'];
    $karburanti = $_POST['karburanti'];
    $viti = $_POST['viti'];
    $cmimi = $_POST['cmimi'];
    $imazh = $_POST['imazh'];
    $perdoruesiid = $_POST['perdoruesiid'];

    shtoautomjeti($emri, $modeli, $kilometrat, $ngjyra, $transmisioni, $karburanti, $viti, $cmimi, $imazh, $perdoruesiid);
}

if (isset($_POST['editAutomjet'])) {
    $automjetiid = $_POST['automjetiid'];
    $cmimi = $_POST['cmimi'];
    $perdoruesiid = $_POST['perdoruesiid'];

    editAutomjet($automjetiid, $cmimi, $perdoruesiid);
}

if (isset($_POST['deleteAutomjet'])) {
    $automjetiid = $_POST['automjetiid'];

    deleteAutomjeti($automjetiid);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <ul class="nav">
        <li><a href="index.php">HOME</a></li>
        <li><a href="#sherbimet">SHERBIMET</a></li>
        <li><a href="dyqani.php">VETURAT NE SHITJE</a></li>
        <li><a href="about.php">RRETH NESH</a></li>
    </ul>
<div class="auth-div">
    <div class="auth-box">
        <h2>Paneli i Administratorit</h2>
        <p>Mirsevjen, admin! Këtu mund të menaxhosh përdoruesit, automjetet, dhe më shumë.</p>
    </div>
</div>


<!-- Form to Add Automjet -->
<form method="post" action="admin.php">
    <h3>Shto Automjet</h3>
    <input type="text" name="emri" placeholder="Emri" required>
    <input type="text" name="modeli" placeholder="Modeli" required>
    <input type="number" name="kilometrat" placeholder="Kilometrazha" required>
    <select name="transmisioni" required>
        <option value="" disabled selected>Zgjidh transmetuesin</option>
        <option value="1">Manual</option>
        <option value="2">Automatik</option>
    </select>
    <select name="karburanti" required>
     <option value="" disabled selected>Zgjidh karburantin</option>
        <option value="1">Benzin</option>
        <option value="2">Naft</option>
        <option value="3">Elektrik</option>
        <option value="4">Hibrid</option>
    </select>
    <input type="number" name="viti" placeholder="Viti" required>
    <input type="text" name="ngjyra" placeholder="Ngjyra">
    <input type="number" step="0.01" name="cmimi" placeholder="Cmimi" required>
    <input type="text" name="imazh" placeholder="Imazh" required>
    <input type="hidden" name="perdoruesiid" value="1">
    <button type="submit" name="shtoAutomjet">Shto Automjet</button>
</form>

<!-- Form to Edit Automjet -->
<form method="post" action="admin.php">
    <h3>Ndrysho Automjet</h3>
    <input type="number" name="automjetiid" placeholder="ID Automjeti" required>
    <input type="number" step="0.01" name="cmimi" placeholder="Cmimi" required>
    <input type="hidden" name="perdoruesiid" value="1">
    <button type="submit" name="editAutomjet">Ndrysho Automjet</button>
</form>

<!-- Form to Delete Automjet -->
<form method="post" action="admin.php">
    <h3>Fshi Automjet</h3>
    <input type="number" name="automjetiid" placeholder="ID Automjeti" required>
    <button type="submit" name="deleteAutomjet">Fshi Automjet</button>
</form>

<?php
// Marrim të gjitha automjetet nga databaza
$sql = "SELECT * FROM automjetet";
$result = mysqli_query($dbconn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h3>Lista e Automjeteve</h3>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo "ID: " . $row['automjetiid'] . " | ";
        echo "Emri: " . $row['emri'] . " | ";
        echo "Modeli: " . $row['modeli'] . " | ";
        echo "Ngjyra: " . $row['ngjyra'] . " | ";
        echo "Viti: " . $row['viti'] . " | ";
        echo "Transmisioni: " . $row['transmisioni'] . " | ";
        echo "Karburanti: " . $row['karburanti'] . " | ";
        echo "Kilometrazha: " . $row['kilometrazha'] . " | ";
        echo "Cmimi: €" . number_format($row['cmimi'], 2) . " | ";
        echo "Imazh: " . $row['imazh'];
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Nuk ka automjete në databazë.</p>";
}
?>


</body>
</html>