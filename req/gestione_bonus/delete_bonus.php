<?php
// Includi la connessione al database
include '../../db_connector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($id > 0) {
        $query = "DELETE FROM fs_bonusmalus WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Bonus eliminato con successo.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Errore durante l\'eliminazione del bonus.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'ID non valido.']);
    }
}

$conn->close();
?>

