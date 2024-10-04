<?php
include '../../db_connector.php'; // Assicurati che il percorso sia corretto

if (isset($_POST['evento'])) {
    $evento_id = $_POST['evento'];

    // Query per ottenere i dettagli degli educatori associati all'evento
    $query = "
        SELECT e.educatore AS educatore, bm.nome_bonus AS nome_bonus, re.id_educatore AS id_educatore, re.punti AS punteggio
        FROM fs_registra_eventi AS re
        JOIN fs_educatori AS e ON re.id_educatore = e.id
        JOIN fs_bonusmalus AS bm ON re.bonusmalus = bm.id
        WHERE re.evento = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $evento_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Array per raggruppare i punteggi per ogni educatore
    $educatori = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nome_bonus = htmlspecialchars($row['nome_bonus']); // Nome del bonus
            $id_educatore = htmlspecialchars($row['id_educatore']);
            $punteggio = htmlspecialchars($row['punteggio']);
            $educatore = htmlspecialchars($row['educatore']); // Nome dell'educatore

            // Raggruppa i bonus e punteggi per ogni educatore
            if (!isset($educatori[$id_educatore])) {
                $educatori[$id_educatore] = ['nome' => $educatore, 'bonus' => []]; // Inizializza l'array se non esiste
            }
            $educatori[$id_educatore]['bonus'][] = ['nome_bonus' => $nome_bonus, 'punteggio' => $punteggio];
        }

        // Mostra i risultati
        foreach ($educatori as $data) {
            echo '<div><strong>' . $data['nome'] . ':</strong></div>'; // Nome dell'educatore senza ID
            foreach ($data['bonus'] as $bonusData) {
                echo '<div>' . $bonusData['nome_bonus'] . ': ' . $bonusData['punteggio'] . ' punti</div>'; // Dettagli nome bonus e punteggio
            }
        }
    } else {
        echo '<div>Nessun punteggio trovato per questo evento.</div>';
    }

    // Chiudi lo statement
    $stmt->close();
}
?>

