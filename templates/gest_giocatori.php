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
                            <h1 class="m-0">Gestisci Giocatori</h1>
                            <button type="button" class="btn btn-info"
                                    data-toggle="modal"
                                    data-target="#AggiungiGiocatore">
                                Aggiungi Giocatore
                            </button>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- block content -->
                    <!-- < ?php include '../req/home_fx.php'; ?> -->

                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Elenco Giocatori</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Giocatore</th>
                                    <th>Interlega</th>
                                    <th>Lega</th>
                                    <th style="width: 40px">Admin?</th>
                                    <th>Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // Assume che la sessione e la connessione al database ($conn) siano già avviate
                                $user_id = $_SESSION['id'];

                                // Query per ottenere tutti i giocatori, il nome dell'interlega e il nome della lega
                                $query_giocatori = "
                SELECT u.id, u.nome, u.cognome, u.admin, 
                       GROUP_CONCAT(DISTINCT inter.nome_interlega SEPARATOR ', ') AS nome_interlega,
                       GROUP_CONCAT(DISTINCT leg.nome_lega SEPARATOR ', ') AS nome_lega
                FROM fs_users AS u
                LEFT JOIN fs_appaia_user_interlega AS i ON u.id = i.id_user
                LEFT JOIN fs_interleghe AS inter ON i.id_interlega = inter.id
                LEFT JOIN fs_appaia_user_lega AS l ON u.id = l.id_user
                LEFT JOIN fs_leghe AS leg ON l.id_lega = leg.id
                GROUP BY u.id
                ORDER BY u.nome ASC, u.cognome ASC"; // Ordinamento per nome e cognome

                                $stmt_giocatori = $conn->prepare($query_giocatori);
                                $stmt_giocatori->execute();
                                $result_giocatori = $stmt_giocatori->get_result();

                                // Verifica se ci sono risultati dalla query
                                if ($result_giocatori->num_rows > 0) {
                                    // Itera su ogni riga della tabella
                                    while ($row = $result_giocatori->fetch_assoc()) {
                                        echo "<tr class='align-middle'>";
                                        echo "<td>" . htmlspecialchars($row['nome'] . ' ' . $row['cognome']) . "</td>"; // Nome e cognome del giocatore

                                        // Mostra il nome dell'interlega
                                        echo "<td>" . ($row['nome_interlega'] ? htmlspecialchars($row['nome_interlega']) : 'N/A') . "</td>";

                                        // Mostra il nome della lega
                                        echo "<td>" . ($row['nome_lega'] ? htmlspecialchars($row['nome_lega']) : 'N/A') . "</td>";

                                        // Admin?
                                        echo "<td>" . ($row['admin'] ? 'Sì' : 'No') . "</td>"; // 'Sì' se admin è 1, 'No' se 0

                                        // Azioni (pulsanti modifica ed elimina)
                                        echo "<td>
                        <button class='btn btn-primary' data-toggle='modal' data-target='#modificaGiocatoreModal' 
                            data-id='" . htmlspecialchars($row['id']) . "' 
                            data-nome='" . htmlspecialchars($row['nome']) . "' 
                            data-cognome='" . htmlspecialchars($row['cognome']) . "' 
                            data-interlega='" . htmlspecialchars($row['nome_interlega']) . "'>
                            Modifica
                        </button>
                        <button class='btn btn-danger btn-elimina' data-id='" . htmlspecialchars($row['id']) . "'>
                            Elimina
                        </button>
                    </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>Nessun giocatore trovato.</td></tr>"; // Aumenta il colspan se aggiungi una colonna
                                }

                                // Chiudi lo statement
                                $stmt_giocatori->close();
                                ?>
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div>

                    <!-- Modale per Modifica Giocatore -->
                    <div class="modal fade" id="modificaGiocatoreModal" tabindex="-1" role="dialog" aria-labelledby="modificaGiocatoreModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modificaGiocatoreModalLabel">Modifica Giocatore</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="modificaGiocatoreForm">
                                        <input type="hidden" id="giocatoreId" name="giocatoreId">
                                        <div class="form-group">
                                            <label for="nome">Username</label>
                                            <input type="text" class="form-control" id="uname" name="uname" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cognome">Cognome</label>
                                            <input type="text" class="form-control" id="cognome" name="cognome" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="interlega">Interlega</label>
                                            <select class="form-control" id="interlega" name="interlega" required>
                                                <option value="">Seleziona Interlega</option>
                                                <?php
                                                // Query per recuperare le interleghe
                                                $query_interleghe = "SELECT id, nome_interlega FROM fs_interleghe";
                                                $stmt_interleghe = $conn->prepare($query_interleghe);
                                                $stmt_interleghe->execute();
                                                $result_interleghe = $stmt_interleghe->get_result();

                                                // Popola il dropdown delle interleghe
                                                while ($row = $result_interleghe->fetch_assoc()) {
                                                    echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['nome_interlega']) . "</option>";
                                                }
                                                $stmt_interleghe->close();
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="lega">Lega</label>
                                            <select class="form-control" id="lega" name="lega" required>
                                                <option value="">Seleziona Lega</option>
                                                <?php
                                                // Query per recuperare le leghe
                                                $query_leghe = "SELECT id, nome_lega FROM fs_leghe";
                                                $stmt_leghe = $conn->prepare($query_leghe);
                                                $stmt_leghe->execute();
                                                $result_leghe = $stmt_leghe->get_result();

                                                // Popola il dropdown delle leghe
                                                while ($row = $result_leghe->fetch_assoc()) {
                                                    echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['nome_lega']) . "</option>";
                                                }
                                                $stmt_leghe->close();
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="admin">Admin?</label>
                                            <select class="form-control" id="admin" name="admin" readonly>
                                                <option value="0">No</option>
                                                <option value="1">Sì</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <button type="button" class="btn btn-primary" id="salvaModifiche">Salva Modifiche</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modale Aggiungi Giocatore -->
                    <div class="modal fade" id="AggiungiGiocatore" tabindex="-1" aria-labelledby="AggiungiGiocatoreLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="AggiungiGiocatoreLabel">Aggiungi Giocatore</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAggiungiGiocatore">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="nomeadd" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cognome" class="form-label">Cognome</label>
                                            <input type="text" class="form-control" id="cognomeadd" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="uname" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="unameadd" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="interlega">Interlega</label>
                                            <select class="form-control" id="interlegaadd" name="interlegaadd" required>
                                                <option value="">Seleziona Interlega</option>
                                                <?php
                                                // Query per recuperare le interleghe
                                                $query_interleghe = "SELECT id, nome_interlega FROM fs_interleghe";
                                                $stmt_interleghe = $conn->prepare($query_interleghe);
                                                $stmt_interleghe->execute();
                                                $result_interleghe = $stmt_interleghe->get_result();

                                                // Popola il dropdown delle interleghe
                                                while ($row = $result_interleghe->fetch_assoc()) {
                                                    echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['nome_interlega']) . "</option>";
                                                }
                                                $stmt_interleghe->close();
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="lega">Lega</label>
                                            <select class="form-control" id="legaadd" name="legaadd" required>
                                                <option value="">Seleziona Lega</option>
                                                <?php
                                                // Query per recuperare le leghe
                                                $query_leghe = "SELECT id, nome_lega FROM fs_leghe";
                                                $stmt_leghe = $conn->prepare($query_leghe);
                                                $stmt_leghe->execute();
                                                $result_leghe = $stmt_leghe->get_result();

                                                // Popola il dropdown delle leghe
                                                while ($row = $result_leghe->fetch_assoc()) {
                                                    echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['nome_lega']) . "</option>";
                                                }
                                                $stmt_leghe->close();
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="admin" class="form-label">Admin?</label>
                                            <input type="checkbox" id="adminadd">
                                        </div>
                                        <label>N.B.: la password corrisponde a '123'.
                                        Al primo accesso, si raccomanda di IMPORRE un cambio password.</label>
                                        <!-- Puoi aggiungere altri campi qui se necessario -->
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <button type="button" class="btn btn-primary" id="salvaGiocatore">Aggiungi Giocatore</button>
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
        $(document).ready(function() {
            $("#salvaGiocatore").click(function(event) {
                event.preventDefault(); // Previeni il comportamento di default

                var nome = $("#nomeadd").val();
                var cognome = $("#cognomeadd").val();
                var uname = $("#unameadd").val();
                var interlega = $("#interlegaadd").val();
                var lega = $("#legaadd").val();
                var admin = $("#adminadd").is(':checked') ? 1 : 0;

                // Controlla se i valori sono correttamente popolati nella console
                console.log({
                    nome: nome,
                    cognome: cognome,
                    uname: uname,
                    interlega: interlega,
                    lega: lega,
                    admin: admin
                });

                // Effettua la richiesta AJAX
                $.ajax({
                    url: "../req/gestione_giocatori/addGiocatore.php",
                    type: "POST",
                    data: {
                        nome: nome,
                        cognome: cognome,
                        uname: uname,
                        interlega: interlega,
                        lega: lega,
                        admin: admin
                    },
                    success: function(response) {
                        alert(response); // Mostra la risposta dal PHP
                        $("#AggiungiGiocatore").modal('hide'); // Chiudi il modal dopo il successo

                    },
                    error: function(xhr, status, error) {
                        alert("Errore durante l'aggiunta del giocatore.");
                        console.log(error);
                    }
                });
            });
        });

    </script>


    <script>
        $(document).ready(function() {
            // Evento per il pulsante di modifica
            $('.btn-primary[data-toggle="modal"]').on('click', function() {
                var id = $(this).data('id');

                // Esegui una chiamata AJAX per recuperare i dati del giocatore
                $.ajax({
                    url: '../req/gestione_giocatori/getGiocatoreDetails.php',
                    method: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    success: function(giocatore) {
                        // Popola i campi della modale con i dati ricevuti
                        $('#giocatoreId').val(giocatore.id);
                        $('#nome').val(giocatore.nome);
                        $('#uname').val(giocatore.utente);
                        $('#cognome').val(giocatore.cognome);
                        $('#interlega').val(giocatore.id_interlega); // Cambiato per usare id
                        $('#lega').val(giocatore.id_lega); // Cambiato per usare id

                        // Mostra la modale
                        $('#modificaGiocatoreModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error("Errore nel recupero dei dati:", error);
                        alert("Si è verificato un errore durante il recupero dei dati. Riprova.");
                    }
                });
            });


        });

    </script>

    <script>
        $('#salvaModifiche').click(function () {
            // Prepara i dati dal form
            var data = {
                giocatoreId: $('#giocatoreId').val(),
                nome: $('#nome').val(),
                cognome: $('#cognome').val(),
                uname: $('#uname').val(),
                interlega: $('#interlega').val(),
                lega: $('#lega').val(),
            };

            // Invio AJAX
            $.ajax({
                url: '../req/gestione_giocatori/updateGiocatore.php', // Il percorso al file PHP
                type: 'POST',
                data: data,
                success: function (response) {
                    var res = JSON.parse(response);
                    if (res.status == 'success') {
                        alert(res.message);
                        // Aggiorna la vista o chiudi il modal
                        $('#modificaGiocatoreModal').modal('hide');
                    } else {
                        location.reload(); // Ricarica la pagina
                        alert(res.message);
                    }
                },
                error: function () {
                    alert('Errore nella richiesta.');
                }
            });
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-elimina').on('click', function() {
                var userId = $(this).data('id');
                if (confirm('Sei sicuro di voler eliminare questo giocatore?')) {
                    $.ajax({
                        url: '../req/gestione_giocatori/elimina_giocatore.php',
                        type: 'POST',
                        data: { id: userId },
                        success: function(response) {
                            // Aggiorna la tabella o ricarica la pagina
                            if (response.success) {
                                location.reload(); // Ricarica la pagina
                            } else {
                            }
                        },
                        error: function() {
                            alert('Si è verificato un errore nel server.');
                        }
                    });
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
