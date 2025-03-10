<?php
session_start();

// Verifica se l'utente è loggato
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Connessione al database
$host = "localhost";
$user = "root";
$password = "";
$database = "interesse_composto";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Recupera il nome utente della sessione corrente
$username = $_SESSION['username'];

// Recupera le previsioni salvate per l'utente corrente
$query = "SELECT * FROM previsioni WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$previsioni = $stmt->get_result();

$conn->close();
?>


<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previsioni Salvate</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Previsioni Salvate</h1>
        <button class="logout" onclick="logout()" type="button">Logout</button>

        <?php if ($previsioni->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Investimento Iniziale (€)</th>
                        <th>Risparmio Mensile (€)</th>
                        <th>Crescita Annuale (%)</th>
                        <th>Durata (anni)</th>
                        <th>Totale (€)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($previsione = $previsioni->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $previsione['investimento_iniziale']; ?></td>
                            <td><?php echo $previsione['risparmio_mensile']; ?></td>
                            <td><?php echo $previsione['crescita_annuale']; ?></td>
                            <td><?php echo $previsione['durata']; ?></td>
                            <td><?php echo $previsione['totale']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nessuna previsione salvata.</p>
        <?php endif; ?>

        <a href="home.php" class="button">Torna alla Home</a>
    </div>

    <script>
        function logout() {
            window.location.href = "logout.php";
        }
    </script>
</body>

</html>