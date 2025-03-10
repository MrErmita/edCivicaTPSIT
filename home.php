<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcolo Interesse Composto</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="savePrevs.php" method="post">
        <div class="container">

            <h1>Calcolo Interesse Composto</h1>
            <button class="logout" onclick="logout()" type="button">Logout</button>
            <label>Investimento iniziale (€):</label> <input type="number" id="investimento" value="1000"
                name="investimento"><br>
            <label>Risparmio mensile (€):</label> <input type="number" id="risparmio" value="100" name="risparmio"><br>
            <label>Crescita annuale (%):</label> <input type="number" id="crescita" value="10" name="crescita">
            <button onclick="document.getElementById('crescita').value = '9'" class="quick" type="button">Azionario (8-10%)</button>
            <button onclick="document.getElementById('crescita').value = '4'" id="ob" class="quick" type="button">Obbligazionario
                (3-5%)</button>
            <label>Durata (anni):</label> <input type="number" id="durata" value="10" name="durata"><br>
            <button onclick="calcolaInteresse()" type="button">Calcola</button>
            <p id="risultato"></p>
            <canvas id="grafico" width="300" height="300"></canvas>
            <input type="hidden" name="totale" id="totale" value="0">


            <input type="submit" class="salva" value="Salva Previsioni">
            <button onclick="window.location.href = 'previsioni.php';" type="button">Visualizza previsioni salvate</button>
        </div>
    </form>
</body>

</html>