<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", '', "interesse_composto");

    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM utenti WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            $_SESSION['username'] = $username;
            header("Location: home.php?success=" . urlencode("true"));
        } else {
            header("Location: login.php");
        }
    }
}

$stmt->close();
$conn->close();
?>