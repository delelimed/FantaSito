<?php
include '../../db_connector.php';

// Ricezione dei dati inviati
$data = json_decode(file_get_contents("php://input"));

if (isset($data->bonusId) && isset($data->nomeBonus) && isset($data->educatoreassociato) && isset($data->punti)) {
    // Prepara l'istruzione SQL per l'aggiornamento
    $bonusId = $conn->real_escape_string($data->bonusId);
    $nomeBonus = $conn->real_escape_string($data->nomeBonus);
    $educatoreassociato = $conn->real_escape_string($data->educatoreassociato);
    $punti = $conn->real_escape_string($data->punti);

    $query = "UPDATE fs_bonusmalus SET nome_bonus = '$nomeBonus', id_educatore = '$educatoreassociato', punti = '$punti' WHERE id = '$bonusId'";

    if ($conn->query($query) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Dati incompleti"]);
}

$conn->close();
?>
