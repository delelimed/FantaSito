<?php
// Connessione al database
include '../../db_connector.php';

// Ricezione dei dati inviati
$data = json_decode(file_get_contents("php://input"));

if (isset($data->nomeBonus) && isset($data->educatoreassociato) && isset($data->punti)) {
    $nomeBonus = $conn->real_escape_string($data->nomeBonus);
    $educatoreassociato = $conn->real_escape_string($data->educatoreassociato);
    $punti = $conn->real_escape_string($data->punti);

    $query = "INSERT INTO fs_bonusmalus (nome_bonus, id_educatore, punti) VALUES ('$nomeBonus', '$educatoreassociato', '$punti')";

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
