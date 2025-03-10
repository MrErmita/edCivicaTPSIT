function calcolaInteresse() {
  let investimento = parseFloat(document.getElementById("investimento").value);
  let risparmio = parseFloat(document.getElementById("risparmio").value);
  let crescita = parseFloat(document.getElementById("crescita").value) / 100;
  let durata = parseInt(document.getElementById("durata").value);

  let totale = 0;
  let quotaInvestita = investimento;
  let interesseComposto = 0;
  let risparmiTotali = 0;

  totale = quotaInvestita * Math.pow(1 + crescita, durata);
  interesseComposto = totale - quotaInvestita;
  risparmiTotali = risparmio * (durata * 12);

  document.getElementById(
    "risultato"
  ).innerHTML = `Risultato finale: ${totale.toFixed(2)} € <br>
  Interesse Composto: ${interesseComposto.toFixed(2)} € <br>
  Risparmi Totali: ${risparmiTotali.toFixed(2)} €`;

  document.getElementById("totale").value = totale.toFixed(2);

  generaGrafico(interesseComposto, quotaInvestita, risparmiTotali);
}

function generaGrafico(interesse, investimento, risparmi) {
  let ctx = document.getElementById("grafico").getContext("2d");
  new Chart(ctx, {
    type: "doughnut",
    data: {
      labels: ["Interesse Composto", "Investimento", "Risparmi Totali"],
      datasets: [
        {
          data: [interesse, investimento, risparmi],
          backgroundColor: ["#FFD700", "#6A0DAD", "#00BFFF"],
        },
      ],
    },
    options: {
      plugins: {
        legend: {
          labels: {
            color: "white",
          },
        },
      },
    },
  });
}

function logout() {
  window.location.href = "logout.php";
}
