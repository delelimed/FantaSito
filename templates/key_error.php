<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Errore - Chiave di Attivazione Non Valida</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css?h=97380e22c8933e9aa79cbc2390b9f15a">
</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 my-5">
                <div class="card-body p-5">
                    <div class="text-center">
                        <h3 class="text-danger mb-4">Errore: Chiave di Attivazione Non Valida</h3>
                        <p>La chiave di attivazione inserita non è valida, oppure non combacia con il codice macchina. Per favore, inserisci una chiave di attivazione corretta e il machine code comunicati.</p>
                    </div>
                    <form method="post" action="../req/key/validate_key.php">
                        <div class="mb-3">
                            <label for="activationKey" class="form-label">Chiave di Attivazione</label>
                            <input type="text" class="form-control" id="activationKey" name="activationKey" placeholder="XXXXX-XXXXX-XXXXX-XXXXX" maxlength="23" required oninput="formatActivationKey(this)">

                            <script>
                                function formatActivationKey(input) {
                                    // Rimuovi i trattini e rendi il testo maiuscolo
                                    let value = input.value.replace(/-/g, '').toUpperCase();

                                    // Aggiungi i trattini dopo ogni 5 caratteri
                                    const formattedValue = value.replace(/(.{5})/g, '$1-').slice(0, 23); // 20 caratteri + 3 trattini

                                    // Aggiorna il valore dell'input
                                    input.value = formattedValue;
                                }
                            </script>
                        </div>
                        <div class="mb-3">
                            <label for="machineCode" class="form-label">Machine Code</label>
                            <input type="text" class="form-control" id="machineCode" name="machineCode" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Invia</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="login.php" class="btn btn-secondary">Torna al Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
