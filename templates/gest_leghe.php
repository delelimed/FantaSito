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
                            <h1 class="m-0">Gestisci Leghe</h1>
                            <button type="button" class="btn btn-info"
                                    data-toggle="modal"
                                    data-target="#aggiungiLegaModal">
                                Aggiungi Lega
                            </button>

                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- block content -->
                    <!-- < ?php include '../req/home_fx.php'; ?> -->

                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Elenco Leghe</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nome Lega</th>
                                    <th>Partecipanti</th>
                                    <th style="width: 40px">Punti</th>
                                    <th>Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // Assicurati di avere una connessione al database già aperta
                                $query = "
                SELECT 
                    l.id AS id_lega,
                    l.nome_lega,
                    GROUP_CONCAT(DISTINCT CONCAT(u.nome, ' ', u.cognome) SEPARATOR ', ') AS partecipanti,
                    GROUP_CONCAT(DISTINCT u.id SEPARATOR ',') AS partecipanti_ids
                FROM 
                    fs_leghe l
                LEFT JOIN 
                    fs_appaia_user_lega a ON l.id = a.id_lega
                LEFT JOIN 
                    fs_users u ON a.id_user = u.id
                GROUP BY 
                    l.id
                ORDER BY 
                    l.nome_lega ASC"; // Aggiunto l'ordinamento alfabetico per nome_lega

                                $result = mysqli_query($conn, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . htmlspecialchars($row['nome_lega']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['partecipanti']) . '</td>';
                                        echo '<td style="width: 40px">0</td>'; // Puoi sostituire 0 con la logica per i punti
                                        echo '<td>';
                                        echo '<button class="btn btn-warning" onclick="modificaLega(' . $row['id_lega'] . ', \'' . addslashes($row['nome_lega']) . '\', \'' . htmlspecialchars($row['partecipanti']) . '\', \'' . $row['partecipanti_ids'] . '\')">Modifica</button>';
                                        echo '<button class="btn btn-danger" onclick="eliminaLega(' . $row['id_lega'] . ')">Elimina</button>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="4">Nessuna lega trovata.</td></tr>';
                                }

                                ?>
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modificaLegaModal" tabindex="-1" role="dialog" aria-labelledby="modificaLegaLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modificaLegaLabel">Modifica Lega</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="modificaLegaForm">
                                        <input type="hidden" id="idLega" value="">
                                        <div class="form-group">
                                            <label for="nomeLega">Nome Lega</label>
                                            <input type="text" class="form-control" id="nomeLega" name="nome_lega" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="partecipantiLega">Partecipanti</label>
                                            <select class="form-control select2" id="partecipantiLega" name="partecipanti[]" multiple="multiple" required>
                                                <?php
                                                // Esegui la query per ottenere i partecipanti (utenti)
                                                $query_partecipanti = "SELECT id, nome, cognome FROM fs_users";
                                                $result_partecipanti = mysqli_query($conn, $query_partecipanti);

                                                // Aggiungi ogni partecipante come opzione nel selettore
                                                if ($result_partecipanti && mysqli_num_rows($result_partecipanti) > 0) {
                                                    while ($utente = mysqli_fetch_assoc($result_partecipanti)) {
                                                        echo '<option value="' . $utente['id'] . '">' . htmlspecialchars($utente['nome'] . ' ' . $utente['cognome']) . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">Nessun partecipante trovato</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                    <button type="button" class="btn btn-primary" id="salvaModificheLega">Salva Modifiche</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modale Aggiungi Lega -->
                    <div class="modal fade" id="aggiungiLegaModal" tabindex="-1" aria-labelledby="aggiungiLegaModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="aggiungiLegaModalLabel">Aggiungi Lega</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAggiungiLega">
                                        <div class="form-group">
                                            <label for="nomeLega">Nome Lega</label>
                                            <input type="text" class="form-control" id="nomeLegaadd" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="partecipantiLega">Partecipanti</label>
                                            <select id="partecipantiLegaadd" class="form-control" multiple="multiple" style="width: 100%;" required>
                                                <?php
                                                // Query per ottenere i partecipanti dalla tabella fs_users
                                                $query = "SELECT id, CONCAT(nome, ' ', cognome) AS nome_completo FROM fs_users";
                                                $result = mysqli_query($conn, $query);

                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nome_completo']) . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                    <button type="button" class="btn btn-primary" id="salvaNuovaLega">Aggiungi Lega</button>
                                </div>
                            </div>
                        </div>
                    </div>


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

        $(document).ready(function() {
            // Inizializza select2 per il selettore dei partecipanti nella modale
            $('#partecipantiLegaadd').select2({
                placeholder: 'Seleziona i partecipanti',
                width: '100%'
            });

            // Gestione del salvataggio della nuova lega
            $('#salvaNuovaLega').on('click', function() {
                var nomeLega = $('#nomeLegaadd').val().trim(); // Rimuove spazi vuoti
                var partecipanti = $('#partecipantiLegaadd').val(); // Ottiene l'array di ID selezionati

                // Controlla se il nome della lega è vuoto o se non ci sono partecipanti selezionati
                if (!nomeLega) {
                    alert('Inserisci un nome per la lega.');
                    return; // Ferma l'esecuzione se il campo è vuoto
                }

                if (!partecipanti || partecipanti.length === 0) {
                    alert('Seleziona almeno un partecipante.');
                    return; // Ferma l'esecuzione se non ci sono partecipanti selezionati
                }

                // Invio dei dati tramite AJAX
                $.ajax({
                    url: '../req/gestione_leghe/aggiungi_lega.php', // Il file PHP per aggiungere la lega
                    method: 'POST',
                    data: {
                        nome_lega: nomeLega,
                        partecipanti: partecipanti // Array di ID dei partecipanti
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            // Mostra un messaggio di successo e aggiorna la pagina o la lista delle leghe
                            alert(data.message);
                            $('#aggiungiLegaModal').modal('hide');
                            location.reload(); // Ricarica la pagina per mostrare i cambiamenti
                        } else {
                            // Mostra un messaggio di errore
                            alert(data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Gestione degli errori
                        console.error(xhr.responseText);
                        alert('Si è verificato un errore durante il salvataggio della lega.');
                    }
                });
            });
        });



    </script>

    <script>

        $(document).ready(function() {
            // Inizializza select2 per il selettore dei partecipanti
            $('#partecipantiLega').select2({
                placeholder: 'Seleziona i partecipanti',
                width: '100%'
            });
        });
        $(document).ready(function() {
            // Inizializza select2 per il selettore dei partecipanti
            $('#partecipantiLega').select2({
                placeholder: 'Seleziona i partecipanti',
                width: '100%'
            });

            // Controlla se select2 è stato applicato correttamente
            console.log($.fn.select2 ? "Select2 is loaded" : "Select2 is not loaded");
            console.log($('#partecipantiLega').length ? "Element exists" : "Element not found");
        });


        function modificaLega(idLega, nomeLega, partecipanti, partecipantiIds) {
            // Popola i campi della modale con i dati della lega
            $('#idLega').val(idLega); // Inserisci l'id della lega nel campo nascosto
            $('#nomeLega').val(nomeLega);

            // Reset della select dei partecipanti
            $('#partecipantiLega').val(null).trigger('change');

            // Divide i partecipanti e gli ID
            var partecipantiArray = partecipanti.split(', ');
            var partecipantiIdsArray = partecipantiIds.split(',');

            // Seleziona i partecipanti già associati alla lega
            for (var i = 0; i < partecipantiIdsArray.length; i++) {
                $('#partecipantiLega').val(partecipantiIdsArray).trigger('change');
            }

            // Mostra la finestra modale
            $('#modificaLegaModal').modal('show');
        }


        // Gestione del salvataggio delle modifiche
        $('#salvaModificheLega').on('click', function() {
            var nomeLega = $('#nomeLega').val();
            var partecipanti = $('#partecipantiLega').val();

            console.log("Nome Lega:", nomeLega);
            console.log("Partecipanti IDs:", partecipanti);

            // Chiudi la finestra modale
            $('#modificaLegaModal').modal('hide');
        });

        // Gestione del salvataggio delle modifiche
        $('#salvaModificheLega').on('click', function() {
            var idLega = $('#idLega').val(); // ID della lega nascosto nella modale
            var nomeLega = $('#nomeLega').val();
            var partecipanti = $('#partecipantiLega').val(); // Ottiene l'array di ID selezionati

            // Invio dei dati tramite AJAX
            $.ajax({
                url: '../req/gestione_leghe/salva_lega.php',
                method: 'POST',
                data: {
                    id_lega: idLega,
                    nome_lega: nomeLega,
                    partecipanti: partecipanti // Array di ID dei partecipanti
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        // Mostra un messaggio di successo e aggiorna la pagina o la lista delle leghe
                        alert(data.message);
                        $('#modificaLegaModal').modal('hide');
                        location.reload(); // Ricarica la pagina per mostrare i cambiamenti
                    } else {
                        // Mostra un messaggio di errore
                        alert(data.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Gestione degli errori
                    console.error(xhr.responseText);
                }
            });
        });


    </script>

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




    <script>
        function eliminaLega(id) {
            if (confirm('Sei sicuro di voler eliminare questa lega?')) {
                // Invia una richiesta AJAX per eliminare la lega
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '../req/gestione_leghe/elimina_lega.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Aggiorna la pagina o ricarica i dati
                        location.reload(); // Ricarica la pagina per aggiornare i dati
                    }
                };
                xhr.send('id_lega=' + id);
            }
        }

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
