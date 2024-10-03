<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Operazione Completata</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        // Funzione per chiudere la finestra dopo un breve ritardo
        function closeWindow() {
            setTimeout(function() {
                window.close(); // Chiude la finestra
            }, 3000); // Attendi 3 secondi prima di chiudere
        }
    </script>
</head>
<body onload="closeWindow();"> <!-- Chiama la funzione al caricamento della pagina -->
<div class="container mt-5 text-center">
    <h1>Operazione Completata!</h1>
    <p>I record sono stati salvati con successo.</p>
    <p>La finestra si chiuderà automaticamente tra 3 secondi.</p>
</div>
</body>
</html>
