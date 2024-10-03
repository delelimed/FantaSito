<?php
// Assicurati di avere una connessione al database già aperta
include '../../db_connector.php'; // Includi il file di connessione al database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_interlega'])) {
        $id_interlega = intval($_POST['id_interlega']); // Assicurati di sanitizzare l'input

        // Query per eliminare la lega
        $query = "DELETE FROM fs_interleghe WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id_interlega);

        if ($stmt->execute()) {
            echo 'Interlega eliminata con successo.';
        } else {
            echo 'Errore durante l\'eliminazione della interlega: ' . $conn->error;
        }

        $stmt->close();
    } else {
        echo 'ID interlega non fornito.';
    }
}
$conn->close(); // Chiudi la connessione
?>
