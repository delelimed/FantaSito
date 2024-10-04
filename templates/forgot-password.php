<!DOCTYPE html>
<html data-bs-theme="light" lang="en" style="background: rgb(10,43,62);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Forgotten Password - SbobinaX</title>
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css?h=97380e22c8933e9aa79cbc2390b9f15a">
    <link rel="manifest" href="/manifest.json?h=af088d50ef94b82f510c17b292dfdc04" crossorigin="use-credentials">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
</head>

<body class="bg-gradient-primary" style="background: rgb(10,43,62);">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-password-image" style="background: url(&quot;/assets/dist/img/scimmia.jpeg?h=0fdb69f99cb40919098362d9e9a71e32&quot;) center / cover no-repeat;"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-2">Hai Dimenticato la Password?</h4>
                                    <p class="mb-4">Succede (solo a te, ma succede). Contatta il tuo educatore per farti resettare la password. Intanto, inserisci di seguito il tuo username (con il quale accedi) per provvedere ad un ripristino più rapido.</p>
                                </div>
                                <form class="user" id="resetPasswordForm">
                                    <div class="mb-3">
                                        <input id="usernameInput" class="form-control" type="text" style="height: 53.1875px; padding: 16px;" placeholder="Username">
                                    </div>
                                    <button class="btn btn-primary d-block btn-user w-100" type="button" onclick="resetPassword()">Reset Password</button>
                                </form>
                                <div id="confirmationMessage" style="display: none; margin-top: 10px;"></div>
                                <div class="text-center">
                                    <hr>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="login.php">Hai già un account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/script.min.js?h=bdf36300aae20ed8ebca7e88738d5267"></script>

<script>
    function resetPassword() {
        var username = document.getElementById("usernameInput").value;

        // Controlla se l'username è vuoto
        if (!username.trim()) {
            document.getElementById("confirmationMessage").innerHTML = '<p style="color: red;">Inserisci il tuo username.</p>';
            document.getElementById("confirmationMessage").style.display = 'block';
            return;
        }

        fetch('../req/recpssw_fx/richiesta.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ username: username }),
        })
            .then(response => response.json())
            .then(data => {
                var confirmationMessage = document.getElementById("confirmationMessage");
                if (data.success) {
                    // Mostra il messaggio di successo
                    confirmationMessage.innerHTML = '<p style="color: green;">' + data.message + '</p>';
                } else {
                    // Mostra il messaggio di errore
                    confirmationMessage.innerHTML = '<p style="color: red;">Errore: ' + data.message + '</p>';
                }
                // Mostra il messaggio
                confirmationMessage.style.display = 'block';
            })
            .catch((error) => {
                console.error('Errore durante il salvataggio dello Username:', error);
                // Mostra il messaggio di errore generico
                document.getElementById("confirmationMessage").innerHTML = '<p style="color: red;">Errore durante la richiesta. Contatta direttamente il tuo educatore.</p>';
                document.getElementById("confirmationMessage").style.display = 'block';
            });
    }
</script>
</body>


</html>