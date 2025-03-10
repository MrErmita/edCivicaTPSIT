<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $investimento = $_POST['investimento'];
    $risparmio = $_POST['risparmio'];
    $crescita = $_POST['crescita'];
    $durata = $_POST['durata'];
    $totale = $_POST['totale'];

    $conn = new mysqli("localhost", "root", "", "interesse_composto");
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $username = $_SESSION['username'];

    $query = "INSERT INTO previsioni (username, investimento_iniziale, risparmio_mensile, crescita_annuale, durata, totale) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $username, $investimento, $risparmio, $crescita, $durata, $totale);
    $stmt->execute();

    $stmt->close();
    $conn->close();
    header("Location: home.php");

}

?>