<meta name="robots" content="noindex">
<?php
session_start();
include '../db_connector.php';
if (isset($_SESSION['id']) && isset($_SESSION['nome']) && $_SESSION['locked'] == 0){

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
                            <h1 class="m-0">LA MIA SQUADRA</h1>

                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- block content -->
                    <?php
                    // Assume che la connessione al database ($conn) sia già avviata

                    // Ottieni l'ID utente dalla sessione
                    $user_id = $_SESSION['id'];

                    // Query per ottenere tutti gli educatori dalla tabella fs_educatori
                    $query_educatori = "SELECT id, educatore, prezzo FROM fs_educatori";
                    $result_educatori = $conn->query($query_educatori);

                    // Query per ottenere il valore dell'impostazione 'consenti_cambio'
                    $query_impostazioni = "
    SELECT valore 
    FROM fs_impostazioni 
    WHERE nome_impostazione = 'consenti_cambio'
";
                    $result_impostazioni = $conn->query($query_impostazioni);
                    $row_impostazioni = $result_impostazioni->fetch_assoc();

                    // Variabile per determinare se il pulsante deve essere attivo
                    $consenti_cambio = ($row_impostazioni['valore'] == 1) ? true : false;

                    // Query per ottenere il prezzo massimo
                    $query_prezzo_massimo = "
    SELECT valore 
    FROM fs_impostazioni 
    WHERE nome_impostazione = 'prezzo_massimo'
";
                    $result_prezzo_massimo = $conn->query($query_prezzo_massimo);
                    $row_prezzo_massimo = $result_prezzo_massimo->fetch_assoc();
                    $prezzo_massimo = $row_prezzo_massimo['valore'];

                    // Query per ottenere il numero richiesto di educatori
                    $query_numero_educatori = "
    SELECT valore 
    FROM fs_impostazioni 
    WHERE nome_impostazione = 'numero_educatori'
";
                    $result_numero_educatori = $conn->query($query_numero_educatori);
                    $row_numero_educatori = $result_numero_educatori->fetch_assoc();
                    $numero_educatori_richiesto = $row_numero_educatori['valore'];

                    // Gestione della logica di salvataggio (se la richiesta è POST)
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['seleziona_educatore'])) {
                        // Ottieni gli educatori selezionati dalla richiesta POST
                        $educatori_selezionati_post = $_POST['seleziona_educatore'];

                        // Calcola la somma dei prezzi degli educatori selezionati
                        $somma_prezzi = 0;
                        foreach ($educatori_selezionati_post as $educatore_id) {
                            $query_prezzo = "SELECT prezzo FROM fs_educatori WHERE id = ?";
                            $stmt_prezzo = $conn->prepare($query_prezzo);
                            $stmt_prezzo->bind_param('i', $educatore_id);
                            $stmt_prezzo->execute();
                            $result_prezzo = $stmt_prezzo->get_result();
                            if ($row_prezzo = $result_prezzo->fetch_assoc()) {
                                $somma_prezzi += $row_prezzo['prezzo'];
                            }
                            $stmt_prezzo->close();
                        }

                        // Controlla se la somma supera il prezzo massimo
                        if ($somma_prezzi > $prezzo_massimo) {
                            echo "<script>alert('La somma dei prezzi selezionati supera il prezzo massimo di " . htmlspecialchars($prezzo_massimo) . "€.');</script>";
                        } elseif ($numero_educatori_richiesto != 0 && count($educatori_selezionati_post) != $numero_educatori_richiesto) {
                            // Controllo sul numero di educatori selezionati
                            echo "<script>alert('Devi selezionare esattamente " . htmlspecialchars($numero_educatori_richiesto) . " educatori.');</script>";
                        } else {
                            // Cancellazione degli educatori esistenti nella squadra dell'utente
                            $query_delete = "DELETE FROM fs_squadra WHERE id_user = ?";
                            $stmt_delete = $conn->prepare($query_delete);
                            $stmt_delete->bind_param('i', $user_id);
                            $stmt_delete->execute();

                            // Inserisci i nuovi educatori selezionati
                            if (!empty($educatori_selezionati_post)) {
                                $query_insert = "INSERT INTO fs_squadra (id_user, id_educatore) VALUES (?, ?)";
                                $stmt_insert = $conn->prepare($query_insert);
                                foreach ($educatori_selezionati_post as $educatore_id) {
                                    $stmt_insert->bind_param('ii', $user_id, $educatore_id);
                                    $stmt_insert->execute();
                                }
                                $stmt_insert->close();
                            }

                            // Aggiungi un messaggio di successo qui, se lo desideri
                            echo "<script>alert('Modifiche salvate con successo!');</script>";
                        }
                    }

                    // Chiudi lo statement per la query della squadra se necessario
                    // Non è più necessario in questo contesto perché lo statement viene chiuso dopo l'uso

                    ?>

                    <!-- Pulsante Modifica Squadra -->
                    <button type="button" class="btn btn-info"
                            data-toggle="modal"
                            data-target="#modificaSquadraModal"
                        <?php echo !$consenti_cambio ? 'disabled' : ''; ?>>
                        Modifica Squadra
                    </button>

                    <!-- Modale Modifica Squadra -->
                    <div class="modal fade" id="modificaSquadraModal" tabindex="-1" role="dialog" aria-labelledby="modificaSquadraLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modificaSquadraLabel">Modifica la tua Squadra</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form per inviare la richiesta POST -->
                                    <form method="POST" action="">
                                        <!-- Tabella degli educatori -->
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Educatore</th>
                                                <th>Prezzo</th>
                                                <th>Seleziona</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            // Verifica se ci sono risultati dalla query
                                            if ($result_educatori->num_rows > 0) {
                                                // Itera su ogni educatore
                                                while($row = $result_educatori->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row['educatore']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['prezzo']) . "</td>";
                                                    // Controlla se l'id dell'educatore è nell'array degli educatori selezionati
                                                    $checked = in_array($row['id'], (isset($educatori_selezionati_post) ? $educatori_selezionati_post : [])) ? 'checked' : '';
                                                    echo "<td><input type='checkbox' name='seleziona_educatore[]' value='" . htmlspecialchars($row['id']) . "' $checked></td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='3'>Nessun educatore trovato.</td></tr>";
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                            <button type="submit" class="btn btn-primary">Salva modifiche</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>





                    <?php
                    // Assume che la connessione al database ($conn) sia già avviata
                    $user_id = $_SESSION['id']; // Recupero l'id dell'utente dalla sessione

                    // Query per ottenere i dati della squadra associata all'utente e i nomi degli educatori
                    $query_squadra = "
        SELECT fs_squadra.id_educatore, fs_educatori.educatore
        FROM fs_squadra
        JOIN fs_educatori ON fs_squadra.id_educatore = fs_educatori.id
        WHERE fs_squadra.id_user = ?
    ";
                    $stmt_squadra = $conn->prepare($query_squadra);
                    $stmt_squadra->bind_param('i', $user_id);
                    $stmt_squadra->execute();
                    $result_squadra = $stmt_squadra->get_result();
                    ?>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">La mia squadra</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Educatore</th>
                                    <th style="width: 40px">Punti</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // Verifica se ci sono risultati dalla query
                                if ($result_squadra->num_rows > 0) {
                                    // Itera su ogni riga della tabella
                                    while($row = $result_squadra->fetch_assoc()) {
                                        echo "<tr class='align-middle'>";
                                        echo "<td>" . htmlspecialchars($row['educatore']) . "</td>"; // Nome dell'educatore
                                        echo "<td> </td>"; // Punti ancora da definire
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>Nessun dato trovato.</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div>

                    <?php
                    // Chiudi lo statement e la connessione al database
                    $stmt_squadra->close();
                    $conn->close();
                    ?>


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
