<meta name="robots" content="noindex">
<?php
session_start();
include '../db_connector.php';
if (isset($_SESSION['id']) && isset($_SESSION['nome']) && $_SESSION['locked'] == 0){

    ?>

    <?php
    // Assume che la sessione e la connessione al database ($conn) siano già avviate
    $user_id = $_SESSION['id'];

    // Query per ottenere i dati dell'utente (nome, cognome, password)
    $query_nome_cognome = "SELECT nome, cognome, password, email FROM fs_users WHERE id = ?";
    $stmt_nome_cognome = $conn->prepare($query_nome_cognome);
    $stmt_nome_cognome->bind_param('i', $user_id);
    $stmt_nome_cognome->execute();
    $result_nome_cognome = $stmt_nome_cognome->get_result();

    // Recupero i dati dell'utente
    $row_nome_cognome = $result_nome_cognome->fetch_assoc();
    $nome = $row_nome_cognome['nome'];
    $cognome = $row_nome_cognome['cognome'];
    $password = $row_nome_cognome['password'];

    // Query per ottenere l'id_lega dall'utente
    $query_lega = "SELECT id_lega FROM fs_appaia_user_lega WHERE id_user = ?";
    $stmt_lega = $conn->prepare($query_lega);
    $stmt_lega->bind_param('i', $user_id);
    $stmt_lega->execute();
    $result_lega = $stmt_lega->get_result();

    // Controllo se c'è un risultato e recupero id_lega
    if ($row_lega = $result_lega->fetch_assoc()) {
        $id_lega = $row_lega['id_lega'];

        // Query per confrontare id_lega con id nella tabella fs_leghe e ottenere il nome
        $query_nome_lega = "SELECT nome_lega FROM fs_leghe WHERE id = ?";
        $stmt_nome_lega = $conn->prepare($query_nome_lega);
        $stmt_nome_lega->bind_param('i', $id_lega);
        $stmt_nome_lega->execute();
        $result_nome_lega = $stmt_nome_lega->get_result();

        if ($row_nome_lega = $result_nome_lega->fetch_assoc()) {
            $nome_lega = $row_nome_lega['nome_lega'];
        } else {
            echo "Nessuna lega trovata con questo ID.<br>";
        }
        $stmt_nome_lega->close();
    } else {
        echo "Nessuna lega associata a questo utente.<br>";
    }

    // Query per ottenere l'id_interlega dall'utente
    $query_interlega = "SELECT id_interlega FROM fs_appaia_user_interlega WHERE id_user = ?";
    $stmt_interlega = $conn->prepare($query_interlega);
    $stmt_interlega->bind_param('i', $user_id);
    $stmt_interlega->execute();
    $result_interlega = $stmt_interlega->get_result();

    // Controllo se c'è un risultato e recupero id_interlega
    if ($row_interlega = $result_interlega->fetch_assoc()) {
        $id_interlega = $row_interlega['id_interlega'];

        // Query per confrontare id_interlega con id nella tabella fs_interleghe e ottenere il nome
        $query_nome_interlega = "SELECT nome_interlega FROM fs_interleghe WHERE id = ?";
        $stmt_nome_interlega = $conn->prepare($query_nome_interlega);
        $stmt_nome_interlega->bind_param('i', $id_interlega);
        $stmt_nome_interlega->execute();
        $result_nome_interlega = $stmt_nome_interlega->get_result();

        if ($row_nome_interlega = $result_nome_interlega->fetch_assoc()) {
            $nome_interlega = $row_nome_interlega['nome_interlega'];
        } else {
            echo "Nessuna interlega trovata con questo ID.<br>";
        }
        $stmt_nome_interlega->close();
    } else {
        echo "Nessuna interlega associata a questo utente.<br>";
    }

    // Chiudi gli statement e la connessione
    $stmt_nome_cognome->close();
    $stmt_lega->close();
    $stmt_interlega->close();
    $conn->close();
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
                            <h1 class="m-0">ACCOUNT UTENTE</h1>

                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- block content -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">LETTURA DATABASE: In caso di errori, prenditela con chi ha inserito i dati</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="../req/update_password.php" method="post">
                            <?php if (isset($_GET['status'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_GET['status']; ?>
                                </div>
                            <?php } ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Nome">Nome</label>
                                    <input type="text" class="form-control" id="Nome" name="Nome" value="<?php echo $nome ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="Cognome">Cognome</label>
                                    <input type="text" class="form-control" id="Cognome" name="Cognome" value="<?php echo $cognome ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="Cognome">La Mia Lega</label>
                                    <input type="text" class="form-control" id="lega" name="lega" value="<?php echo $nome_lega ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="Cognome">La Mia Interlega</label>
                                    <input type="text" class="form-control" id="interlega" name="interlega" value="<?php echo $nome_interlega ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Inserisci la nuova password">
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" >Aggiorna La Password</button>
                            </div>
                        </form>
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
