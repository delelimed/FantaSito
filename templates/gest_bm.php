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

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
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
                                    <i class="nav-icon fa fa-upload" aria-hidden="true"></i>
                                    <p>
                                        La Mia Squadra
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="nav-icon fa fa-upload" aria-hidden="true"></i>
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
                                    <i class="fa fa-folder-open nav-icon" aria-hidden="true"></i>
                                    <p>
                                        La Mia Interlega
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="fa fa-folder-open nav-icon" aria-hidden="true"></i>
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
                                    <i class="fa fa-folder-open nav-icon" aria-hidden="true"></i>
                                    <p>
                                        Classifica
                                    </p>
                                    <span class="badge bg-success">Active</span>
                                <?php else : ?>
                                    <i class="fa fa-folder-open nav-icon" aria-hidden="true"></i>
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
                            <h1 class="m-0">Gestisci Bonus e Malus</h1>
                            <button type="button" class="btn btn-info"
                                    data-toggle="modal"
                                    data-target="#AggiungiBM">
                                Aggiungi Bonus / Malus
                            </button>

                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- block content -->
                    <!-- < ?php include '../req/home_fx.php'; ?> -->

                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Elenco Bonus & Malus</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Educatore</th>
                                    <th>Descrizione</th>
                                    <th style="width: 40px">Punti</th>
                                    <th>Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // Includi la connessione al database
                                include '../db_connector.php';

                                // Query per recuperare i dati da fs_bonusmalus e il nome dell'educatore da fs_educatori
                                $query_bonusmalus = "
                SELECT 
                    fs_bonusmalus.id, 
                    fs_bonusmalus.nome_bonus, 
                    fs_bonusmalus.punti, 
                    fs_educatori.id AS id_educatore,  -- Aggiunto per ottenere l'ID dell'educatore
                    fs_educatori.educatore AS nome_educatore 
                FROM 
                    fs_bonusmalus 
                JOIN 
                    fs_educatori 
                ON 
                    fs_bonusmalus.id_educatore = fs_educatori.id
                ORDER BY fs_educatori.educatore ASC"; // Aggiunto l'ordinamento per educatore in ordine alfabetico

                                $stmt = $conn->prepare($query_bonusmalus);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    // Ciclo per ogni riga dei risultati e costruisce la tabella
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        // Mostra il nome dell'educatore dalla tabella fs_educatori
                                        echo "<td>" . htmlspecialchars($row['nome_educatore']) . "</td>";
                                        // Mostra la descrizione del bonus
                                        echo "<td>" . htmlspecialchars($row['nome_bonus']) . "</td>";
                                        // Mostra i punti
                                        echo "<td>" . htmlspecialchars($row['punti']) . "</td>";
                                        // Colonna delle azioni con i pulsanti Modifica ed Elimina
                                        echo "<td>
                        <button class='btn btn-warning btn-sm' onclick='modificaBonus(" . $row['id'] . ", \"" . htmlspecialchars($row['nome_bonus']) . "\", " . $row['id_educatore'] . ", " . $row['punti'] . ")'>Modifica</button>
                        <button class='btn btn-danger btn-sm' onclick='eliminaBonus(" . $row['id'] . ")'>Elimina</button>
                    </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Nessun dato trovato.</td></tr>";
                                }

                                $stmt->close();
                                $conn->close();
                                ?>
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div>

                    <!-- modal -->
                    <?php
                    // Connessione al database
                    include '../db_connector.php';

                    // Recupera gli educatori
                    $query = "SELECT id, educatore FROM fs_educatori";
                    $result = $conn->query($query);

                    $educatori = [];
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $educatori[] = $row;
                        }
                    }
                    $conn->close();
                    ?>

                    <!-- Modale per modificare il bonus -->
                    <div class="modal fade" id="modificaBonusModal" tabindex="-1" aria-labelledby="modificaBonusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modificaBonusModalLabel">Modifica Bonus</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="modificaBonusForm">
                                        <input type="hidden" id="bonusId" name="bonusId">
                                        <div class="form-group">
                                            <label for="nomeBonus">Nome Bonus</label>
                                            <input type="text" class="form-control" id="nomeBonus" name="nomeBonus" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="educatoreassociato">Educatore Associato</label>
                                            <select class="form-control" id="educatoreassociato" name="educatoreassociato" required>
                                                <option value="">Seleziona Educatore</option>
                                                <?php foreach ($educatori as $educatore): ?>
                                                    <option value="<?php echo $educatore['id']; ?>"><?php echo htmlspecialchars($educatore['educatore']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="punti">Punti</label>
                                            <input type="number" class="form-control" id="punti" name="punti" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <button type="button" class="btn btn-primary" onclick="salvaModificaBonus()">Salva modifiche</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- aggiungi malus o bonus -->
                    <!-- Finestra Modale per Aggiungere Bonus / Malus -->
                    <div class="modal fade" id="AggiungiBM" tabindex="-1" aria-labelledby="AggiungiBMLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="AggiungiBMLabel">Aggiungi Bonus / Malus</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="aggiungiBonusForm">
                                        <div class="form-group">
                                            <label for="nomeBonus">Nome Bonus / Malus</label>
                                            <input type="text" class="form-control" id="nomeBonusagg" name="nomeBonusagg" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="educatoreassociato">Educatore Associato</label>
                                            <select class="form-control" id="educatoreassociatoagg" name="educatoreassociatoagg" required>
                                                <option value="">Seleziona Educatore</option>
                                                <?php foreach ($educatori as $educatore): ?>
                                                    <option value="<?php echo $educatore['id']; ?>"><?php echo htmlspecialchars($educatore['educatore']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="punti">Punti</label>
                                            <input type="number" class="form-control" id="puntiagg" name="puntiagg" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <button type="button" class="btn btn-primary" onclick="salvaAggiungiBonus()">Salva</button>
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

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <!-- Include jQuery library if not already included -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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

        function eliminaBonus(id) {
            if (confirm("Sei sicuro di voler eliminare questo bonus?")) {
                $.ajax({
                    url: '../req/gestione_bonus/delete_bonus.php', // Percorso corretto per il file delete_bonus.php
                    type: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            // Ricarica la tabella o rimuovi la riga eliminata dalla tabella
                            location.reload(); // Ricarica la pagina per mostrare l'aggiornamento
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Si è verificato un errore: ' + error);
                    }
                });
            }
        }
        function mostraModalModificaBonus(id, educatoreId, nomeBonus, punti) {
            // Imposta i valori nei campi del modulo
            $('#giocatoreId').val(id);
            $('#educatore_id').val(educatoreId);
            $('#nome_bonus').val(nomeBonus);
            $('#punti').val(punti);

            // Mostra la modale
            $('#modificaBonusModal').modal('show');
        }

        $('#salvaModifiche').on('click', function() {
            var id = $('#giocatoreId').val();
            var educatore_id = $('#educatore_id').val();
            var nome_bonus = $('#nome_bonus').val();
            var punti = $('#punti').val();

            $.ajax({
                url: '../req/gestione_bonus/modifica_bonus.php', // Percorso corretto per il file modifica_bonus.php
                type: 'POST',
                data: {
                    id: id,
                    educatore_id: educatore_id,
                    nome_bonus: nome_bonus,
                    punti: punti
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        // Ricarica la tabella o aggiorna la riga modificata
                        location.reload(); // Ricarica la pagina per mostrare l'aggiornamento
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Si è verificato un errore: ' + error);
                }
            });
        });

        function modificaBonus(id, nomeBonus, educatoreId, punti) {
            // Imposta i valori nei campi del modulo
            document.getElementById('bonusId').value = id;
            document.getElementById('nomeBonus').value = nomeBonus;
            document.getElementById('educatoreassociato').value = educatoreId; // Assicurati che questo sia l'ID dell'educatore
            document.getElementById('punti').value = punti;

            // Mostra la finestra modale
            $('#modificaBonusModal').modal('show');
        }


        function salvaModificaBonus() {
            // Ottieni i valori dal modulo
            const bonusId = document.getElementById('bonusId').value;
            const nomeBonus = document.getElementById('nomeBonus').value;
            const educatoreassociato = document.getElementById('educatoreassociato').value;
            const punti = document.getElementById('punti').value;

            // Crea un oggetto per i dati
            const data = {
                bonusId: bonusId,
                nomeBonus: nomeBonus,
                educatoreassociato: educatoreassociato,
                punti: punti
            };

            // Invia i dati al server
            fetch('../req/gestione_bonus/salva_bonus.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        alert('Modifiche salvate con successo!');
                        // Chiudi la modale
                        $('#modificaBonusModal').modal('hide');
                        // Aggiorna la pagina o la tabella dei bonus, se necessario
                        location.reload(); // Ricarica la pagina se necessario
                    } else {
                        alert('Errore nel salvataggio delle modifiche: ' + result.message);
                    }
                })
                .catch(error => {
                    console.error('Errore:', error);
                    alert('Errore nel salvataggio delle modifiche.');
                });
        }

        function salvaAggiungiBonus() {
            const nomeBonus = document.getElementById('nomeBonusagg').value;
            const educatoreassociato = document.getElementById('educatoreassociatoagg').value;
            const punti = document.getElementById('puntiagg').value;

            const data = {
                nomeBonus: nomeBonus,
                educatoreassociato: educatoreassociato,
                punti: punti
            };

            fetch('../req/gestione_bonus/add_bonus.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        alert('Bonus / Malus aggiunto con successo!');
                        location.reload(); // Ricarica la pagina
                    } else {
                        alert('Errore nell\'aggiunta: ' + result.message);
                    }
                })
                .catch(error => {
                    console.error('Errore:', error);
                    alert('Errore nell\'aggiunta.');
                });
        }



    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
