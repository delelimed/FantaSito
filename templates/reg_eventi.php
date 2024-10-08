<meta name="robots" content="noindex">
<?php
session_start();
include '../db_connector.php';
if (isset($_SESSION['id']) && isset($_SESSION['nome']) && $_SESSION['locked'] == 0 && $_SESSION['admin'] == 1){

    ?>


    <!DOCTYPE html>

    <html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FantaPG | Dashboard</title>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Include Select2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>



        <!-- Bootstrap 4 CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

        <style>
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: black; /* Imposta il colore del testo in nero */
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                color: black; /* Imposta il colore del testo in nero per selezione multipla */
            }
        </style>


    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <h4 style="margin-left: 10px; margin-top: 5px;">FantaPG: si raga, l'ho fatto veramente...</h4>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: rgb(10,43,62);">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <span class="brand-text "><strong> FantaPG </strong></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block"> <strong> <?php echo $_SESSION['nome'];
                                echo " ";
                                echo $_SESSION['cognome'];
                                ?> </strong> </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <?php
                        $active_menu = 'Home';
                        $page_name = 'home.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/home.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Home') : ?>
                                    <i class="nav-icon fas fa-home active" aria-hidden="true"></i>
                                    <p>
                                        Home
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="nav-icon fas fa-home active" aria-hidden="true"></i>
                                    <p>
                                        Home
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>

                        <?php
                        $active_menu = 'Squadra';
                        $page_name = 'squadra.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/squadra.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'La Mia Squadra') : ?>
                                    <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                                    <p>
                                        La Mia Squadra
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                                    <p>
                                        La Mia Squadra
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>


                        <?php
                        $active_menu = 'Vedi_Lega';
                        $page_name = 'vedi_lega.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/vedi_lega.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Vedi_Lega') : ?>
                                    <i class="nav-icon fa fa fa-eye" aria-hidden="true"></i>
                                    <p>
                                        La Mia Lega
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="nav-icon fa fa fa-eye" aria-hidden="true"></i>
                                    <p>
                                        La Mia Lega
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>


                        <?php
                        $active_menu = 'vedi_interlega';
                        $page_name = 'vedi_interlega.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/vedi_interlega.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'vedi_interlega') : ?>
                                    <i class="nav-icon fa fa fa-eye" aria-hidden="true"></i>
                                    <p>
                                        La Mia Interlega
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="nav-icon fa fa fa-eye" aria-hidden="true"></i>
                                    <p>
                                        La Mia Interlega
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>


                        <?php
                        $active_menu = 'classifica';
                        $page_name = 'classifica.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/classifica.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'classifica') : ?>
                                    <i class="fa fa-trophy nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Classifica
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="fa fa-trophy nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Classifica
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>

                        <?php
                        $active_menu = 'bonus_malus';
                        $page_name = 'bonus_malus.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/bonus_malus.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'bonus_malus') : ?>
                                    <i class="fa fa-folder-open nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Lista Bonus/Malus
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="fa fa-folder-open nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Lista Bonus/Malus
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>

                        <?php
                        $active_menu = 'Account';
                        $page_name = 'Account.php';
                        ?>
                        <li class="nav-item">
                            <a href="../templates/account.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Account') : ?>
                                    <i class="nav-icon fas fa-user" aria-hidden="true"></i>
                                    <p>
                                        Account Utente
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="nav-icon fas fa-user" aria-hidden="true"></i>
                                    <p>
                                        Account Utente
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>


                        <li class="nav-item"> <!-- impostazioni -->
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    Impostazioni
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <?php
                                    $active_menu = 'gest_giocatori';
                                    $page_name = 'gest_giocatori.php';
                                    ?>
                                <li class="nav-item">
                                    <a href="../templates/gest_giocatori.php" class="nav-link">
                                        <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'gest_giocatori') : ?>
                                            <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                            <p>
                                                Gestisci Giocatori
                                            </p>
                                            <span class="badge bg-success">Active</span>
                                        <?php else : ?>
                                            <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                            <p>
                                                Gestisci Giocatori
                                            </p>
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                    $active_menu = 'gest_educatori';
                                    $page_name = 'reg_educatore.php';
                                    ?>
                                <li class="nav-item">
                                    <a href="../templates/reg_educatore.php" class="nav-link">
                                        <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'gest_educatori') : ?>
                                            <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                            <p>
                                                Gestisci Educatori
                                            </p>
                                            <span class="badge bg-success">Active</span>
                                        <?php else : ?>
                                            <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                            <p>
                                                Gestisci Educatori
                                            </p>
                                        <?php endif; ?>
                                    </a>
                                </li>
                        </li>
                        <li class="nav-item">
                            <?php
                            $active_menu = 'gest_leghe';
                            $page_name = 'gest_leghe.php';
                            ?>
                        <li class="nav-item">
                            <a href="../templates/gest_leghe.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'gest_leghe') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Gestisci Leghe
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Gestisci Leghe
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">

                        <li class="nav-item">
                            <?php
                            $active_menu = 'gest_interleghe';
                            $page_name = 'gest_interleghe.php';
                            ?>
                        <li class="nav-item">
                            <a href="../templates/gest_interleghe.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'gest_interleghe') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Gestisci Interleghe
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Gestisci Interleghe
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $active_menu = 'gest_bm';
                            $page_name = 'gest_bm.php';
                            ?>
                        <li class="nav-item">
                            <a href="../templates/gest_bm.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'gest_bm') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Gestisci Bonus / Malus
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Gestisci Bonus / Malus
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../templates/reg_eventi.php" class="nav-link">
                                <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Avanzate') : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Registra Eventi
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Registra Eventi
                                    </p>
                                <?php endif; ?>
                            </a>
                        </li>
                    </ul>
                    </li> <!-- impostazioni -->

                    <?php
                    $active_menu = 'Info';
                    $page_name = 'info.php';
                    ?>
                    <li class="nav-item">
                        <a href="../templates/info.php" class="nav-link">
                            <?php if ($_SERVER['REQUEST_URI'] == $page_name && $active_menu == 'Info') : ?>
                                <i class="nav-icon fa fa-info" aria-hidden="true"></i>
                                <p>
                                    Info
                                </p>
                                <span class="badge bg-success">Active</span>
                            <?php else : ?>
                                <i class="nav-icon fa fa-info" aria-hidden="true"></i>
                                <p>
                                    Info
                                </p>
                            <?php endif; ?>
                        </a>
                    </li>


                    <li class="nav-item"> <!-- logout -->
                        <a href="../templates/logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Log Out
                            </p>
                        </a>
                    </li> <!-- logout -->




                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Gestione Eventi</h1>
                            <button type="button" class="btn btn-info"
                                    data-toggle="modal"
                                    data-target="#aggiungiinterLegaModal">
                                Registra un nuovo evento
                            </button>

                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#impostazioniModal">
                                Impostazioni
                            </button>


                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- block content -->
                    <!-- < ?php include '../req/home_fx.php'; ?> -->

                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Elenco Eventi Registrati</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Data Evento</th>
                                    <th>Tipo Evento</th>
                                    <th style="width: 40px">Records</th>
                                    <th>Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // Controlla la connessione
                                if ($conn->connect_error) {
                                    die("Connessione fallita: " . $conn->connect_error);
                                }

                                // Esegui la query con contatore
                                $sql = "SELECT 
                        e.id,
                        DATE_FORMAT(e.data, '%d/%m/%Y') AS giorno,
                        e.tipo_evento,
                        COUNT(r.evento) AS numero_records
                    FROM 
                        fs_eventi e
                    LEFT JOIN 
                        fs_registra_eventi r ON e.id = r.evento
                    GROUP BY 
                        e.id
                    ORDER BY 
                        e.data DESC";  // Ordinamento decrescente

                                $result = $conn->query($sql);

                                // Popola la tabella
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Converti la data dal formato 'gg/mm/aaaa' a 'aaaa-mm-gg'
                                        $data_convertita = DateTime::createFromFormat('d/m/Y', $row['giorno'])->format('Y-m-d');
                                        $id = $row['id']; // Prendi l'ID dall'array
                                        echo "<tr>
                        <td>{$row['giorno']}</td>
                        <td>{$row['tipo_evento']}</td>
                        <td>{$row['numero_records']}</td> <!-- Mostra il numero di records -->
                        <td>
                            <a href='registrazione_evento.php?data=" . urlencode($data_convertita) . "&tipo_evento=" . urlencode($row['tipo_evento']) . "&id_evento=" . urlencode($id) . "' class='btn btn-success' target='_blank'>Add Records</a>
                            <button type='button' class='btn btn-primary' 
                                onclick=\"apriModale('$data_convertita', '{$row['tipo_evento']}', '$id')\">Modifica</button>
                            <form method='POST' action='../req/gestione_eventi/elimina_record.php' style='display:inline;'>
                                <input type='hidden' name='data' value='{$data_convertita}'>
                                <input type='hidden' name='tipo_evento' value='{$row['tipo_evento']}'>
                                <input type='hidden' name='id' value='{$id}'> <!-- Campo nascosto per ID -->
                                <button type='submit' class='btn btn-danger' onclick='return confirm(\"Sei sicuro di voler eliminare questo evento?\");'>Elimina</button>
                            </form>
                        </td>
                    </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Nessun evento registrato</td></tr>";
                                }

                                $conn->close();
                                ?>
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div>





                    <div class="modal fade" id="modificaEventoModal" tabindex="-1" role="dialog" aria-labelledby="modificaEventoModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modificaEventoModalLabel">Modifica Evento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="modificaEventoForm" method="POST" action="../req/gestione_eventi/modifica_evento.php">
                                        <input type="hidden" id="eventoId" name="evento_id"> <!-- Campo nascosto per l'ID -->
                                        <div class="form-group">
                                            <label for="dataEvento">Data</label>
                                            <input type="date" class="form-control" id="dataEvento" name="data" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tipoEvento">Tipo Evento</label>
                                            <input type="text" class="form-control" id="tipoEvento" name="tipo_evento" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <button type="submit" form="modificaEventoForm" class="btn btn-primary">Salva modifiche</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="aggiungiinterLegaModal" tabindex="-1" role="dialog" aria-labelledby="aggiungiinterLegaModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="aggiungiinterLegaModalLabel">Registra un Nuovo Evento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="aggiungiEventoForm" method="POST" action="../req/gestione_eventi/add_evento.php"> <!-- Modifica l'azione se necessario -->
                                        <div class="form-group">
                                            <label for="dataEvento">Data Evento</label>
                                            <input type="date" class="form-control" id="dataEvento" name="data" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tipoEvento">Tipo Evento</label>
                                            <input type="text" class="form-control" id="tipoEvento" name="tipo_evento" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <button type="submit" form="aggiungiEventoForm" class="btn btn-primary">Registra Evento</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script>
                        // Funzione per aprire la modale e caricare i dati dell'evento
                        function apriModale(data, tipoEvento, id) {
                            // Imposta i valori dei campi di input
                            document.getElementById('dataEvento').value = data;
                            document.getElementById('tipoEvento').value = tipoEvento;

                            // Salva l'ID dell'evento nell'input nascosto del form
                            document.getElementById('eventoId').value = id;

                            // Mostra la modale
                            $('#modificaEventoModal').modal('show');
                        }
                    </script>





                    <!-- Modale Impostazioni -->
                    <div class="modal fade" id="impostazioniModal" tabindex="-1" role="dialog" aria-labelledby="impostazioniModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="impostazioniModalLabel">Impostazioni</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="impostazioniForm">
                                        <div class="mb-3">
                                            <label for="numero1" class="form-label">Prezzo Massimo</label>
                                            <input type="number" class="form-control" id="numero1" name="numero1" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="numero2" class="form-label">Numero Educatori (0 - no limit)</label>
                                            <input type="number" class="form-control" id="numero2" name="numero2" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Consenti Modifica Squadra</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="switchImpostazioni">
                                                <label class="form-check-label" for="switchImpostazioni">Modifiche Attive</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <button type="button" class="btn btn-primary" id="salvaImpostazioni">Salva</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Carica le impostazioni esistenti quando la modale viene aperta
                        $('#impostazioniModal').on('show.bs.modal', function () {
                            fetch('../req/carica_impostazioni.php')
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        document.getElementById('numero1').value = data.prezzo_massimo || ''; // Prezzo massimo
                                        document.getElementById('numero2').value = data.numero_educatori || ''; // Numero educatori
                                        document.getElementById('switchImpostazioni').checked = data.consenti_cambio == 1; // Consenti cambio
                                    } else {
                                        alert('Errore nel caricamento delle impostazioni: ' + data.message);
                                    }
                                })
                                .catch(error => {
                                    console.error('Errore:', error);
                                    alert('Si è verificato un errore durante il caricamento delle impostazioni.');
                                });
                        });

                        document.getElementById('salvaImpostazioni').addEventListener('click', function() {
                            const prezzoMassimo = document.getElementById('numero1').value;
                            const numeroEducatori = document.getElementById('numero2').value;
                            const consentiCambio = document.getElementById('switchImpostazioni').checked ? 1 : 0;

                            // Prepara i dati da inviare
                            const data = {
                                prezzo_massimo: prezzoMassimo,
                                numero_educatori: numeroEducatori,
                                consenti_cambio: consentiCambio
                            };

                            // Effettua una richiesta AJAX per salvare le impostazioni
                            fetch('../req/salva_impostazioni.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify(data)
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        alert('Impostazioni salvate con successo!');
                                        // Chiudi la modale
                                        $('#impostazioniModal').modal('hide');
                                    } else {
                                        alert('Errore nel salvataggio delle impostazioni: ' + data.message);
                                    }
                                })
                                .catch(error => {
                                    console.error('Errore:', error);
                                    alert('Si è verificato un errore durante il salvataggio delle impostazioni.');
                                });
                        });
                    </script>


                    <!-- end block content -->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Fanta PG &copy;
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2024 <a href="https://delelimed.github.io/" target="_blank" rel="noopener noreferrer">DELELIMED</a>.</strong> All rights reserved.
        </footer>
    </div>


    <!-- Modal -->

    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->

    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#avvisoModal').modal('show');
        });
        // Avvia il timer di 10 minuti
        var timeout = setTimeout(function() {
            // Esegui una richiesta AJAX per eseguire il logout
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "logout.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Reindirizza alla pagina di login dopo il logout forzato
                    window.location.href = "login.php";
                }
            };
            xhr.send();
        }, 10 * 60 * 1000); // 10 minuti in millisecondi
    </script>

   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
    </html>

    <?php

}elseif ($_SESSION['locked'] == 1) {
    echo "Risulta che tu abbia superato il numero massimo di malus. Il tuo account è stato disabilitato.";
    exit();
}
else
{
    header("Location: ../templates/login.php");
    exit();
}
?>