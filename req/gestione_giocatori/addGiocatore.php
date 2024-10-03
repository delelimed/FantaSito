<?php
// Includi la connessione al database
include '../../db_connector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera i dati dal form
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $cognome = isset($_POST['cognome']) ? $_POST['cognome'] : '';
    $uname = isset($_POST['uname']) ? $_POST['uname'] : '';
    $interlega = isset($_POST['interlega']) ? $_POST['interlega'] : '';
    $lega = isset($_POST['lega']) ? $_POST['lega'] : '';
    $admin = isset($_POST['admin']) ? (int)$_POST['admin'] : 0;
    $password = '$2y$15$12QUZ2iW4b3VV0790ytn9eH2ciAbOIzL2ZkhCHRFC6EV5yVn7XB82';

    // Verifica i valori ricevuti
    echo json_encode([
        'nome' => $nome,
        'cognome' => $cognome,
        'uname' => $uname,
        'interlega' => $interlega,
        'lega' => $lega,
        'admin' => $admin
    ]);

    // Assicurati che i dati non siano vuoti prima di continuare con l'inserimento
    if ($nome && $cognome && $uname) {
        $conn->begin_transaction();

        try {
            // Inserisci i dati nella tabella fs_users
            $query_users = "INSERT INTO fs_users (nome, cognome, utente, password, admin) VALUES (?, ?, ?, ?, ?)";
            $stmt_users = $conn->prepare($query_users);
            $stmt_users->bind_param("ssssi", $nome, $cognome, $uname, $password, $admin);
            $stmt_users->execute();

            // Recupera l'ID dell'utente appena inserito
            $id_user = $conn->insert_id;

            // Inserisci i dati nella tabella fs_appaia_user_lega
            $query_lega = "INSERT INTO fs_appaia_user_lega (id_user, id_lega) VALUES (?, ?)";
            $stmt_lega = $conn->prepare($query_lega);
            $stmt_lega->bind_param("ii", $id_user, $lega);
            $stmt_lega->execute();

            // Inserisci i dati nella tabella fs_appaia_user_interlega
            $query_interlega = "INSERT INTO fs_appaia_user_interlega (id_user, id_interlega) VALUES (?, ?)";
            $stmt_interlega = $conn->prepare($query_interlega);
            $stmt_interlega->bind_param("ii", $id_user, $interlega);
            $stmt_interlega->execute();

            $conn->commit();
        } catch (Exception $e) {
            $conn->rollback();
            echo "Errore: " . $e->getMessage();
        } finally {
            $stmt_users->close();
            $stmt_lega->close();
            $stmt_interlega->close();
            $conn->close();
        }
    } else {
        echo "Errore: Campi vuoti.";
    }
}
?>
