<?php
// Assicurati di avere una connessione al database già aperta
include '../../db_connector.php'; // Includi il file di connessione al database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_lega'])) {
        $id_lega = intval($_POST['id_lega']); // Assicurati di sanitizzare l'input

        // Query per eliminare la lega
        $query = "DELETE FROM fs_leghe WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id_lega);

        if ($stmt->execute()) {
            echo 'Lega eliminata con successo.';
        } else {
            echo 'Errore durante l\'eliminazione della lega: ' . $conn->error;
        }

        $stmt->close();
    } else {
        echo 'ID lega non fornito.';
    }
}
$conn->close(); // Chiudi la connessione
?>
