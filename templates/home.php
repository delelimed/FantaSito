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
                        <h1 class="m-0">HOME</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- block content -->
                <!-- < ?php include '../req/home_fx.php'; ?> -->

                <div class="row">
                    <?php
                    include '../db_connector.php';
                    $user_id = $_SESSION['id'];

                    // Query per ottenere il punteggio totale dell'utente
                    $query = "
    SELECT COALESCE(SUM(re.punti), 0) AS punteggio
    FROM fs_squadra AS sq
    LEFT JOIN fs_registra_eventi AS re ON sq.id_educatore = re.id_educatore
    WHERE sq.id_user = ?
";

                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('i', $user_id); // 'i' indica che l'input è un intero
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result && $row = $result->fetch_assoc()) {
                        $num_sbobine_pronte = $row['punteggio'];
                    } else {
                        $num_sbobine_pronte = 0; // Se non ci sono eventi, punteggio sarà 0
                    }

                    // Chiudi lo statement
                    $stmt->close();
                    ?>

                    <div class="col-md-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo htmlspecialchars($num_sbobine_pronte); ?></h3>
                                <p>Punteggio</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fa fa-upload"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Punteggio Totale <i class=""></i>
                            </a>
                        </div>
                    </div>

                    <?php
                    include '../db_connector.php';
                    $user_id = $_SESSION['id'];

                    // Query per ottenere l'ID della lega dell'utente
                    $query_league = "
    SELECT al.id_lega
    FROM fs_appaia_user_lega AS al
    WHERE al.id_user = ?
";

                    $stmt_league = $conn->prepare($query_league);
                    $stmt_league->bind_param('i', $user_id);
                    $stmt_league->execute();
                    $result_league = $stmt_league->get_result();

                    if ($result_league && $row_league = $result_league->fetch_assoc()) {
                        $league_id = $row_league['id_lega'];

                        // Query per ottenere il punteggio totale della lega
                        $query = "
        SELECT COALESCE(SUM(re.punti), 0) AS punteggio
        FROM fs_squadra AS sq
        LEFT JOIN fs_registra_eventi AS re ON sq.id_educatore = re.id_educatore
        WHERE sq.id_user IN (
            SELECT al.id_user
            FROM fs_appaia_user_lega AS al
            WHERE al.id_lega = ?
        )
    ";

                        $stmt = $conn->prepare($query);
                        $stmt->bind_param('i', $league_id); // 'i' indica che l'input è un intero
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result && $row = $result->fetch_assoc()) {
                            $num_sbobine_da_revisionare = $row['punteggio'];
                        } else {
                            $num_sbobine_da_revisionare = 0; // Se non ci sono eventi, punteggio sarà 0
                        }

                        // Chiudi lo statement
                        $stmt->close();
                    } else {
                        $num_sbobine_da_revisionare = 0; // Se non ci sono leghe, punteggio sarà 0
                    }

                    // Chiudi lo statement della lega
                    $stmt_league->close();
                    ?>

                    <div class="col-md-3">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo htmlspecialchars($num_sbobine_da_revisionare); ?></h3>
                                <p>Punteggio Lega</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fa fa-eye"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Punteggio Lega <i class=""></i>
                            </a>
                        </div>
                    </div>

                    <?php
                    include '../db_connector.php';
                    $user_id = $_SESSION['id'];

                    // Query per ottenere il punteggio dell'utente
                    $query_user_score = "
    SELECT COALESCE(SUM(re.punti), 0) AS punteggio
    FROM fs_squadra AS sq
    LEFT JOIN fs_registra_eventi AS re ON sq.id_educatore = re.id_educatore
    WHERE sq.id_user = ?
";

                    $stmt_user_score = $conn->prepare($query_user_score);
                    $stmt_user_score->bind_param('i', $user_id);
                    $stmt_user_score->execute();
                    $result_user_score = $stmt_user_score->get_result();

                    if ($result_user_score && $row_user_score = $result_user_score->fetch_assoc()) {
                        $user_score = $row_user_score['punteggio'];
                    } else {
                        $user_score = 0; // Se non ci sono eventi, punteggio sarà 0
                    }

                    // Query per calcolare la posizione in classifica
                    $query_position = "
    SELECT COUNT(*) AS posizione
    FROM (
        SELECT u.id, COALESCE(SUM(re.punti), 0) AS punteggio
        FROM fs_users AS u
        LEFT JOIN fs_squadra AS sq ON u.id = sq.id_user
        LEFT JOIN fs_registra_eventi AS re ON sq.id_educatore = re.id_educatore
        GROUP BY u.id
    ) AS classifica
    WHERE punteggio > ?
";

                    $stmt_position = $conn->prepare($query_position);
                    $stmt_position->bind_param('i', $user_score);
                    $stmt_position->execute();
                    $result_position = $stmt_position->get_result();

                    if ($result_position && $row_position = $result_position->fetch_assoc()) {
                        $num_sbobine_da_svolgere = $row_position['posizione'] + 1; // +1 per la posizione dell'utente
                    } else {
                        $num_sbobine_da_svolgere = 1; // Se non ci sono punteggi, l'utente è primo
                    }

                    // Chiudi gli statement
                    $stmt_user_score->close();
                    $stmt_position->close();
                    ?>

                    <div class="col-md-3">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo htmlspecialchars($num_sbobine_da_svolgere); ?></h3>
                                <p>Posizione</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-edit"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Posizione Generale <i class=""></i>
                            </a>
                        </div>
                    </div>

                    <?php
                    include '../db_connector.php';
                    $user_id = $_SESSION['id'];

                    // Query per ottenere l'ID della lega dell'utente
                    $query_league_id = "
    SELECT al.id_lega
    FROM fs_appaia_user_lega AS al
    WHERE al.id_user = ?
";

                    $stmt_league_id = $conn->prepare($query_league_id);
                    $stmt_league_id->bind_param('i', $user_id);
                    $stmt_league_id->execute();
                    $result_league_id = $stmt_league_id->get_result();

                    if ($result_league_id && $row_league_id = $result_league_id->fetch_assoc()) {
                        $league_id = $row_league_id['id_lega'];

                        // Query per calcolare il punteggio totale della lega
                        $query_league_score = "
        SELECT COALESCE(SUM(re.punti), 0) AS punteggio
        FROM fs_appaia_user_lega AS al
        LEFT JOIN fs_squadra AS sq ON al.id_user = sq.id_user
        LEFT JOIN fs_registra_eventi AS re ON sq.id_educatore = re.id_educatore
        WHERE al.id_lega = ?
    ";

                        $stmt_league_score = $conn->prepare($query_league_score);
                        $stmt_league_score->bind_param('i', $league_id);
                        $stmt_league_score->execute();
                        $result_league_score = $stmt_league_score->get_result();

                        if ($result_league_score && $row_league_score = $result_league_score->fetch_assoc()) {
                            $league_score = $row_league_score['punteggio'];
                        } else {
                            $league_score = 0; // Se non ci sono eventi, punteggio sarà 0
                        }

                        // Query per calcolare la posizione della lega
                        $query_league_position = "
        SELECT COUNT(*) AS posizione
        FROM (
            SELECT al.id_lega, COALESCE(SUM(re.punti), 0) AS punteggio
            FROM fs_appaia_user_lega AS al
            LEFT JOIN fs_squadra AS sq ON al.id_user = sq.id_user
            LEFT JOIN fs_registra_eventi AS re ON sq.id_educatore = re.id_educatore
            GROUP BY al.id_lega
        ) AS classifica
        WHERE punteggio > ?
    ";

                        $stmt_league_position = $conn->prepare($query_league_position);
                        $stmt_league_position->bind_param('i', $league_score);
                        $stmt_league_position->execute();
                        $result_league_position = $stmt_league_position->get_result();

                        if ($result_league_position && $row_league_position = $result_league_position->fetch_assoc()) {
                            $num_sbobine_late = $row_league_position['posizione'] + 1; // +1 per la posizione della lega
                        } else {
                            $num_sbobine_late = 1; // Se non ci sono punteggi, la lega è prima
                        }

                        // Chiudi gli statement
                        $stmt_league_score->close();
                        $stmt_league_position->close();
                    } else {
                        $num_sbobine_late = 'N/A'; // Nessuna lega trovata
                    }

                    // Chiudi lo statement per l'ID della lega
                    $stmt_league_id->close();
                    ?>

                    <div class="col-md-3">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo htmlspecialchars($num_sbobine_late); ?></h3>
                                <p>Posizione Lega</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-radiation-alt"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Posizione Lega <i class=""></i>
                            </a>
                        </div>
                    </div>


                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dettaglio Eventi</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="cd-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Evento</th>
                                    <th>Punteggio</th>
                                    <th>Azioni</th>
                                </tr>
                                </thead>
                                <tbody id="sbobine-body">
                                <?php
                                include '../db_connector.php'; // Assicurati che il percorso sia corretto

                                $user_id = $_SESSION['id']; // ID dell'utente loggato

                                // Query per ottenere i dati dagli eventi, ordinati dal più recente al più vecchio
                                $query = "
        SELECT e.id, e.data, e.tipo_evento,
               COALESCE(SUM(re.punti), 0) AS punteggio
        FROM fs_eventi AS e
        LEFT JOIN fs_registra_eventi AS re ON e.id = re.evento
        LEFT JOIN fs_squadra AS sq ON re.id_educatore = sq.id_educatore
        LEFT JOIN fs_appaia_user_lega AS al ON sq.id_user = al.id_user
        WHERE al.id_user = ?
        GROUP BY e.id, e.data, e.tipo_evento
        ORDER BY e.data DESC
        ";

                                $stmt = $conn->prepare($query);
                                $stmt->bind_param('i', $user_id); // 'i' indica che l'input è un intero
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        // Formattazione della data in dd/mm/yyyy
                                        $formatted_date = date('d/m/Y', strtotime($row['data']));

                                        echo '<tr>';
                                        echo '<td>' . htmlspecialchars($formatted_date) . '</td>'; // Data dell'evento
                                        echo '<td>' . htmlspecialchars($row['tipo_evento']) . '</td>'; // Tipo di evento
                                        echo '<td>' . htmlspecialchars($row['punteggio']) . '</td>'; // Punteggio totale del giocatore per l'evento
                                        echo '<td>'; // Azioni
                                        echo '<button class="btn btn-primary btn-sm" onclick="viewEvent(' . htmlspecialchars($row['id']) . ', \'' . addslashes($formatted_date) . '\', \'' . addslashes($row['tipo_evento']) . '\', ' . htmlspecialchars($row['punteggio']) . ')">VISUALIZZA</button>';
                                        echo '</td>'; // Fine Azioni
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="4">Nessun evento trovato.</td></tr>';
                                }

                                // Chiudi lo statement
                                $stmt->close();
                                ?>
                                </tbody>
                            </table>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
<!-- Modale per visualizzare i dettagli -->
<div class="modal fade" id="punteggioModal" tabindex="-1" role="dialog" aria-labelledby="punteggioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="punteggioModalLabel">Dettagli Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Data:</strong> <span id="event-date"></span></p>
                <p><strong>Tipo Evento:</strong> <span id="event-type"></span></p>
                <p><strong>Punteggio Totale:</strong> <span id="event-punteggio"></span></p>
                <div id="educatori-container"></div> <!-- Contenitore per gli educatori e punteggi -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>

<script>
    function viewEvent(id, date, type, punteggio) {
        // Popola i dati nella modale
        document.getElementById('event-date').textContent = date;
        document.getElementById('event-type').textContent = type;
        document.getElementById('event-punteggio').textContent = punteggio;

        // Ottieni i punteggi per gli educatori associati a questo evento
        fetchEducatoriPunti(id);

        // Mostra la modale
        $('#punteggioModal').modal('show');
    }

    function fetchEducatoriPunti(eventId) {
        // Fai una richiesta AJAX per ottenere i punteggi degli educatori per questo evento
        $.ajax({
            url: '../req/home_fx/getEducatoriPunti.php', // Percorso al file PHP per ottenere i dati
            method: 'POST',
            data: { evento: eventId },
            success: function(data) {
                // Pulisci il contenitore degli educatori
                $('#educatori-container').empty();

                // Aggiungi i dati degli educatori alla modale
                $('#educatori-container').html(data);
            }
        });
    }
</script>



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
