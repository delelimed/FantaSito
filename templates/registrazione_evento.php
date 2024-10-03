<?php
// Include il file di configurazione per la connessione al database
include '../db_connector.php';

// Controlla se sono stati forniti i parametri di data, tipo evento e id_evento
if (isset($_GET['data']) && isset($_GET['tipo_evento']) && isset($_GET['id_evento'])) {
    $data = $_GET['data'];
    $tipo_evento = $_GET['tipo_evento'];
    $id_evento = $_GET['id_evento']; // Recupera l'ID dell'evento
} else {
    // Se non ci sono parametri, reindirizza a una pagina di errore o alla pagina principale
    header("Location: reg_eventi.php");
    exit();
}

// Esegui la query per ottenere tutti gli educatori
$sql = "SELECT id, educatore FROM fs_educatori";
$result = $conn->query($sql);

// Recupera i bonus/malus già associati all'evento
$bonusmalus_assoc = [];
$bonusmalus_sql = "SELECT bonusmalus FROM fs_registra_eventi WHERE evento = ?";
$stmt = $conn->prepare($bonusmalus_sql);
$stmt->bind_param("i", $id_evento);
$stmt->execute();
$result_bonusmalus = $stmt->get_result();

while ($row = $result_bonusmalus->fetch_assoc()) {
    $bonusmalus_assoc[] = $row['bonusmalus'];
}

// Chiudi lo statement
$stmt->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Aggiungi Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3>Aggiungi Records per Evento</h3>
    <h5>Data Evento: <?php echo htmlspecialchars($data); ?></h5>
    <h5>Tipo Evento: <?php echo htmlspecialchars($tipo_evento); ?></h5>
    <h5>ID Evento: <?php echo htmlspecialchars($id_evento); ?></h5> <!-- Mostra l'ID dell'evento -->

    <form method="POST" action="../req/gestione_eventi/salva_evento.php">
        <input type="hidden" name="data" value="<?php echo htmlspecialchars($data); ?>">
        <input type="hidden" name="tipo_evento" value="<?php echo htmlspecialchars($tipo_evento); ?>">
        <input type="hidden" name="id_evento" value="<?php echo htmlspecialchars($id_evento); ?>"> <!-- Campo nascosto per l'ID dell'evento -->

        <div class="form-group">
            <label>Seleziona Educatori:</label>
            <?php
            // Ottieni la lista degli educatori
            if ($result->num_rows > 0) {
                while ($educatore = $result->fetch_assoc()) {
                    $id_educatore = $educatore['id'];
                    echo '<div class="form-check">';

                    // Mostra il nome dell'educatore
                    echo '<label class="form-check-label" style="font-size: 1.5em; font-weight: bold; text-transform: uppercase;">' . htmlspecialchars($educatore['educatore']) . '</label>';

                    // Ottieni i bonus/malus associati all'educatore
                    $bonusmalus_sql = "SELECT id AS id_bonusmalus, nome_bonus, punti FROM fs_bonusmalus WHERE id_educatore = $id_educatore";
                    $bonusmalus_result = $conn->query($bonusmalus_sql);

                    if ($bonusmalus_result->num_rows > 0) {
                        while ($bonusmalus = $bonusmalus_result->fetch_assoc()) {
                            $isChecked = in_array($bonusmalus['id_bonusmalus'], $bonusmalus_assoc) ? 'checked' : '';
                            echo '<div class="form-check" style="margin-left: 20px;">';
                            echo '<input class="form-check-input" type="checkbox" name="bonusmalus[' . $id_educatore . '][]" value="' . htmlspecialchars($bonusmalus['id_bonusmalus']) . '" ' . $isChecked . '>'; // Usa l'ID del bonusmalus come valore
                            echo '<label class="form-check-label">' . htmlspecialchars($bonusmalus['nome_bonus']) . ' (' . htmlspecialchars($bonusmalus['punti']) . ' punti)</label>';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="form-check" style="margin-left: 20px;">Nessun bonus/malus disponibile.</div>';
                    }
                    echo '</div>';
                }
            } else {
                echo "<p>Nessun educatore registrato.</p>";
            }
            ?>
        </div>

        <button type="submit" class="btn btn-primary">Salva Records</button>
        <a href="javascript:void(0);" class="btn btn-secondary" onclick="window.close();">Annulla</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Chiudi la connessione al database
$conn->close();
?>
