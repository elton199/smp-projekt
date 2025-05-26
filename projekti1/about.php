
<?php include 'inc/functions.php';
 include 'navbar.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emri = $_POST['emri'];
    $email = $_POST['email'];
    $mesazhi = $_POST['mesazhi'];

    if (!empty($emri) && !empty($email) && !empty($mesazhi)) {
        shtoMesazh($emri, $email, $mesazhi);
    } else {
        echo "Të gjitha fushat janë të detyrueshme.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rreth Nesh - Auto Kacandolli</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="about.css">
</head>
<body>

    <ul class="nav">
        <li><a href="index.php">HOME</a></li>
        <li><a href="#sherbimet">SHERBIMET</a></li>
        <li><a href="dyqani.php">VETURAT NE SHITJE</a></li>
        <li><a href="about.php">RRETH NESH</a></li>
    </ul>
    <div class="about-center">
        <div class="about-content">
            <div class="about-image">
                <img src="images/Service-Bay.jpg" alt="Auto Kacandolli" class="c-img">
            </div>
            <div class="about-text">
                <h2 class="about-title">PROFILI I KOMPANISË</h2>
                <div class="about-paragraphs">
                    <p>Kompania AUTO KAÇANDOLLI Shpk, daton që nga viti 1965 si një servis i vogël që në atë kohë merrej kryesisht me riparime të vogla mbi automjetet dhe rimorkiot e vogla, por me kalimin e kohës kërkesat për riparime jane rritur dhe si rrjedhojë e kesaj janë rritur hapsirat dhe shërbimet në masë të madhe dhe përgjigjia jonë ndaj këtyre kërkesave për rritjen e hapësirës ka qenë gjithmonë veprim i drejtë.</p>
                    
                    <p>AUTO KAÇANDOLLI LLC është e vendosur në zonën industriale në kilometrin e tretë të magjistrales Prishtinë – Fushë Kosovë, ka të bëjë me servisimin dhe shitjen e automjeteve dhe motorrëve, me nr biznesi 70437268 që nga viti 2000.</p>
                    
                    <p>Me kalimin në vendin që jemi nga viti 2008 kemi sjellë pajisje moderne për riparimin e automjeteve në mekanikë si dhe në ngjyrosje, pajisjet tona dhe stafi profesional na mundësojnë për të punuar me organizata të ndryshme ndërkombëtare dhe kombetare, të cilat kanë filluar aktivitetin e tyre para luftës tilla si: UNICEF, WFP, MERS CORPS, OSBE, KFOR-it, UNMIK-ut, Zyra e BE etj.</p>
                    
                    <p>Me formimin e institucioneve tona ata u bënë kontraktorë tonë si: Ministria e Shërbimeve Publike, Agjencia Kosovare e Pronës, Zyra e Kryeministrit, Ministria e Punës dhe Mirëqenies Sociale, Ministria e Arsimit, Shkencës dhe Teknologjisë, Agjencia Kadastrale e Kosovës, Zyra e Rregullatorit të Energjisë, etj</p>
                </div>
            </div>
    </div>
    <div class="kontakt">
    <h1>Contact Me</h1>
    <form action="about.php" method="POST">
        <input type="text" name="emri" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="mesazhi" placeholder="Your Message" required></textarea>
        <button type="submit">Send</button>
    </form>
</div>
</body>
</html>