<?php
// Assicurati di avere una connessione al database già aperta
include '../../db_connector.php'; // Assicurati di includere il file di connessione

$query = "SELECT id, nome, cognome FROM fs_users";
$result = mysqli_query($conn, $query);

$partecipanti = [];
while ($row = mysqli_fetch_assoc($result)) {
    $partecipanti[] = $row;
}

header('Content-Type: application/json');
echo json_encode($partecipanti);
?>
