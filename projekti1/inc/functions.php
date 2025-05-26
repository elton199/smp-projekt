<?php
session_start();
$dbconn = "";

function dbConnection() {
    global $dbconn;
    $dbconn = mysqli_connect("localhost", "root", "", "projekti");
    if (!$dbconn) {
        die("Lidhja me databaz dështoi: " . mysqli_connect_error());
    }
}
dbConnection();

function signup($emri, $email, $fjalekalimi){
    global $dbconn;
    $sql = "INSERT INTO perdoruesit (emri, email, fjalekalimi, data_regjistrimit) VALUES ('$emri', '$email', '$fjalekalimi', NOW())";
    if(mysqli_query($dbconn, $sql)){
        header("Location: login.php");
    } else {
        echo "Gabim gjat regjistrimit " . mysqli_error($dbconn);
    }
}
function login($email, $fjalekalimi) {
    global $dbconn;
    $sql = "SELECT * FROM perdoruesit WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
    $res = mysqli_query($dbconn, $sql);

    if (mysqli_num_rows($res) == 1) {
        $perdoruesiData = mysqli_fetch_assoc($res);
        $perdoruesi = array();
        $perdoruesi['perdoruesiid'] = $perdoruesiData['perdoruesiid'];
        $perdoruesi['emri'] = $perdoruesiData['emri'];
        $_SESSION['perdoruesi'] = $perdoruesi;
        header("Location: index.php");
    } else {
        echo "Email ose fjalekalimi nuk eshte i sakt.";
    }
}

function shtoMesazh($emri, $email, $mesazhi){
    global $dbconn;
    $sql = "INSERT INTO mesazhet (emri, email, mesazhi) VALUES ('$emri', '$email', '$mesazhi')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Mesazhi u dergua me sukses!";
    } else {
        echo "Gabim: " . mysqli_error($dbconn);
    }
}
function selectautomjetet() {
    global $dbconn;
    $sql = "SELECT automjetiid, emri, modeli, kilometrat, transmisoni, karburanti, viti, cmimi FROM automjetet";
    $result = mysqli_query($dbconn, $sql);
    return $result;
}
function editAutomjet($automjetiid, $cmimi, $perdoruesiid) {
    global $dbconn;
    $sql = "UPDATE automjetet SET cmimi = '$cmimi' WHERE automjetiid ='$automjetiid' AND perdoruesiid = '$perdoruesiid'";
    if (mysqli_query($dbconn, $sql)) {
        echo "Automjeti u perditsua me sukses!";
    } else {
        echo "Gabim: " . mysqli_error($dbconn);
    }
}
function deleteAutomjeti($automjetiid) {
    global $dbconn;
    $sql = "DELETE FROM automjetet WHERE automjetiid='$automjetiid'";
    if (mysqli_query($dbconn, $sql)) {
        echo "Automjeti u fshi me sukses!";
    } else {
        echo "Gabim: " . mysqli_error($dbconn);
    }
}
function shtoautomjeti($emri, $modeli, $kilometrazha, $ngjyra, $transmisioni , $karburanti, $viti, $cmimi, $imazh, $perdoruesiid) {
    global $dbconn;
    $sql = "INSERT INTO automjetet (emri, modeli,viti,ngjyra,cmimi,kilometrazha,karburanti,transmisioni,imazh,perdoruesiid) VALUES ('$emri', '$modeli','$viti','$ngjyra',$cmimi,'$kilometrazha','$karburanti','$transmisioni', '$imazh','$perdoruesiid')";
    if (mysqli_query($dbconn, $sql)) {
        echo "Automjeti u krijua me sukses!";
    } else {
        echo "Gabim: " . mysqli_error($dbconn);
    }
}
?>
