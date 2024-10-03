<?php
include '../../db_connector.php'; // Assicurati che il percorso sia corretto

if (isset($_POST['evento'])) {
    $evento_id = $_POST['evento'];

    // Query per ottenere i punteggi degli educatori associati all'evento
    $query = "
        SELECT e.educatore AS educatore, SUM(re.punti) AS punteggio
        FROM fs_registra_eventi AS re
        JOIN fs_squadra AS sq ON re.id_educatore = sq.id_educatore
        JOIN fs_educatori AS e ON sq.id_educatore = e.id
        WHERE re.evento = ?
        GROUP BY e.id
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $evento_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div><strong>' . htmlspecialchars($row['educatore']) . ':</strong> ' . htmlspecialchars($row['punteggio']) . ' punti</div>';
        }
    } else {
        echo '<div>Nessun punteggio trovato per questo evento.</div>';
    }

    // Chiudi lo statement
    $stmt->close();
}
?>
