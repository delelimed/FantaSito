<?php
// Imposta la durata massima della sessione a 15 minuti (900 secondi)
ini_set('session.gc_maxlifetime', 15);

// Imposta i parametri del cookie di sessione per scadere dopo 15 minuti (900 secondi)
session_set_cookie_params(15);
session_start();

if (isset($_POST['uname']) && isset($_POST['password'])) {
    include "../../db_connector.php";

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);

    // Verifica se è stata impostata una variabile di sessione per i tentativi errati
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
    }

    if (empty($uname) || empty($password)) {
        $em = "User and Password are Required";
        header("Location: ../../templates/login.php?error=$em");
        exit;
    } else {
        // Controlla il numero di tentativi errati
        if ($_SESSION['login_attempts'] >= 3) {
            // Limite di tentativi errati superato, blocca l'accesso
            $em = "Raggiunto limite tentativi. Riprova piu' tardi.";
            header("Location: ../../templates/login.php?error=$em");
            exit();
        }

        // Query utilizzando prepared statements per ottenere l'hash dell'utente dal database
        $sql = "SELECT id, utente, nome, email, password, admin FROM sx_users WHERE utente=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verifica la password utilizzando password_verify()
            if (password_verify($password, $row['password'])) {
                if ($row['locked'] == 1) {
                    $em = "Account bloccato. Contatta l'amministratore.";
                    header("Location: ../../templates/login.php?error=$em");
                    exit();
                }

                // Password corretta, autentica l'utente e impostane le variabili di sessione
                $_SESSION['utente'] = $row['utente'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['admin'] = $row['admin'];
                $_SESSION['login_time'] = time();
                $_SESSION['locked'] = $row['locked'];

                // Azzera i tentativi errati
                $_SESSION['login_attempts'] = 0;


                header("Location: ../../templates/home.php");
                exit();
            } else {
                // Incrementa il numero di tentativi errati
                $_SESSION['login_attempts']++;

                $em = "Password non valida";
                header("Location: ../../templates/login.php?error=$em");
                exit();
            }
        } else {
            // Incrementa il numero di tentativi errati
            $_SESSION['login_attempts']++;

            $em = "Utente non trovato";
            header("Location: ../../templates/login.php?error=$em");
            exit();
        }
    }
} else {
    header("Location: ../../templates/login.php");
    exit;
}
?>

